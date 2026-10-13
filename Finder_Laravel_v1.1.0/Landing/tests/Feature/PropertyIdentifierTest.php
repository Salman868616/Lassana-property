<?php
namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use App\Services\PropertyIdentifier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PropertyIdentifierTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\PropertyCategorySeeder::class);
    }

    private function listing(?string $district = 'Gampaha', string $status = 'published'): Property
    {
        $owner = User::factory()->create();
        $property = new Property();
        $property->forceFill(['owner_id'=>$owner->id, 'created_by'=>$owner->id,
            'category'=>'land', 'property_category_id'=>DB::table('property_categories')->where('slug', 'land')->value('id'),
            'title'=>'Identifier test', 'district'=>$district, 'status'=>$status, 'property_code'=>'UNTRUSTED']);
        $property->save();
        return $property->refresh();
    }

    public function test_codes_use_district_and_database_id_with_no_duplicate_mat_prefixes(): void
    {
        $gampaha = $this->listing();
        $this->assertSame(sprintf('LP-GAM-%05d', $gampaha->id), $gampaha->property_code);
        $matale = $this->listing('Matale');
        $matara = $this->listing('Matara');
        $this->assertStringStartsWith('LP-MAT-', $matale->property_code);
        $this->assertStringStartsWith('LP-MAT-', $matara->property_code);
        $this->assertNotSame($matale->property_code, $matara->property_code);
        $this->assertSame('LP-NUW-100000', PropertyIdentifier::format(100000, 'Nuwara Eliya'));
    }

    public function test_district_correction_preserves_previous_links_and_ignores_supplied_code(): void
    {
        $property = $this->listing();
        $old = $property->property_code;
        $property->update(['district'=>'Colombo', 'property_code'=>'UNTRUSTED']);
        $this->assertSame(sprintf('LP-COL-%05d', $property->id), $property->property_code);
        $this->get(route('properties.show', $old))->assertStatus(301)->assertRedirect(route('properties.show', $property->property_code));
        $this->get(route('properties.show', $property->property_code))->assertOk();
        $property->update(['title'=>'Changed title']);
        $this->assertDatabaseCount('property_code_aliases', 1);
    }

    public function test_aliases_do_not_expose_unpublished_or_deleted_properties(): void
    {
        $property = $this->listing();
        $old = $property->property_code;
        $property->update(['district'=>'Kandy', 'status'=>'draft']);
        $this->get(route('properties.show', $old))->assertNotFound();
        $property->update(['status'=>'published']);
        $property->delete();
        $this->get(route('properties.show', $old))->assertNotFound();
        $this->get(route('properties.show', $property->property_code))->assertNotFound();
    }

    public function test_districtless_draft_receives_code_when_location_is_selected(): void
    {
        $property = $this->listing(null, 'draft');
        $this->assertStringStartsWith('LP-UND-', $property->property_code);
        $property->update(['district'=>'Gampaha']);
        $this->assertSame(sprintf('LP-GAM-%05d', $property->id), $property->property_code);
    }

    public function test_migration_backfills_existing_and_deleted_records_without_changing_relations(): void
    {
        $first = $this->listing();
        $second = $this->listing('Colombo');
        $second->delete();
        DB::table('properties')->where('id', $first->id)->update(['property_code'=>'LP-OLD-PUBLIC']);
        DB::table('properties')->where('id', $second->id)->update(['property_code'=>'LP-OLD-DELETED']);
        $migration = require database_path('migrations/2026_10_02_120000_use_district_property_identifiers.php');
        $migration->down();
        $migration->up();
        $this->assertSame(sprintf('LP-GAM-%05d', $first->id), $first->fresh()->property_code);
        $this->assertDatabaseHas('property_code_aliases', ['property_id'=>$first->id, 'code'=>'LP-OLD-PUBLIC']);
        $this->assertDatabaseHas('property_code_aliases', ['property_id'=>$second->id, 'code'=>'LP-OLD-DELETED']);
        $this->assertSame($first->owner_id, $first->fresh()->owner_id);
        $this->get('/properties/LP-OLD-PUBLIC')->assertRedirect(route('properties.show', $first->fresh()->property_code));
        $this->get('/properties/LP-OLD-DELETED')->assertNotFound();
    }
}
