<?php

namespace Tests\Feature;

use App\Models\{Property, PropertyRequest, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RentalPropertyTest extends TestCase
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
            'owner_id'=>$owner->id, 'created_by'=>$owner->id, 'title'=>'Rental fixture '.$owner->id,
            'category'=>'house', 'property_category_id'=>DB::table('property_categories')->where('slug', 'house')->value('id'),
            'listing_type'=>'rent', 'status'=>'published', 'district'=>'Gampaha', 'city'=>'Nittambuwa',
            'location'=>'Temple Road', 'total_price'=>75000, 'currency'=>'LKR', 'published_at'=>now(),
        ], $attributes))->save();
        $property->details()->create(['bedrooms'=>3, 'bathrooms'=>2, 'floor_area'=>1500]);
        return $property;
    }

    public function test_rental_page_is_public_and_keeps_rentals_separate_from_sales_and_private_listings(): void
    {
        $rental = $this->listing();
        $sale = $this->listing(['listing_type'=>'sale', 'title'=>'Sale fixture']);
        foreach (['draft','submitted','under_review','approved','sold','archived'] as $status) $this->listing(['status'=>$status]);
        $deleted = $this->listing();
        $deleted->delete();

        $response = $this->get('/properties-for-rent?listing_type=sale')->assertOk()
            ->assertSee('Properties for rent')->assertSee('LKR 75,000.00 / month')->assertDontSee('Sale fixture')
            ->assertSee('action="'.route('properties.rent').'"', false)
            ->assertSee('<link rel="canonical" href="'.route('properties.rent').'">', false);
        $this->assertSame([$rental->id], $response->viewData('properties')->modelKeys());
        foreach (['/properties','/listings-real-estate'] as $path) {
            $this->assertSame([$sale->id], $this->get($path.'?listing_type=rent')->assertOk()->viewData('properties')->modelKeys());
        }
        $this->get('/')->assertOk()->assertSee('Rent a property')->assertSee('Browse rentals')
            ->assertSee('href="'.route('properties.rent').'"', false)->assertDontSee('Tell us your requirements');
    }

    public function test_rental_filters_sort_and_pagination_stay_on_the_rental_page(): void
    {
        $expected = [];
        for ($i = 0; $i < 7; $i++) $expected[] = $this->listing(['total_price'=>75000 + $i])->id;
        $this->listing(['total_price'=>80000]);
        $this->listing(['city'=>'Gampaha']);
        $this->listing(['listing_type'=>'sale']);
        $query = http_build_query(['category'=>'house','district'=>'Gampaha','city'=>'Nittambuwa','bedrooms'=>3,'max_price'=>75006,'sort'=>'price_asc']);
        $response = $this->get('/properties-for-rent?'.$query)->assertOk()->assertSee('Maximum monthly rent (LKR)');
        $page = $response->viewData('properties');
        $this->assertSame(array_slice($expected, 0, 6), $page->modelKeys());
        $this->assertSame(7, $page->total());
        $this->assertStringStartsWith(route('properties.rent').'?',$page->nextPageUrl());
        $this->assertStringContainsString('max_price=75006', $page->nextPageUrl());
        $this->assertSame([$expected[6]], $this->get($page->nextPageUrl())->assertOk()->viewData('properties')->modelKeys());
        $this->get('/properties-for-rent?max_price=0')->assertOk()->assertSee('No rental properties are available');
    }

    public function test_rental_detail_sharing_and_purchase_matching_use_the_correct_price_meaning(): void
    {
        $rental = $this->listing();
        $sale = $this->listing(['listing_type'=>'sale']);
        $this->get('/properties/'.$rental->property_code)->assertOk()->assertSee('For rent')
            ->assertSee('LKR 75,000.00 / month')->assertSee('href="'.route('properties.rent', ['category'=>'house']).'"', false)
            ->assertViewHas('share', fn ($share) => str_contains($share['text'], 'LKR 75,000.00 / month'));
        $request = new PropertyRequest(['category'=>'house','district'=>'Gampaha','budget_max'=>100000]);
        $this->assertSame([$sale->id], $request->matches()->pluck('id')->all());
        $rental->total_price = null;
        $this->assertSame('Rent on request', $rental->priceLabel());
    }

    public function test_seller_agent_and_admin_can_create_edit_and_validate_rentals_without_bypassing_review(): void
    {
        $seller = $this->member();
        foreach (['seller','agent','admin'] as $role) {
            $this->actingAs($role === 'seller' ? $seller : $this->member($role));
            $prefix = '/'.$role.'/properties';
            $data = [
                'title'=>'Land rental '.$role, 'category'=>'land', 'listing_type'=>'rent',
                'owner_id'=>$seller->id, 'seller_email'=>$seller->email,
                'district'=>'Gampaha','city'=>'Nittambuwa','location'=>'Temple Road',
                'total_price'=>50000, 'price_per_perch'=>999, 'status'=>'published',
            ];
            $this->get($prefix.'/create')->assertOk()->assertSee('Listing type')->assertSee('For rent');
            $this->post($prefix, $data)->assertRedirect()->assertSessionHasNoErrors();
            $property = Property::latest('id')->firstOrFail();
            $this->assertSame('rent', $property->listing_type);
            $this->assertSame('draft', $property->status);
            $this->assertSame('50000.00', $property->total_price);
            $this->assertNull($property->price_per_perch);
            $this->get($prefix.'/'.$property->id.'/edit')->assertOk()->assertSee('Monthly rent (LKR)');
            $this->put($prefix.'/'.$property->id, array_replace($data, ['listing_type'=>'invalid']))->assertSessionHasErrors('listing_type');
            $this->assertSame('rent', $property->fresh()->listing_type);
            unset($data['listing_type']);
            $this->put($prefix.'/'.$property->id, $data)->assertSessionHasNoErrors();
            $this->assertSame('rent', $property->fresh()->listing_type);
            $this->put($prefix.'/'.$property->id, $data + ['listing_type'=>'sale'])->assertSessionHasNoErrors();
            $this->assertSame('sale', $property->fresh()->listing_type);
            $this->post($prefix, $data)->assertSessionHasNoErrors();
            $this->assertSame('sale', Property::latest('id')->firstOrFail()->listing_type);
        }
    }
}
