<?php
namespace Tests\Feature;

use App\Services\LocationCatalog;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class LocationCatalogTest extends TestCase
{
    public function test_source_counts_and_parent_links_are_intact(): void
    {
        $data = LocationCatalog::all();
        $this->assertCount(9, $data['provinces']);
        $this->assertCount(25, $data['districts']);
        $this->assertCount(1846, $data['cities']);
        foreach ($data['districts'] as $row) $this->assertContains($row['province_id'], array_column($data['provinces'], 'id'));
        foreach ($data['cities'] as $row) $this->assertContains($row['district_id'], array_column($data['districts'], 'id'));
    }

    public function test_location_names_are_canonicalized_and_district_only_is_allowed(): void
    {
        $this->assertSame(['district'=>'Gampaha', 'city'=>'Nittambuwa'], LocationCatalog::validate(['district'=>'gampaha', 'city'=>'nittambuwa']));
        $this->assertSame(['district'=>'Colombo', 'city'=>null], LocationCatalog::validate(['district'=>'Colombo', 'city'=>null]));
    }

    public function test_city_from_another_district_is_rejected(): void
    {
        $this->expectException(ValidationException::class);
        LocationCatalog::validate(['district'=>'Colombo', 'city'=>'Nittambuwa']);
    }

    public function test_unknown_district_is_rejected(): void
    {
        $this->expectException(ValidationException::class);
        LocationCatalog::validate(['district'=>'Unknown district', 'city'=>'']);
    }

    public function test_unchanged_legacy_pair_is_preserved_but_changed_pair_is_validated(): void
    {
        $saved = (object) ['district'=>'Gampaha', 'city'=>'Legacy locality'];
        $this->assertSame((array) $saved, LocationCatalog::validate((array) $saved, $saved));
        $this->expectException(ValidationException::class);
        LocationCatalog::validate(['district'=>'Colombo', 'city'=>'Legacy locality'], $saved);
    }

    public function test_legacy_pair_is_rendered_only_when_explicitly_allowed(): void
    {
        // Direct Blade rendering does not run ShareErrorsFromSession middleware.
        view()->share('errors', new \Illuminate\Support\ViewErrorBag());
        $view = $this->blade('<x-location-fields district="Gampaha" city="Legacy locality" :legacy="true" />');
        $view->assertSee('Legacy locality');
        $this->blade('<x-location-fields district="Gampaha" city="Legacy locality" />')->assertDontSee('Legacy locality');
    }
}
