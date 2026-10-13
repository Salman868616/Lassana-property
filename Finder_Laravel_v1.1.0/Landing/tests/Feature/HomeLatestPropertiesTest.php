<?php
namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class HomeLatestPropertiesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\PropertyCategorySeeder::class);
        $this->travelTo(CarbonImmutable::parse('2026-10-02 10:00:00', 'Asia/Colombo'));
    }

    private function listing(string $title, string $publishedAt, string $status = 'published'): Property
    {
        $owner = User::factory()->create();
        $property = new Property();
        $property->forceFill([
            'owner_id'=>$owner->id, 'created_by'=>$owner->id, 'category'=>'land',
            'property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),
            'title'=>$title, 'district'=>'Gampaha', 'city'=>'Nittambuwa', 'status'=>$status,
            'published_at'=>$publishedAt, 'total_price'=>2000000, 'currency'=>'LKR',
        ])->save();
        return $property;
    }

    public function test_latest_includes_older_publications_and_excludes_unpublished_and_deleted_properties(): void
    {
        $yesterday = $this->listing('Yesterday listing', '2026-10-01 01:00:00');
        $today = $this->listing('Today listing', '2026-10-02 01:00:00');
        $lastMonth = $this->listing('Last month listing', '2026-09-01 01:00:00');
        foreach (['draft', 'submitted', 'under_review', 'approved', 'sold', 'archived'] as $status) {
            $this->listing('Hidden '.$status, '2026-10-02 02:00:00', $status);
        }
        $this->listing('Deleted listing', '2026-10-02 03:00:00')->delete();
        foreach (['/', '/home-real-estate'] as $url) {
            $response = $this->get($url)->assertOk();
            $this->assertSame([$today->id, $yesterday->id, $lastMonth->id], $response->viewData('latestProperties')->modelKeys());
            $response->assertSee('Latest properties')->assertSee('LKR 2,000,000.00')
                ->assertSee($lastMonth->property_code)->assertSee('Yesterday listing')->assertSee('Last month listing')
                ->assertSee('Browse all properties')->assertDontSee('Hidden ')->assertDontSee('Deleted listing')
                ->assertDontSee('Added today');
        }
    }

    public function test_empty_state_when_no_published_properties_are_available(): void
    {
        $this->listing('Private draft', '2026-10-01 00:00:00', 'draft');
        $this->get('/')->assertOk()->assertSee('No properties are available right now. Please check back soon.')
            ->assertDontSee('Private draft');
    }

    public function test_homepage_limits_results_to_six_latest_publications(): void
    {
        $ids = [];
        for ($i=0; $i<8; $i++) {
            $ids[] = $this->listing('New listing '.$i, sprintf('2026-09-20 01:%02d:00', intdiv($i, 2)))->id;
        }
        $response = $this->get('/')->assertOk();
        $this->assertSame(array_slice(array_reverse($ids),0,6), $response->viewData('latestProperties')->modelKeys());
    }
}
