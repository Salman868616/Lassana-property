<?php

namespace Tests\Feature;

use App\Models\{Property, SavedProperty, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class FeaturedPropertyTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
    }

    private function member(string $role): User
    {
        $user = User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name', $role)->value('id'));
        return $user;
    }

    private function listing(array $attributes = []): Property
    {
        $owner = $this->member('seller');
        $property = new Property;
        $property->forceFill(array_merge([
            'owner_id' => $owner->id, 'created_by' => $owner->id,
            'title' => 'Featured fixture '.$owner->id, 'category' => 'land',
            'property_category_id' => DB::table('property_categories')->where('slug', 'land')->value('id'),
            'district' => 'Gampaha', 'city' => 'Nittambuwa', 'status' => 'published',
            'total_price' => 2000000, 'currency' => 'LKR', 'published_at' => now(),
        ], $attributes))->save();
        return $property;
    }

    public function test_admin_can_feature_and_remove_a_published_property_without_changing_its_publication_or_verification(): void
    {
        $property = $this->listing(['verification_level' => 'silver']);
        $published = $property->published_at->toDateTimeString();
        $this->actingAs($this->member('admin'));
        $this->get('/dashboard/admin/properties/'.$property->id)->assertOk()->assertSee('Feature on homepage');
        $this->patch('/admin/properties/'.$property->id.'/featured', ['is_featured' => '1'])
            ->assertSessionHasNoErrors()->assertRedirect(route('dashboard.property', ['role'=>'admin', 'property'=>$property->id]));
        $property->refresh();
        $this->assertTrue($property->is_featured);
        $this->assertNotNull($property->featured_at);
        $this->assertSame('published', $property->status);
        $this->assertSame('silver', $property->verification_level);
        $this->assertSame($published, $property->published_at->toDateTimeString());
        $this->get('/dashboard/admin/properties/'.$property->id)->assertOk()->assertSee('Remove from featured');
        $this->get('/admin/properties')->assertOk()->assertSee('Featured');
        $this->get('/')->assertOk()->assertSee('data-featured-property="'.$property->id.'"', false);
        $selectedAt = $property->featured_at->toDateTimeString();
        $this->travel(1)->hours();
        $this->patch('/admin/properties/'.$property->id.'/featured', ['is_featured'=>true])->assertSessionHasNoErrors();
        $this->assertSame($selectedAt, $property->fresh()->featured_at->toDateTimeString());
        $this->patch('/admin/properties/'.$property->id.'/featured', ['is_featured'=>'0'])->assertSessionHasNoErrors();
        $this->assertFalse($property->fresh()->is_featured);
        $this->assertNull($property->fresh()->featured_at);
        $this->get('/')->assertOk()->assertDontSee('featured-properties-title', false);
    }

    public function test_guests_and_all_non_admin_roles_cannot_change_featured_status(): void
    {
        $property = $this->listing();
        $url = '/admin/properties/'.$property->id.'/featured';
        $this->patch($url, ['is_featured'=>true])->assertRedirect();
        foreach (['buyer', 'seller', 'agent', 'sales', 'verification'] as $role) {
            $this->actingAs($this->member($role))->patch($url, ['is_featured'=>true])->assertForbidden();
            $this->patch($url, ['is_featured'=>false])->assertForbidden();
        }
        $this->assertFalse($property->fresh()->is_featured);
    }

    public function test_private_statuses_and_invalid_values_cannot_be_featured(): void
    {
        $this->actingAs($this->member('admin'));
        foreach (['draft', 'submitted', 'under_review', 'approved', 'sold', 'archived'] as $status) {
            $property = $this->listing(['status'=>$status]);
            $this->patch('/admin/properties/'.$property->id.'/featured', ['is_featured'=>true])
                ->assertSessionHasErrors('is_featured');
            $this->assertFalse($property->fresh()->is_featured);
            $this->get('/dashboard/admin/properties/'.$property->id)->assertOk()->assertDontSee('Feature on homepage');
        }
        $property = $this->listing();
        foreach ([[], ['is_featured'=>'yes'], ['is_featured'=>['1']]] as $payload) {
            $this->patch('/admin/properties/'.$property->id.'/featured', $payload)->assertSessionHasErrors('is_featured');
        }
        $this->assertFalse($property->fresh()->is_featured);
        $property->delete();
        $this->patch('/admin/properties/'.$property->id.'/featured', ['is_featured'=>true])->assertNotFound();
    }

    public function test_only_selected_public_listings_appear_and_empty_sections_are_hidden(): void
    {
        $ordinary = $this->listing();
        $this->get('/')->assertOk()->assertDontSee('featured-properties-title', false)->assertSee('Latest properties');
        $sale = $this->listing(['is_featured'=>true, 'featured_at'=>now()->subMinute()]);
        $rental = $this->listing(['is_featured'=>true, 'featured_at'=>now(), 'listing_type'=>'rent']);
        foreach (['draft', 'submitted', 'under_review', 'approved', 'sold', 'archived'] as $status) {
            $this->listing(['status'=>$status, 'is_featured'=>true, 'featured_at'=>now()]);
        }
        $this->listing(['is_featured'=>true, 'featured_at'=>now()])->delete();
        foreach (['/', '/home-real-estate'] as $url) {
            $response = $this->get($url)->assertOk();
            $this->assertSame([$rental->id, $sale->id], $response->viewData('featuredProperties')->modelKeys());
            $response->assertSee('Featured properties')->assertSee('data-featured-property="'.$rental->id.'"',false)
                ->assertDontSee('data-featured-property="'.$ordinary->id.'"', false)->assertSee(' / month');
            $this->assertContains($ordinary->id, $response->viewData('latestProperties')->modelKeys());
        }
    }

    public function test_homepage_limits_featured_properties_to_six_and_uses_selection_date_then_id(): void
    {
        $ids = [];
        for ($i=0; $i<8; $i++) {
            $ids[] = $this->listing(['is_featured'=>true, 'featured_at'=>now()->subMinutes(8-intdiv($i,2))])->id;
        }
        $response = $this->get('/')->assertOk();
        $this->assertSame(array_slice(array_reverse($ids),0,6), $response->viewData('featuredProperties')->modelKeys());
        $this->assertCount(6, $response->viewData('latestProperties'));
    }

    public function test_unpublish_sold_archive_and_corrections_clear_featured_selection(): void
    {
        $this->actingAs($this->member('admin'));
        foreach (['unpublish', 'mark-sold', 'archive', 'return-to-draft'] as $action) {
            $property = $this->listing(['is_featured'=>true, 'featured_at'=>now()]);
            $this->post('/admin/properties/'.$property->id.'/'.$action, ['remarks'=>'Remove unavailable listing'])
                ->assertSessionHasNoErrors()->assertRedirect();
            $this->assertFalse($property->fresh()->is_featured);
            $this->assertNull($property->fresh()->featured_at);
            // Re-publication must not silently restore an earlier featured selection.
            $property->refresh()->update(['status'=>'published']);
            $this->assertFalse($property->fresh()->is_featured);
        }
    }

    public function test_saved_badges_include_older_featured_listings_and_are_scoped_to_the_buyer(): void
    {
        $older = $this->listing(['published_at'=>now()->subYear(), 'is_featured'=>true, 'featured_at'=>now()]);
        for ($i=0; $i<6; $i++) $this->listing();
        $buyer = $this->member('buyer');
        SavedProperty::create(['user_id'=>$buyer->id, 'property_id'=>$older->id]);
        $response = $this->actingAs($buyer)->get('/')->assertOk();
        $this->assertNotContains($older->id, $response->viewData('latestProperties')->modelKeys());
        $response->assertSee('data-saved-property="'.$older->id.'"', false);
        $this->actingAs($this->member('buyer'))->get('/')->assertOk()->assertDontSee('data-saved-property="'.$older->id.'"', false);
    }

    public function test_seller_listing_forms_cannot_inject_admin_featured_fields(): void
    {
        $seller = $this->member('seller');
        $this->actingAs($seller)->post('/seller/properties', [
            'title'=>'Seller submission', 'category'=>'land', 'district'=>'Gampaha',
            'is_featured'=>true, 'featured_at'=>now()->toDateTimeString(),
        ])->assertSessionHasNoErrors()->assertRedirect();
        $property = Property::where('owner_id', $seller->id)->firstOrFail();
        $this->assertFalse($property->is_featured);
        $this->assertNull($property->featured_at);
        $this->get('/dashboard/seller/properties/'.$property->id)->assertOk()->assertDontSee('Feature on homepage');
    }
}
