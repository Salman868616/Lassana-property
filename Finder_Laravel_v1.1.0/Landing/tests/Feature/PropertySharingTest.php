<?php
namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PropertySharingTest extends TestCase
{
    use RefreshDatabase;

    private function listing(): Property
    {
        $this->seed(\Database\Seeders\PropertyCategorySeeder::class);
        $owner = User::factory()->create();
        $p = new Property;
        $p->forceFill([
            'owner_id'=>$owner->id, 'created_by'=>$owner->id,
            'title'=>'Garden "Home" & Land', 'description'=>'<b>Lovely</b> property near town.',
            'category'=>'land', 'property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),
            'district'=>'Gampaha', 'city'=>'Nittambuwa', 'status'=>'published',
            'currency'=>'LKR', 'total_price'=>2000000,
        ])->save();
        return $p;
    }

    public function test_public_preview_and_whatsapp_use_canonical_url_and_cover_photo(): void
    {
        $p = $this->listing();
        $p->images()->create(['path'=>'properties/example/second.jpg','sort_order'=>2]);
        $p->images()->create(['path'=>'properties/example/cover.jpg','sort_order'=>1]);
        $url = route('properties.show', $p->property_code);
        $response = $this->get($url.'?tracking=example')->assertOk();
        $share = $response->viewData('share');
        $this->assertSame($url, $share['url']);
        $this->assertSame(asset('storage/properties/example/cover.jpg'), $share['image']);
        $this->assertStringContainsString('Nittambuwa, Gampaha', $share['description']);
        $this->assertStringContainsString('LKR 2,000,000.00', $share['description']);
        $this->assertStringNotContainsString('<b>', $share['description']);
        parse_str(parse_url($share['whatsapp'], PHP_URL_QUERY), $query);
        $this->assertSame($share['text']."\n".$url, $query['text']);
        $response->assertSee('<meta property="og:title" content="'.e($share['title']).'">', false)
            ->assertSee('<meta property="og:image" content="'.e($share['image']).'">', false)
            ->assertSee('<link rel="canonical" href="'.e($url).'">', false)
            ->assertSee('Share property')->assertSee('WhatsApp')->assertSee('Copy link');
    }

    public function test_no_photo_uses_brand_fallback_and_private_listings_have_no_preview(): void
    {
        $p = $this->listing();
        $response = $this->get(route('properties.show', $p->property_code))->assertOk();
        $this->assertSame(asset('assets/img/lassana-property-logo.png'), $response->viewData('share')['image']);
        foreach (['draft','submitted','under_review','approved'] as $status) {
            $p->forceFill(['status'=>$status])->save();
            $this->get(route('properties.show', $p->property_code))->assertNotFound()->assertDontSee('og:title');
        }
    }
}