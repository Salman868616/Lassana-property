<?php
namespace Tests\Feature;

use App\Models\{Developer, Property, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SectionOnePublicWebsiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class,\Database\Seeders\PropertyCategorySeeder::class]);
    }
    private function member(string $role): User
    {
        $u=User::factory()->create();
        $u->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $u;
    }
    private function listing(array $attributes=[]): Property
    {
        $owner=$this->member('seller');
        $p=new Property;
        $p->forceFill(array_merge(['owner_id'=>$owner->id,'created_by'=>$owner->id,'title'=>'Listing '.$owner->id,
            'category'=>'land','property_category_id'=>DB::table('property_categories')->where('slug',$attributes['category'] ?? 'land')->value('id'),'district'=>'Gampaha','city'=>'Nittambuwa','status'=>'published',
            'total_price'=>2000000,'currency'=>'LKR','published_at'=>now()],$attributes))->save();
        return $p;
    }
    public function test_public_service_faq_and_legal_pages_work_without_an_account(): void
    {
        foreach (['/services','/services/sell-your-property','/services/property-verification','/services/property-inspection',
            '/services/overseas-property','/services/build-your-home','/faqs','/developers'] as $url) {
            $this->get($url)->assertOk()->assertSee('id="public-language"',false);
        }
    }
    public function test_legal_pages_are_pending_not_template_legal_copy(): void
    {
        foreach (['/terms-and-conditions','/privacy-policy','/disclaimer'] as $url) {
            $this->get($url)->assertOk()->assertSee('The company-approved version of this page is being prepared.')
                ->assertDontSee('Finder')->assertSee('noindex, nofollow');
        }
        $this->get('/services/unknown')->assertNotFound();
        $this->get('/services/build-your-home')->assertSee('type=lgc_service',false);
        $this->get('/services/property-inspection')->assertSee('type=inspection',false);
        $this->actingAs($this->member('buyer'))->get('/buyer/service-requests/create?type=lgc_service')->assertOk();
    }
    public function test_category_pages_and_combined_villa_search_only_show_matching_published_sales(): void
    {
        $v=$this->listing(['category'=>'villa','title'=>'Visible villa']);
        $a=$this->listing(['category'=>'apartment','title'=>'Visible apartment']);
        $h=$this->listing(['category'=>'house','title'=>'Separate house']);
        $rent=$this->listing(['category'=>'villa','listing_type'=>'rent','title'=>'Rental villa']);
        $draft=$this->listing(['category'=>'villa','status'=>'draft','title'=>'Hidden villa']);
        $this->get('/apartments-and-villas')->assertOk()->assertSee($v->title)->assertSee($a->title)
            ->assertDontSee($h->title)->assertDontSee($rent->title)->assertDontSee($draft->title);
        $this->get('/properties?category=apartments-villas')->assertOk()->assertSee($v->title)->assertSee($a->title)->assertDontSee($h->title);
        foreach (['/land-for-sale'=>'land','/houses-for-sale'=>'house','/commercial-properties'=>'commercial'] as $url=>$category) {
            $p=$this->listing(['category'=>$category,'title'=>'Visible '.$category]);
            $this->get($url)->assertOk()->assertSee($p->title)->assertDontSee($v->title);
        }
        $this->get('/all-properties')->assertOk()->assertSee($rent->title)->assertDontSee($draft->title)->assertViewHas('properties',fn($p)=>$p->total()===7);
    }
    public function test_verified_browse_and_home_only_expose_current_verified_published_properties(): void
    {
        $basic=$this->listing(['verification_level'=>'basic','title'=>'Basic public']);
        $silver=$this->listing(['verification_level'=>'silver','listing_type'=>'rent','title'=>'Silver rental']);
        $plain=$this->listing(['title'=>'Unverified public']);
        $draft=$this->listing(['verification_level'=>'silver','status'=>'draft','title'=>'Private verified']);
        $future=$this->listing(['verification_level'=>'gold','title'=>'Future tier']);
        $this->get('/verified-properties')->assertOk()->assertSee($basic->title)->assertSee($silver->title)
            ->assertDontSee($plain->title)->assertDontSee($draft->title)->assertDontSee($future->title);
        $home=$this->get('/')->assertOk()->assertSee('Verified properties')->assertDontSee($draft->title);
        $this->assertEquals(4,substr_count($home->getContent(),'data-latest-property='));
    }
    public function test_all_and_verified_pages_keep_their_scope_on_pagination_and_filtering(): void
    {
        for($i=0;$i<8;$i++)$this->listing(['verification_level'=>'basic','listing_type'=>$i%2?'rent':'sale']);
        $this->get('/all-properties?sort=price_asc')->assertOk()->assertSee('/all-properties?sort=price_asc',false);
        $this->get('/verified-properties?page=2')->assertOk()->assertViewHas('properties',fn($p)=>$p->count()===2 && $p->total()===8);
        $this->get('/verified-properties?category=villa')->assertOk()->assertViewHas('properties',fn($p)=>$p->total()===0);
    }
    public function test_seller_admin_and_agent_can_create_villas_without_gaining_control_of_company_assignment(): void
    {
        $owner=$this->member('seller');
        $company=Developer::create(['name'=>'Published company','is_published'=>true]);
        foreach(['seller','admin','agent'] as $role) {
            $user=$role==='seller'?$owner:$this->member($role);
            $this->actingAs($user)->post('/'.$role.'/properties',[
                'owner_id'=>$owner->id,'seller_email'=>$owner->email,'category'=>'villa','title'=>'New villa','description'=>'Villa details',
                'district'=>'Gampaha','city'=>'Nittambuwa','location'=>'Test address','total_price'=>1000000,
                'land_size_perches'=>12,'developer_id'=>$company->id,
                'details'=>['bedrooms'=>3,'bathrooms'=>2,'floor_area'=>1200,'property_age'=>2,'condition'=>'Good','developer'=>'Example company','amenities'=>"Garden\nPool"],
            ])->assertSessionHasNoErrors();
            $p=Property::latest('id')->firstOrFail();
            $this->assertSame('villa',$p->category);
            $this->assertSame('villa',$p->propertyCategory->slug);
            $this->assertSame('1200.00',$p->details->floor_area);
            $this->assertEquals(12,$p->land_size_perches);
            $this->assertNull($p->developer_id);
        }
    }
    public function test_company_profiles_and_property_links_respect_both_publication_states(): void
    {
        $public=Developer::create(['name'=>'Public builder','is_published'=>true,'description'=>'<script>alert(1)</script>']);
        $private=Developer::create(['name'=>'Private builder','is_published'=>false]);
        $p=$this->listing(['developer_id'=>$public->id,'title'=>'Public company property']);
        $draft=$this->listing(['developer_id'=>$public->id,'status'=>'draft','title'=>'Private company property']);
        $this->get('/developers')->assertOk()->assertSee($public->name)->assertDontSee($private->name)->assertSee('1 published properties');
        $this->get('/developers/'.$public->id)->assertOk()->assertSee($p->title)->assertDontSee($draft->title)
            ->assertSee('&lt;script&gt;',false)->assertDontSee('<script>alert(1)</script>',false);
        $this->get('/developers/'.$private->id)->assertNotFound();
        $this->get('/properties/'.$p->property_code)->assertOk()->assertSee(route('developers.show',$public),false);
        $public->update(['is_published'=>false]);
        $this->get('/properties/'.$p->property_code)->assertOk()->assertDontSee(route('developers.show',$public),false);
        $this->assertSame('published',$p->fresh()->status);
    }
    public function test_only_admins_manage_company_profiles(): void
    {
        $d=Developer::create(['name'=>'Builder','is_published'=>false]);
        $this->post('/admin/developers',['name'=>'No access','is_published'=>1])->assertRedirect();
        foreach(['buyer','seller','agent','sales','verification'] as $role) {
            $this->actingAs($this->member($role))->get('/admin/developers')->assertForbidden();
            $this->post('/admin/developers',['name'=>'No access','is_published'=>1])->assertForbidden();
            $this->put('/admin/developers/'.$d->id,['name'=>'No access','is_published'=>1])->assertForbidden();
        }
        $this->assertDatabaseCount('developers',1);
    }
    public function test_admin_can_create_publish_link_unlink_and_unpublish_companies(): void
    {
        $p=$this->listing();
        $this->actingAs($this->member('admin'));
        $this->get('/admin/developers/create')->assertOk()->assertSee('Company name');
        $this->post('/admin/developers',['name'=>'Example builder','is_published'=>0,'property_ids'=>[$p->id]])->assertSessionHasNoErrors();
        $d=Developer::firstOrFail();
        $this->assertSame($d->id,$p->fresh()->developer_id);
        $this->get('/admin/developers/'.$d->id.'/edit')->assertOk()->assertSee('checked',false);
        $this->put('/admin/developers/'.$d->id,['name'=>$d->name,'is_published'=>1,'property_ids'=>[$p->id]])->assertSessionHasNoErrors();
        $this->assertTrue($d->fresh()->is_published);
        $this->put('/admin/developers/'.$d->id,['name'=>$d->name,'is_published'=>0])->assertSessionHasNoErrors();
        $this->assertFalse($d->fresh()->is_published);
        $this->assertNull($p->fresh()->developer_id);
        $this->assertSame('published',$p->fresh()->status);
    }
    public function test_admin_cannot_steal_other_company_properties_or_publish_unsafe_urls(): void
    {
        $d=Developer::create(['name'=>'First company','is_published'=>true]);
        $p=$this->listing(['developer_id'=>$d->id]);
        $this->actingAs($this->member('admin'));
        $this->post('/admin/developers',['name'=>'Other company','is_published'=>1,'property_ids'=>[$p->id]])->assertSessionHasErrors('property_ids');
        $this->post('/admin/developers',['name'=>'Other company','is_published'=>1,'property_ids'=>[999999]])->assertSessionHasErrors('property_ids');
        foreach(['javascript:alert(1)','ftp://example.com/file'] as $website) {
            $this->put('/admin/developers/'.$d->id,['name'=>$d->name,'is_published'=>1,'website'=>$website])->assertSessionHasErrors('website');
        }
        $this->assertDatabaseCount('developers',1);
        $this->assertSame($d->id,$p->fresh()->developer_id);
    }
    public function test_language_switch_persists_on_public_pages_and_preserves_search_query(): void
    {
        $this->post('/language',['locale'=>'si','return_path'=>'/properties?category=villa'])->assertRedirect('http://localhost:8000/properties?category=villa');
        $this->get('/')->assertOk()->assertSee('lang="si"',false)->assertSee('මුල් පිටුව')->assertSee('සොයන්න');
        $this->get('/services')->assertOk()->assertSee('දේපළ සේවා');
        $this->get('/faqs')->assertOk()->assertSee('නිතර අසන ප්‍රශ්න');
        $this->get('/properties?category=villa')->assertOk()->assertSee('විලා නිවස');
        $this->get('/account-signin')->assertOk()->assertSee('Welcome back');
        $this->post('/language',['locale'=>'en','return_path'=>'/'])->assertRedirect('http://localhost:8000/');
        $this->get('/')->assertOk()->assertSee('lang="en"',false)->assertSee('Find your land or home in Sri Lanka');
    }
    public function test_language_switch_rejects_unsupported_languages_and_external_redirects(): void
    {
        $this->post('/language',['locale'=>'fr'])->assertSessionHasErrors('locale');
        foreach(['https://example.com/','//example.com/','/%2fexample.com','/\\example.com',"/\r\nLocation: https://example.com"] as $path) {
            $this->post('/language',['locale'=>'en','return_path'=>$path])->assertRedirect('http://localhost:8000/');
        }
    }
}
