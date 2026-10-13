<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PublicPropertyListingTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\PropertyCategorySeeder::class);
    }

    private function listing(string $status = 'published', string $category = 'land'): Property
    {
        $owner = User::factory()->create();
        $property = new Property;
        $property->forceFill([
            'owner_id'=>$owner->id, 'created_by'=>$owner->id,
            'title'=>'Listing fixture '.$owner->id, 'description'=>'A database property description.',
            'category'=>$category,
            'property_category_id'=>DB::table('property_categories')->where('slug', $category)->value('id'),
            'status'=>$status, 'district'=>'Gampaha', 'city'=>'Nittambuwa',
            'location'=>'Test location', 'total_price'=>2000000, 'currency'=>'LKR',
            'latitude'=>7.14, 'longitude'=>80.10, 'published_at'=>now(),
        ])->save();
        return $property;
    }

    public function test_public_pages_and_map_exclude_every_non_published_status_and_deleted_records(): void
    {
        $public = $this->listing();
        $hidden = [];
        foreach (['draft', 'submitted', 'under_review', 'approved', 'sold', 'archived'] as $status) {
            $hidden[] = $this->listing($status);
        }
        $deleted = $this->listing();
        $deleted->delete();
        $hidden[] = $deleted;
        foreach (['/', '/properties', '/listings-real-estate'] as $url) {
            $response = $this->get($url)->assertOk()->assertSee($public->title);
            foreach ($hidden as $property) $response->assertDontSee($property->title);
        }
        $this->get('/properties/'.$public->property_code)->assertOk()->assertSee($public->description);
        foreach ($hidden as $property) $this->get('/properties/'.$property->property_code)->assertNotFound();
        $this->getJson('/properties-map.json')->assertOk()->assertJsonCount(1)->assertJsonPath('0.id', $public->id);
    }

    public function test_both_listing_pages_filter_paginate_and_use_stable_newest_order(): void
    {
        $ids = [];
        for ($i = 0; $i < 13; $i++) $ids[] = $this->listing()->id;
        $this->listing('published', 'house');
        $this->listing('draft');
        foreach (['/properties', '/listings-real-estate'] as $url) {
            $page = $this->get($url.'?category=land&district=Gampaha&sort=newest')->assertOk();
            $properties = $page->viewData('properties');
            $this->assertSame(13, $properties->total());
            $this->assertSame(array_slice(array_reverse($ids), 0, 6), $properties->getCollection()->modelKeys());
            $next = $properties->nextPageUrl();
            $this->assertStringContainsString('category=land', $next);
            $this->assertStringContainsString('district=Gampaha', $next);
            $this->assertSame(array_slice(array_reverse($ids), 6, 6), $this->get($next)->assertOk()->viewData('properties')->getCollection()->modelKeys());
        }
    }

    public function test_empty_results_and_missing_images_have_readable_fallbacks(): void
    {
        foreach (['/properties', '/listings-real-estate'] as $url) {
            $this->get($url)->assertOk()->assertSee('No properties match your search.');
        }
        $property = $this->listing();
        $this->get('/properties')->assertOk()->assertSee('No photo available')
            ->assertSee('2,000,000.00')->assertSee(route('properties.show', $property->property_code), false);
        $this->get('/properties?category=apartment')->assertOk()->assertSee('No properties match your search.');
    }

    public function test_city_counts_use_published_records_and_sample_routes_no_longer_show_demo_listings(): void
    {
        $this->listing();
        $this->listing();
        $this->listing('draft');
        $deleted = $this->listing();
        $deleted->delete();
        $response = $this->get('/')->assertOk()->assertDontSee('New York');
        $cities = $response->viewData('propertyCities');
        $this->assertCount(1, $cities);
        $this->assertSame(2, (int) $cities->first()->property_count);
        $this->assertSame('Nittambuwa', $cities->first()->city);
        $response->assertSee(e(route('properties.index', ['district'=>'Gampaha', 'city'=>'Nittambuwa'])), false);
        $this->get('/single-entry-real-estate')->assertRedirect('/properties');
        $this->get('/index')->assertRedirect('/');
    }
}
