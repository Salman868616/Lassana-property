<?php
namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PropertySearchTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\PropertyCategorySeeder::class);
    }

    private function listing(array $attributes = [], array $details = ['bedrooms'=>3, 'floor_area'=>1500]): Property
    {
        $owner = User::factory()->create();
        $p = new Property;
        $p->forceFill(array_merge([
            'owner_id'=>$owner->id, 'created_by'=>$owner->id, 'title'=>'Search fixture '.$owner->id,
            'category'=>'house', 'property_category_id'=>DB::table('property_categories')->where('slug', $attributes['category'] ?? 'house')->value('id'),
            'status'=>'published', 'district'=>'Gampaha', 'city'=>'Nittambuwa', 'location'=>'Temple Road',
            'total_price'=>2000000, 'currency'=>'LKR', 'land_size_perches'=>20, 'published_at'=>now(),
        ], $attributes))->save();
        if ($details) $p->details()->create($details);
        return $p;
    }

    private function ids(array $filters, string $path = '/properties'): array
    {
        return $this->get($path.'?'.http_build_query($filters))->assertOk()->viewData('properties')->getCollection()->modelKeys();
    }

    public function test_combined_filters_match_boundaries_and_exclude_partial_matches_and_private_listings(): void
    {
        $match = $this->listing();
        foreach ([['total_price'=>2000001], ['land_size_perches'=>19], ['city'=>'Gampaha'], ['category'=>'apartment'], ['status'=>'draft'], ['status'=>'sold'], ['location'=>'Lake Road']] as $change) $this->listing($change);
        $this->listing([], ['bedrooms'=>2, 'floor_area'=>1500]);
        $this->listing([], ['bedrooms'=>3, 'floor_area'=>1501]);
        $deleted = $this->listing(); $deleted->delete();
        $filters = ['category'=>'house','district'=>'Gampaha','city'=>'Nittambuwa','location'=>'Temple',
            'min_price'=>2000000,'max_price'=>2000000,'bedrooms'=>3,
            'min_land_size'=>20,'max_land_size'=>20,'min_floor_area'=>1500,'max_floor_area'=>1500];
        foreach (['/properties','/listings-real-estate'] as $path) $this->assertSame([$match->id], $this->ids($filters, $path));
    }

    public function test_studio_zero_and_one_sided_ranges_exclude_unknown_values(): void
    {
        $studio = $this->listing(['category'=>'apartment','land_size_perches'=>null], ['bedrooms'=>0,'floor_area'=>500]);
        $house = $this->listing();
        $this->listing(['total_price'=>null,'land_size_perches'=>null], []);
        $this->assertSame([$studio->id], $this->ids(['bedrooms'=>0]));
        $this->assertSame([$studio->id], $this->ids(['max_floor_area'=>500]));
        $this->assertSame([$house->id], $this->ids(['min_land_size'=>20]));
        $this->assertSame([$house->id], $this->ids(['max_land_size'=>20]));
        $this->assertSame([$house->id], $this->ids(['min_floor_area'=>1500]));
        $this->assertSame([], $this->ids(['max_price'=>0]));
        $this->assertCount(2, $this->ids(['max_price'=>2000000]));
    }

    public function test_invalid_filters_return_validation_errors(): void
    {
        foreach ([
            [['min_price'=>100,'max_price'=>99], 'max_price'],
            [['min_land_size'=>20,'max_land_size'=>19], 'max_land_size'],
            [['min_floor_area'=>100,'max_floor_area'=>99], 'max_floor_area'],
            [['bedrooms'=>-1], 'bedrooms'], [['bedrooms'=>1.5], 'bedrooms'],
            [['max_price'=>'abc'], 'max_price'], [['min_land_size'=>-1], 'min_land_size'],
            [['min_floor_area'=>['invalid']], 'min_floor_area'],
        ] as [$filters, $field]) {
            $this->getJson('/properties?'.http_build_query($filters))->assertUnprocessable()->assertJsonValidationErrors($field);
        }
    }

    public function test_filters_survive_pagination_and_price_sorting_and_clear_link_removes_them(): void
    {
        $ids = [];
        for ($i=0; $i<13; $i++) $ids[] = $this->listing(['total_price'=>2000000+$i])->id;
        $filters = ['bedrooms'=>3,'min_price'=>2000000,'max_price'=>2000012,'min_floor_area'=>1500,'min_land_size'=>20,'sort'=>'price_asc'];
        $response = $this->get('/properties?'.http_build_query($filters))->assertOk();
        $page = $response->viewData('properties');
        $this->assertSame(array_slice($ids,0,6), $page->getCollection()->modelKeys());
        parse_str(parse_url($page->nextPageUrl(), PHP_URL_QUERY), $query);
        foreach ($filters as $key=>$value) $this->assertSame((string)$value, $query[$key]);
        $this->assertSame(array_slice($ids,6,6), $this->get($page->nextPageUrl())->assertOk()->viewData('properties')->getCollection()->modelKeys());
        $this->assertSame(array_slice(array_reverse($ids),0,6), $this->ids(array_merge($filters,['sort'=>'price_desc'])));
        $response->assertSee('href="'.route('properties.index').'"', false)->assertSee('Maximum price (LKR)');
        $this->assertSame(13, $this->get('/properties')->assertOk()->viewData('properties')->total());
    }
    public function test_category_ignores_inapplicable_filters_and_removes_them_from_pagination(): void
    {
        foreach (['land', 'house', 'apartment', 'commercial'] as $category) {
            $property = $this->listing(['category'=>$category]);
            $irrelevant = match ($category) {
                'land' => ['bedrooms'=>'invalid', 'min_floor_area'=>2000, 'max_floor_area'=>1],
                'apartment' => ['min_land_size'=>'invalid', 'max_land_size'=>1],
                'commercial' => ['bedrooms'=>'invalid', 'min_land_size'=>100, 'max_land_size'=>1],
                default => [],
            };
            $response = $this->get('/properties?'.http_build_query(array_merge(['category'=>$category], $irrelevant)))->assertOk();
            $page = $response->viewData('properties');
            $this->assertSame([$property->id], $page->getCollection()->modelKeys());
            parse_str(parse_url($page->url(2), PHP_URL_QUERY), $query);
            foreach ($irrelevant as $field=>$value) $this->assertArrayNotHasKey($field, $query);
        }
        $this->getJson('/properties?category=house&bedrooms=invalid')->assertUnprocessable()->assertJsonValidationErrors('bedrooms');
        $this->getJson('/properties?category=land&min_land_size=20&max_land_size=1')->assertUnprocessable()->assertJsonValidationErrors('max_land_size');
        $this->getJson('/properties?category=apartment&min_floor_area=20&max_floor_area=1')->assertUnprocessable()->assertJsonValidationErrors('max_floor_area');
    }
}
