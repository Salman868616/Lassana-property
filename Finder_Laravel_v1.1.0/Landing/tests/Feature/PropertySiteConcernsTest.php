<?php

namespace Tests\Feature;

use App\Models\{Property, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PropertySiteConcernsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
    }

    private function member(string $role = 'seller'): User
    {
        $user = User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name', $role)->value('id'));
        return $user;
    }

    private function data(User $seller): array
    {
        return ['title'=>'Sample land in Gampaha', 'category'=>'land',
            'owner_id'=>$seller->id, 'seller_email'=>$seller->email,
            'district'=>'Gampaha', 'city'=>'Nittambuwa', 'location'=>'Temple Road',
            'description'=>'A property near the town.', 'total_price'=>2000000];
    }

    public function test_seller_agent_and_admin_can_save_reopen_update_and_clear_optional_notes(): void
    {
        $seller = $this->member();
        $notes = "Narrow vehicle access.\nLow-lying area during heavy rain.";
        foreach (['seller','agent','admin'] as $role) {
            $this->actingAs($role === 'seller' ? $seller : $this->member($role));
            $prefix = '/'.$role.'/properties';
            $data = $this->data($seller);
            $this->get($prefix.'/create')->assertOk()->assertSee('Restrictions / site concerns');
            $this->post($prefix, $data)->assertSessionHasNoErrors();
            $this->assertNull(Property::latest('id')->firstOrFail()->site_concerns);
            $this->post($prefix, $data + ['site_concerns'=>$notes])->assertSessionHasNoErrors();
            $property = Property::latest('id')->firstOrFail();
            $this->assertSame($notes, $property->site_concerns);
            $this->assertSame('draft', $property->status);
            $this->get($prefix.'/'.$property->id.'/edit')->assertOk()->assertSee($notes);
            $this->get('/dashboard/'.$role.'/properties/'.$property->id)->assertOk()->assertSee($notes);
            $this->put($prefix.'/'.$property->id, $data)->assertSessionHasNoErrors();
            $this->assertSame($notes, $property->fresh()->site_concerns);
            $updated = 'Access is limited to small vehicles.';
            $this->put($prefix.'/'.$property->id, $data + ['site_concerns'=>$updated])->assertSessionHasNoErrors();
            $this->assertSame($updated, $property->fresh()->site_concerns);
            $this->put($prefix.'/'.$property->id, $data + ['site_concerns'=>'  '])->assertSessionHasNoErrors();
            $this->assertNull($property->fresh()->site_concerns);
        }
    }

    public function test_length_and_type_are_validated_for_every_editing_role(): void
    {
        $seller = $this->member();
        foreach (['seller','agent','admin'] as $role) {
            $this->actingAs($role === 'seller' ? $seller : $this->member($role));
            $prefix = '/'.$role.'/properties';
            $data = $this->data($seller);
            foreach ([str_repeat('x',3001), ['invalid array']] as $invalid) {
                $this->post($prefix, $data + ['site_concerns'=>$invalid])->assertSessionHasErrors('site_concerns');
            }
            $this->post($prefix, $data + ['site_concerns'=>str_repeat('x',3000)])->assertSessionHasNoErrors();
            $property = Property::latest('id')->firstOrFail();
            $this->put($prefix.'/'.$property->id, $data + ['site_concerns'=>str_repeat('x',3001)])
                ->assertSessionHasErrors('site_concerns');
            $this->assertSame(3000, strlen($property->fresh()->site_concerns));
        }
        $this->assertDatabaseCount('properties',3);
    }

    public function test_notes_survive_validation_errors_and_are_escaped_in_forms(): void
    {
        $seller = $this->member();
        $this->actingAs($seller);
        $notes = '<script>alert("example")</script>';
        $this->from('/seller/properties/create')->post('/seller/properties', [
            'title'=>'', 'site_concerns'=>$notes,
        ])->assertSessionHasErrors('title');
        $this->withCookie(config('session.cookie'), session()->getId())
            ->get('/seller/properties/create')->assertOk()->assertSee($notes)->assertDontSee($notes, false);
        $this->assertDatabaseCount('properties',0);
    }

    public function test_public_detail_shows_escaped_notes_only_when_supplied(): void
    {
        $seller = $this->member();
        $this->actingAs($seller)->post('/seller/properties', $this->data($seller))->assertSessionHasNoErrors();
        $property = Property::latest('id')->firstOrFail();
        $property->update(['status'=>'published']);
        $url = '/properties/'.$property->property_code;
        $this->get($url)->assertOk()->assertDontSee('site-concerns-heading', false);
        $notes = "Narrow vehicle access.\nLow-lying area during heavy rain.";
        $property->update(['site_concerns'=>$notes]);
        $response = $this->get($url)->assertOk()->assertSee('Restrictions / site concerns')->assertSee($notes);
        if (getenv('SITE_CONCERNS_PREVIEWS')) {
            file_put_contents(getenv('SITE_CONCERNS_PREVIEWS').'/property-details.html', $response->getContent());
        }
        $unsafe = '<script>alert("example")</script>';
        $property->update(['site_concerns'=>$unsafe]);
        $this->get($url)->assertOk()->assertSee($unsafe)->assertDontSee($unsafe, false);
        $this->get('/dashboard/seller/properties/'.$property->id)->assertOk()->assertSee($unsafe)->assertDontSee($unsafe, false);
        $property->update(['site_concerns'=>null]);
        $this->get($url)->assertOk()->assertDontSee('site-concerns-heading', false);
    }

    public function test_ownership_and_review_locks_still_apply(): void
    {
        $seller = $this->member();
        $this->actingAs($seller)->post('/seller/properties', $this->data($seller) + ['site_concerns'=>'Original note.'])->assertSessionHasNoErrors();
        $property = Property::latest('id')->firstOrFail();
        $this->actingAs($this->member())->put('/seller/properties/'.$property->id, [
            'title'=>'Changed', 'site_concerns'=>'Changed note.',
        ])->assertNotFound();
        $property->update(['status'=>'published']);
        foreach ([$seller, $this->member('admin')] as $user) {
            $role = $user->hasRole('admin') ? 'admin' : 'seller';
            $this->actingAs($user)->put('/'.$role.'/properties/'.$property->id, [
                'title'=>'Changed', 'site_concerns'=>'Changed note.',
            ])->assertForbidden();
        }
        $this->assertSame('Original note.', $property->fresh()->site_concerns);
    }
}
