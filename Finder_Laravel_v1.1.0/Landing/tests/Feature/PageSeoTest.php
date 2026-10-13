<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class PageSeoTest extends TestCase {
    use RefreshDatabase;
    public function test_location_pages_have_relevant_metadata_and_clean_canonical(): void {
        $this->seed(\Database\Seeders\PropertyCategorySeeder::class);
        $url=route('properties.index',['category'=>'house','district'=>'Gampaha','city'=>'Nittambuwa']);
        $response=$this->get($url.'&utm_source=test')->assertOk();
        $response->assertSee('<title>Houses in Nittambuwa, Gampaha | Lassana Property</title>',false)
            ->assertSee('<link rel="canonical" href="'.e($url).'">',false)
            ->assertSee('<meta name="robots" content="index, follow">',false)
            ->assertDontSee('SRBThemes')->assertDontSee('multipurpose, ui kit');
        $this->assertSame(1,substr_count($response->getContent(),'<meta name="description"'));
    }
    public function test_filtered_pages_keep_filters_and_are_not_indexed(): void {
        $this->seed(\Database\Seeders\PropertyCategorySeeder::class);
        $url=route('properties.index',['district'=>'Gampaha','min_price'=>'1000','sort'=>'price_asc']);
        $this->get($url)->assertOk()->assertSee('<meta name="robots" content="noindex, follow">',false)
            ->assertSee('<link rel="canonical" href="'.e($url).'">',false);
    }
    public function test_account_pages_are_not_indexed_and_contact_has_brand_preview(): void {
        $this->get('/account-signin')->assertOk()->assertSee('<meta name="robots" content="noindex, nofollow">',false);
        $this->get('/contact-us')->assertOk()->assertSee('property="og:site_name" content="Lassana Property"',false)
            ->assertSee('<link rel="canonical" href="'.route('contact-us').'">',false);
    }
    public function test_location_metadata_escapes_user_input(): void {
        $this->seed(\Database\Seeders\PropertyCategorySeeder::class);
        $this->get(route('properties.index',['city'=>'<script>alert(1)</script>']))->assertOk()
            ->assertDontSee('<script>alert(1)</script>',false)
            ->assertSee('<title>Properties in &lt;script&gt;alert(1)&lt;/script&gt; | Lassana Property</title>',false)
            ->assertSee('property="og:title" content="Properties in &lt;script&gt;alert(1)&lt;/script&gt; | Lassana Property"',false)
            ->assertDontSee('&amp;lt;script&amp;gt;',false);
    }
}
