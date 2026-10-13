<?php

namespace Tests\Feature;

use App\Models\{Property, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PriceNegotiableTest extends TestCase
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

    private function listing(array $attributes = []): Property
    {
        $owner = $this->member();
        $property = new Property;
        $property->forceFill(array_merge([
            'owner_id' => $owner->id, 'created_by' => $owner->id,
            'title' => 'Sample land in Gampaha', 'category' => 'land',
            'property_category_id' => DB::table('property_categories')->where('slug', 'land')->value('id'),
            'status' => 'published', 'district' => 'Gampaha', 'city' => 'Nittambuwa',
            'location' => 'Temple Road', 'total_price' => 8500000, 'currency' => 'LKR', 'published_at' => now(),
        ], $attributes))->save();
        return $property;
    }

    public function test_admin_seller_and_agent_can_set_clear_and_preserve_the_setting(): void
    {
        $seller = $this->member();
        foreach (['seller', 'agent', 'admin'] as $role) {
            $this->actingAs($role === 'seller' ? $seller : $this->member($role));
            $prefix = '/'.$role.'/properties';
            $data = [
                'title' => 'Negotiable listing '.$role, 'category' => 'land',
                'owner_id' => $seller->id, 'seller_email' => $seller->email,
                'district' => 'Gampaha', 'city' => 'Nittambuwa', 'location' => 'Temple Road',
                'total_price' => 8500000, 'is_price_negotiable' => '1', 'status' => 'published',
            ];
            $this->get($prefix.'/create')->assertOk()->assertSee('Price negotiable')
                ->assertSee('name="is_price_negotiable" value="0"', false);
            $this->post($prefix, $data)->assertRedirect()->assertSessionHasNoErrors();
            $property = Property::latest('id')->firstOrFail();
            $this->assertTrue($property->is_price_negotiable);
            $this->assertSame('draft', $property->status);
            $edit = $this->get($prefix.'/'.$property->id.'/edit')->assertOk();
            $this->assertMatchesRegularExpression('/id="is_price_negotiable"[^>]*checked/s', $edit->getContent());
            if ($role === 'seller' && getenv('NEGOTIABLE_PREVIEWS')) {
                file_put_contents(getenv('NEGOTIABLE_PREVIEWS').'/seller-form.html', $edit->getContent());
            }
            $update = $prefix.'/'.$property->id;
            $this->put($update, array_replace($data, ['is_price_negotiable' => 'invalid']))
                ->assertSessionHasErrors('is_price_negotiable');
            $this->assertTrue($property->fresh()->is_price_negotiable);
            unset($data['is_price_negotiable']);
            $this->put($update, $data)->assertSessionHasNoErrors();
            $this->assertTrue($property->fresh()->is_price_negotiable);
            $this->put($update, $data + ['is_price_negotiable' => '0'])->assertSessionHasNoErrors();
            $this->assertFalse($property->fresh()->is_price_negotiable);
            $this->post($prefix, $data)->assertSessionHasNoErrors();
            $this->assertFalse(Property::latest('id')->firstOrFail()->is_price_negotiable);
        }
    }

    public function test_it_works_for_every_category_for_sale_and_rent(): void
    {
        $this->actingAs($this->member());
        foreach (['land', 'house', 'apartment', 'villa', 'commercial'] as $category) {
            foreach (['sale', 'rent'] as $type) {
                $this->post('/seller/properties', [
                    'title' => $category.' '.$type, 'category' => $category, 'listing_type' => $type,
                    'total_price' => 50000, 'is_price_negotiable' => 1,
                ])->assertSessionHasNoErrors();
                $property = Property::latest('id')->firstOrFail();
                $this->assertTrue($property->is_price_negotiable);
                $this->assertSame($category, $property->category);
                $this->assertSame($type, $property->listing_type);
            }
        }
    }

    public function test_public_prices_show_the_indicator_only_when_selected_and_a_price_exists(): void
    {
        $property = $this->listing(['is_price_negotiable' => true]);
        foreach (['/properties/'.$property->property_code, '/properties', '/'] as $path) {
            $response = $this->get($path)->assertOk()->assertSee('data-price-negotiable', false)->assertSee('Negotiable');
            if (getenv('NEGOTIABLE_PREVIEWS')) {
                $name = $path === '/' ? 'home' : ($path === '/properties' ? 'listings' : 'detail');
                file_put_contents(getenv('NEGOTIABLE_PREVIEWS').'/'.$name.'.html', $response->getContent());
            }
        }
        $property->forceFill(['is_price_negotiable' => false])->save();
        foreach (['/properties/'.$property->property_code, '/properties', '/'] as $path) {
            $this->get($path)->assertOk()->assertDontSee('data-price-negotiable', false);
        }
        $property->forceFill(['is_price_negotiable' => true, 'total_price' => null])->save();
        $this->get('/properties/'.$property->property_code)->assertOk()
            ->assertSee('Price on request')->assertDontSee('data-price-negotiable', false);
        $property->forceFill(['total_price' => 50000, 'listing_type' => 'rent'])->save();
        $this->get('/properties-for-rent')->assertOk()->assertSee('LKR 50,000.00 / month')
            ->assertSee('data-price-negotiable', false);
    }

    public function test_failed_validation_keeps_the_checkbox_selection(): void
    {
        $this->actingAs($this->member());
        $this->from('/seller/properties/create')->post('/seller/properties', [
            'title' => '', 'is_price_negotiable' => '1',
        ])->assertSessionHasErrors('title')->assertRedirect('/seller/properties/create');
        $response = $this->get('/seller/properties/create')->assertOk();
        $this->assertMatchesRegularExpression('/id="is_price_negotiable"[^>]*checked/s', $response->getContent());
        $this->assertDatabaseCount('properties', 0);
    }

    public function test_other_owners_and_published_listings_cannot_be_edited_through_this_field(): void
    {
        $property = $this->listing();
        $this->actingAs($this->member())->put('/seller/properties/'.$property->id, [
            'title' => 'Changed', 'is_price_negotiable' => 1,
        ])->assertNotFound();
        foreach ([$property->owner, $this->member('admin')] as $user) {
            $prefix = $user->hasRole('admin') ? 'admin' : 'seller';
            $this->actingAs($user)->put('/'.$prefix.'/properties/'.$property->id, [
                'title' => 'Changed', 'is_price_negotiable' => 1,
            ])->assertForbidden();
        }
        $this->assertFalse($property->fresh()->is_price_negotiable);
    }

    public function test_sinhala_and_tamil_labels_are_available(): void
    {
        $property = $this->listing(['is_price_negotiable' => true]);
        foreach (['si' => 'මිල සාකච්ඡා කළ හැක', 'ta' => 'விலை பேசலாம்'] as $locale => $label) {
            app()->setLocale($locale);
            $this->assertStringContainsString($label, view('properties.negotiable-label', compact('property'))->render());
        }
    }
}
