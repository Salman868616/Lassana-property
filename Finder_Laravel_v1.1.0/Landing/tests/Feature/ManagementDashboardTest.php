<?php
namespace Tests\Feature;

use App\Models\{Property,PropertyViewing,CrmLead,User};
use App\Services\ManagementOverview;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ManagementDashboardTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class,\Database\Seeders\PropertyCategorySeeder::class]);
        $this->travelTo(\Carbon\Carbon::parse('2026-10-06 05:00:00','UTC'));
    }
    private function member(string $role): User
    {
        $u=User::factory()->create();
        $u->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $u;
    }
    private function listing(User $owner, string $status, string $level='unverified', string $created='2026-10-05 10:00:00'): Property
    {
        $p=new Property;
        $p->forceFill(['owner_id'=>$owner->id,'created_by'=>$owner->id,'title'=>'Management fixture','category'=>'land',
            'property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),
            'status'=>$status,'verification_level'=>$level,'created_at'=>$created])->save();
        return $p;
    }
    public function test_listing_verification_approval_and_viewing_totals_reconcile(): void
    {
        $admin=$this->member('admin'); $owner=$this->member('seller');
        $published=$this->listing($owner,'published','silver','2026-10-05 18:30:00');
        $this->listing($owner,'approved','basic','2026-10-06 18:29:59');
        $this->listing($owner,'under_review','basic');
        $this->listing($owner,'submitted');
        $this->listing($owner,'archived','silver');
        $this->listing($owner,'sold','basic');
        $this->listing($owner,'draft','unverified','2026-10-05 18:29:59');
        $this->listing($owner,'draft','unverified','2026-10-06 18:30:00');
        $this->listing($owner,'published','silver','2026-10-06 04:00:00')->delete();
        foreach ([['scheduled','2026-10-06 05:00:00'],['scheduled','2026-10-06 04:59:59'],['cancelled','2026-10-07 05:00:00'],['completed','2026-10-05 05:00:00']] as [$status,$date]) {
            PropertyViewing::create(['property_id'=>$published->id,'status'=>$status,'scheduled_at'=>$date]);
        }
        $m=app(ManagementOverview::class)->build($admin);
        foreach (['listings'=>8,'newListings'=>2,'published'=>1,'verified'=>3,'pendingApprovals'=>2,'readyToPublish'=>1,'viewings'=>4,'upcomingViewings'=>1] as $key=>$expected) {
            $this->assertSame($expected,$m[$key],$key);
        }
        $this->assertEquals(8,$m['propertyStatuses']->sum());
        $this->assertEquals(3,$m['verificationLevels']->sum());
        $this->assertEquals(4,$m['viewingStatuses']->sum());
        $this->assertEquals(0,$m['revenue']['total']);
        $this->actingAs($admin)->get('/dashboard/admin?section=management')->assertOk()
            ->assertSee('Management dashboard')->assertSee('Company revenue')->assertSee('Not available yet')
            ->assertViewHas('managementOverview',fn($m)=>$m['listings']===8 && $m['newListings']===2);
    }
    public function test_management_uses_source_leads_for_conversion_response_and_employee_totals(): void
    {
        $admin=$this->member('admin'); $agent=$this->member('agent');
        foreach ([['converted','converted'],['closed','converted'],['closed','not_proceeding'],['new',null]] as $i=>[$status,$outcome]) {
            $lead=CrmLead::create(['status'=>$status,'outcome'=>$outcome,'source'=>'website','assigned_to'=>$i<2 ? $agent->id : null]);
            $lead->forceFill(['created_at'=>'2026-10-06 03:00:00','first_contacted_at'=>$i===0 ? '2026-10-06 03:10:00' : ($i===1 ? '2026-10-06 03:20:00' : null)])->save();
        }
        $this->actingAs($admin)->get('/dashboard/admin?section=management')->assertOk()->assertViewHas('salesOverview',function($s) {
            return $s['total']===4 && $s['converted']===2 && (float)$s['conversionRate']===50.0
                && (float)$s['responseMinutes']===15.0 && $s['responseCount']===2 && $s['employees']->sum('total')==4;
        });
    }
    public function test_only_admin_can_open_management_and_empty_values_are_honest(): void
    {
        $url='/dashboard/admin?section=management';
        $this->get($url)->assertRedirect('/account-signin');
        foreach (['buyer','seller','agent','sales','verification'] as $role) {
            $this->actingAs($this->member($role))->get($url)->assertForbidden();
        }
        $this->actingAs($this->member('admin'))->get($url)->assertOk()->assertSee('Not recorded yet')
            ->assertSee('Not available yet')->assertViewHas('managementOverview',fn($m)=>$m['listings']===0 && $m['verified']===0 && (float)$m['revenue']['total']===0.0)
            ->assertViewHas('salesOverview',fn($s)=>$s['conversionRate']===null && $s['responseMinutes']===null);
    }
}
