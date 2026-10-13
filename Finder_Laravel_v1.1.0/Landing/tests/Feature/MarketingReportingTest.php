<?php
namespace Tests\Feature;
use App\Models\{User,Property,CrmLead,MarketingCampaign,CampaignSpend};
use App\Services\MarketingOverview;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
class MarketingReportingTest extends TestCase {
    use RefreshDatabase;
    protected function setUp(): void {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class,\Database\Seeders\PropertyCategorySeeder::class]);
        $this->travelTo(\Carbon\Carbon::parse('2026-10-07 06:00:00','UTC'));
    }
    private function member($role): User {
        $u=User::factory()->create();$u->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));return $u;
    }
    private function campaign($code='october'): MarketingCampaign {
        $c=new MarketingCampaign(['name'=>'October homes']);$c->forceFill(['code'=>$code,'created_by'=>$this->member('admin')->id])->save();return $c;
    }
    private function listing(): Property {
        $u=$this->member('seller');$p=new Property;
        $p->forceFill(['title'=>'Campaign property','owner_id'=>$u->id,'created_by'=>$u->id,'category'=>'land',
            'property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),'status'=>'published'])->save();return $p;
    }
    private function enquiry($p,$extra=[]): void {
        $this->post(route('properties.enquiries.store',$p),$extra+['name'=>'Customer','email'=>'test@example.test','message'=>'Details please'])->assertSessionHasNoErrors();
    }
    public function test_visitors_are_unique_sessions_with_page_views_and_local_day_boundaries(): void {
        $this->withSession(['visitor_token'=>'first'])->get('/')->assertOk();
        $this->get('/properties')->assertOk();
        $m=app(MarketingOverview::class)->build();
        $this->assertSame(1,$m['visitorsToday']);$this->assertSame(2,$m['pageViews30']);
        $this->withSession(['visitor_token'=>'second'])->get('/about-us')->assertOk();
        $this->assertSame(2,app(MarketingOverview::class)->build()['visitors30']);
        $this->travelTo(\Carbon\Carbon::parse('2026-10-07 18:30:00','UTC'));
        $this->get('/properties')->assertOk();
        $m=app(MarketingOverview::class)->build();$this->assertSame(1,$m['visitorsToday']);$this->assertSame(2,$m['visitors30']);
        $this->assertSame(4,$m['pageViews30']);
        DB::table('website_visitors')->insert(['visited_on'=>'2026-09-08','visitor_hash'=>'old','page_views'=>9]);
        $this->assertSame(4,app(MarketingOverview::class)->build()['pageViews30']);
        $this->assertDatabaseHas('website_visitors',['visited_on'=>'2026-10-08','page_views'=>1]);
    }
    public function test_staff_bots_json_private_pages_and_errors_are_not_visitors(): void {
        $this->withHeaders(['User-Agent'=>'Googlebot'])->get('/')->assertOk();
        $this->withHeaders(['User-Agent'=>'Browser'])->getJson('/properties-map.json')->assertOk();
        $this->get('/properties/no-such-listing')->assertNotFound();
        foreach(['admin','sales','verification','agent','seller'] as $r)$this->actingAs($this->member($r))->get('/')->assertOk();
        $this->actingAs($this->member('buyer'))->get('/dashboard/buyer')->assertOk();
        $this->assertDatabaseCount('website_visitors',0);
        $this->get('/properties')->assertOk();$this->assertDatabaseCount('website_visitors',1);
        config(['marketing.enabled'=>false]);$this->get('/')->assertOk();
        $this->assertEquals(1,DB::table('website_visitors')->sum('page_views'));
    }
    public function test_known_campaign_is_attributed_and_form_fields_cannot_override_it(): void {
        $c=$this->campaign();$other=$this->campaign('other');$p=$this->listing();
        $this->get('/properties?utm_campaign=october')->assertOk();
        $this->get('/properties?utm_campaign=unknown')->assertOk();
        $this->enquiry($p,['marketing_campaign_id'=>$other->id]);
        $this->assertEquals($c->id,CrmLead::first()->marketing_campaign_id);
        $this->get('/properties?utm_campaign=other')->assertOk();$this->enquiry($p);
        $this->assertEquals($other->id,CrmLead::latest('id')->first()->marketing_campaign_id);
        $this->assertSame('website',CrmLead::first()->source);
        $this->withSession(['marketing_touch'=>null])->enquiry($p,['marketing_campaign_id'=>$c->id]);
        $this->assertNull(CrmLead::latest('id')->first()->marketing_campaign_id);
    }
    public function test_paused_invalid_and_expired_campaigns_do_not_create_new_attribution(): void {
        $c=$this->campaign();$p=$this->listing();$c->is_active=false;$c->save();
        $this->get('/properties?utm_campaign=october')->assertOk();$this->enquiry($p);
        $this->assertNull(CrmLead::first()->marketing_campaign_id);
        $this->withSession(['marketing_touch'=>['id'=>$c->id,'at'=>now()->subDays(31)->timestamp]])->enquiry($p);
        $this->assertNull(CrmLead::latest('id')->first()->marketing_campaign_id);
    }
    public function test_buyer_requests_keep_campaign_attribution_and_staff_requests_do_not(): void {
        $c=$this->campaign();$p=$this->listing();
        $this->get('/properties?utm_campaign=october')->assertOk();
        $this->actingAs($this->member('buyer'));
        $this->post('/buyer/property-requests',['category'=>'house','district'=>'Gampaha','city'=>'Nittambuwa','budget_max'=>10000000,'requirements'=>'Near a school'])->assertSessionHasNoErrors();
        $this->post('/buyer/service-requests',['type'=>'inspection','property_code'=>$p->property_code,'phone'=>'0771234567','message'=>'Please inspect'])->assertSessionHasNoErrors();
        $this->assertEquals(2,CrmLead::where('marketing_campaign_id',$c->id)->count());
        $this->actingAs($this->member('admin'))->enquiry($p);
        $this->assertNull(CrmLead::latest('id')->first()->marketing_campaign_id);
    }
    public function test_zero_leads_and_missing_spend_are_distinct_from_recorded_zero_spend(): void {
        $c=$this->campaign();$this->actingAs($this->member('admin'));
        $this->post(route('admin.marketing.spend',$c),['reference'=>'FREE','spent_on'=>'2026-10-07','amount'=>0])->assertSessionHasNoErrors();
        $this->assertTrue(app(MarketingOverview::class)->build()['hasSpend']);
        $this->assertNull(app(MarketingOverview::class)->build()['cpl']);
        $l=CrmLead::create(['status'=>'new']);$l->marketing_campaign_id=$c->id;$l->save();
        $this->assertSame(0.0,app(MarketingOverview::class)->build()['cpl']);
        $this->get(route('admin.marketing.show',$c))->assertOk()->assertSee('0.00');
    }
    public function test_spending_totals_cpl_duplicate_prevention_and_void_history(): void {
        $a=$this->member('admin');$c=$this->campaign();$unpaid=$this->campaign('unpaid');
        foreach([$c,$c,$unpaid] as $campaign){$l=CrmLead::create(['status'=>'new']);$l->marketing_campaign_id=$campaign->id;$l->save();}
        $this->assertNull(app(MarketingOverview::class)->build()['cpl']);
        $this->actingAs($a)->post(route('admin.marketing.spend',$c),['reference'=>'AD-1','spent_on'=>'2026-10-07','amount'=>'1500.00','recorded_by'=>999])->assertSessionHasNoErrors();
        $m=app(MarketingOverview::class)->build();$this->assertSame(1500.0,$m['spend']);$this->assertSame(2,$m['paidLeads']);$this->assertSame(750.0,$m['cpl']);
        $entry=CampaignSpend::sole();$this->assertEquals($a->id,$entry->recorded_by);
        $this->post(route('admin.marketing.spend',$c),['reference'=>'AD-1','spent_on'=>'2026-10-07','amount'=>200])->assertSessionHasErrors('reference');
        $this->assertDatabaseCount('campaign_spends',1);
        $this->post(route('admin.marketing.void',[$unpaid,$entry]),['void_reason'=>'Incorrect'])->assertNotFound();
        $this->post(route('admin.marketing.void',[$c,$entry]),['void_reason'=>'Duplicate invoice'])->assertSessionHasNoErrors();
        $this->assertDatabaseHas('campaign_spends',['id'=>$entry->id,'voided_by'=>$a->id,'void_reason'=>'Duplicate invoice']);
        $this->assertNull(app(MarketingOverview::class)->build()['cpl']);
        $this->post(route('admin.marketing.void',[$c,$entry]),['void_reason'=>'Again'])->assertStatus(409);
        $this->get(route('admin.marketing.show',$c))->assertOk()->assertSee('Voided')->assertSee('Duplicate invoice');
    }
    public function test_admin_only_routes_and_validation(): void {
        $c=$this->campaign();$url=route('admin.marketing.index');$this->get($url)->assertRedirect('/account-signin');
        foreach(['buyer','seller','agent','sales','verification'] as $role){
            $this->actingAs($this->member($role))->get($url)->assertForbidden();
            $this->post($url,['name'=>'No'])->assertForbidden();
            $this->post(route('admin.marketing.spend',$c),[])->assertForbidden();
            $this->put(route('admin.marketing.update',$c),['is_active'=>0])->assertForbidden();
            $this->post(route('admin.marketing.void',[$c,1]),['void_reason'=>'No'])->assertForbidden();
        }
        $this->actingAs($this->member('admin'))->post($url,['name'=>'<script>bad</script>','code'=>'injected','created_by'=>999])->assertSessionHasNoErrors();
        $new=MarketingCampaign::latest('id')->first();$this->assertNotEquals('injected',$new->code);
        $this->get($url)->assertOk()->assertSee('&lt;script&gt;bad&lt;/script&gt;',false)->assertDontSee('<script>bad</script>',false);
        foreach([['amount'=>-1],['amount'=>'0.001'],['spent_on'=>'2026-10-08']] as $invalid){
            $this->post(route('admin.marketing.spend',$c),$invalid+['amount'=>10,'reference'=>'x','spent_on'=>'2026-10-07'])->assertSessionHasErrors(array_key_first($invalid));
        }
        $this->get('/dashboard/admin?section=management')->assertOk()->assertSee('Visitors and campaigns')->assertSee('Manage campaigns');
    }
}

