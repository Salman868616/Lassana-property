<?php

namespace Tests\Feature;

use App\Models\CrmLead;
use App\Models\Property;
use App\Models\User;
use App\Services\SalesOverview;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SalesDashboardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class,\Database\Seeders\PropertyCategorySeeder::class]);
        $this->travelTo(\Carbon\Carbon::parse('2026-10-01 04:00:00','UTC'));
    }

    private function member(string $role): User
    {
        $user=User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $user;
    }

    private function lead(User $assignee, array $values=[]): CrmLead
    {
        $lead=CrmLead::create(array_merge(['assigned_to'=>$assignee->id,'status'=>'new','source'=>'website'],$values));
        if (isset($values['created_at'])) $lead->forceFill(['created_at'=>$values['created_at']])->save();
        return $lead;
    }

    public function test_stages_sources_outcomes_and_first_response_are_recorded(): void
    {
        $sales=$this->member('sales'); $lead=$this->lead($sales);
        $url='/dashboard/sales/leads/'.$lead->id.'/follow-up';
        $this->actingAs($sales);
        $data=['status'=>'interested','activity_type'=>'call','notes'=>'Customer confirmed interest','source'=>'referral','follow_up_at'=>'2026-10-02T10:00'];
        $this->post($url,$data)->assertSessionHasNoErrors();
        $lead->refresh();
        $this->assertSame('interested',$lead->status);
        $this->assertSame('referral',$lead->source);
        $this->assertSame('2026-10-01 04:00:00',$lead->first_contacted_at->format('Y-m-d H:i:s'));
        $this->travel(30)->minutes();
        $this->post($url,array_replace($data,['status'=>'negotiation']))->assertSessionHasNoErrors();
        $this->assertSame('2026-10-01 04:00:00',$lead->fresh()->first_contacted_at->format('Y-m-d H:i:s'));
        $this->post($url,array_replace($data,['status'=>'closed']))->assertSessionHasErrors('outcome');
        $this->post($url,array_replace($data,['status'=>'converted']))->assertSessionHasNoErrors();
        $this->assertSame('converted',$lead->fresh()->outcome);
        $this->assertNull($lead->fresh()->follow_up_at);
        $this->post($url,array_replace($data,['status'=>'closed','outcome'=>'converted']))->assertSessionHasNoErrors();
        $this->post($url,array_replace($data,['status'=>'contacted','activity_type'=>'note']))->assertSessionHasNoErrors();
        $this->assertNull($lead->fresh()->outcome);
        $this->assertTrue($lead->activities()->where('notes','like','%Outcome: Converted%')->exists());
        $this->get('/dashboard/sales/leads/'.$lead->id)->assertOk()->assertSee('Interested')->assertSee('Viewing Scheduled');
    }

    public function test_invalid_stages_and_fictitious_viewing_status_are_rejected(): void
    {
        $agent=$this->member('agent'); $lead=$this->lead($agent);
        $url='/dashboard/agent/leads/'.$lead->id.'/follow-up';
        $this->actingAs($agent);
        $data=['activity_type'=>'note','notes'=>'Test note'];
        foreach (['won','lost','viewing','unknown'] as $status) {
            $this->post($url,$data+['status'=>$status])->assertSessionHasErrors('status');
        }
        $this->post($url,$data+['status'=>'viewing_scheduled'])->assertSessionHasErrors('status');
        $this->post($url,$data+['status'=>'closed','outcome'=>'anything'])->assertSessionHasErrors('outcome');
        $this->assertSame('new',$lead->fresh()->status);
    }

    public function test_overview_counts_and_agent_scope_exclude_terminal_followups(): void
    {
        $sales=$this->member('sales'); $agent=$this->member('agent'); $other=$this->member('agent');
        $this->lead($agent,['status'=>'interested','follow_up_at'=>'2026-10-01 03:00:00','created_at'=>'2026-10-01 02:00:00','first_contacted_at'=>'2026-10-01 02:30:00']);
        $this->lead($agent,['status'=>'negotiation','follow_up_at'=>'2026-10-01 15:00:00']);
        $this->lead($agent,['status'=>'closed','outcome'=>'converted','follow_up_at'=>'2026-10-01 03:00:00']);
        $this->lead($other,['status'=>'interested','follow_up_at'=>'2026-10-01 03:00:00']);
        $overview=app(SalesOverview::class)->build($agent,'agent');
        $this->assertSame(3,$overview['total']);
        $this->assertSame(1,$overview['due']);
        $this->assertSame(2,$overview['today']);
        $this->assertSame(2,$overview['hot']);
        $this->assertSame(1,$overview['converted']);
        $this->assertEquals(33.3,$overview['conversionRate']);
        $this->assertEquals(30,$overview['responseMinutes']);
        $this->assertTrue($overview['employees']->isEmpty());
        $all=app(SalesOverview::class)->build($sales,'sales');
        $this->assertSame(4,$all['total']);
        $this->assertSame(2,$all['employees']->count());
        $this->actingAs($agent)->get('/dashboard/agent')->assertOk()->assertDontSee('Leads by assigned employee');
        $this->actingAs($sales)->get('/dashboard/sales')->assertOk()->assertSee('Leads by assigned employee');
    }

    public function test_daily_enquiries_use_colombo_midnight_boundaries(): void
    {
        $sales=$this->member('sales'); $owner=$this->member('seller');
        $property=new Property();
        $property->forceFill(['property_code'=>'DAY-TEST','title'=>'Boundary property','owner_id'=>$owner->id,'created_by'=>$owner->id,
            'property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),'category'=>'land','status'=>'published'])->save();
        foreach (['2026-09-30 18:29:59','2026-09-30 18:30:00','2026-10-01 18:29:59','2026-10-01 18:30:00'] as $date) {
            DB::table('property_enquiries')->insert(['property_id'=>$property->id,'name'=>'Customer','email'=>'day@example.test','message'=>'Day check','created_at'=>$date,'updated_at'=>$date]);
        }
        $this->assertSame(2,app(SalesOverview::class)->build($sales,'sales')['newEnquiries']);
    }

    public function test_work_queue_filters_cannot_expose_other_agents_leads(): void
    {
        $agent=$this->member('agent'); $other=$this->member('agent');
        $mine=$this->lead($agent,['status'=>'interested','follow_up_at'=>'2026-10-01 03:00:00']);
        $future=$this->lead($agent,['status'=>'contacted','follow_up_at'=>'2026-10-02 03:00:00']);
        $foreign=$this->lead($other,['status'=>'interested','follow_up_at'=>'2026-10-01 03:00:00']);
        $this->actingAs($agent)->get('/dashboard/agent?lead_queue=due')->assertOk()
            ->assertViewHas('leads',fn ($leads)=>$leads->pluck('id')->all()===[$mine->id]);
        $this->get('/dashboard/agent?lead_status=contacted')->assertOk()
            ->assertViewHas('leads',fn ($leads)=>$leads->pluck('id')->all()===[$future->id]);
        $this->get('/dashboard/agent?lead_queue=hot')->assertOk()
            ->assertViewHas('leads',fn ($leads)=>!$leads->pluck('id')->contains($foreign->id));
        $this->get('/dashboard/agent?lead_status=bad')->assertSessionHasErrors('lead_status');
        $this->actingAs($this->member('buyer'))->get('/dashboard/sales')->assertForbidden();
    }

    public function test_sales_employee_can_be_assigned(): void
    {
        $sales=$this->member('sales'); $admin=$this->member('admin'); $lead=$this->lead($admin);
        $this->actingAs($admin)->post('/dashboard/admin/leads/'.$lead->id.'/assign',['assigned_to'=>$sales->id])->assertSessionHasNoErrors();
        $this->assertEquals($sales->id,$lead->fresh()->assigned_to);
        $this->actingAs($sales)->get('/dashboard/sales/leads/'.$lead->id)->assertOk();
    }

    public function test_legacy_migration_preserves_history_and_records_status_mapping(): void
    {
        $migration=require database_path('migrations/2026_10_01_140000_align_lead_pipeline.php');
        $migration->down();
        $ids=[];
        foreach (['viewing','won','lost'] as $status) {
            $ids[$status]=DB::table('crm_leads')->insertGetId(['status'=>$status,'outcome'=>'Original outcome','created_at'=>now(),'updated_at'=>now()]);
        }
        DB::table('crm_lead_activities')->insert(['lead_id'=>$ids['won'],'activity_type'=>'call','status'=>'won','notes'=>'Original history','activity_at'=>now(),'created_at'=>now(),'updated_at'=>now()]);
        $migration->up();
        $this->assertDatabaseHas('crm_leads',['id'=>$ids['viewing'],'status'=>'viewing_scheduled']);
        $this->assertDatabaseHas('crm_leads',['id'=>$ids['won'],'status'=>'converted','outcome'=>'converted','legacy_outcome'=>'Original outcome']);
        $this->assertDatabaseHas('crm_leads',['id'=>$ids['lost'],'status'=>'closed','outcome'=>'not_proceeding']);
        $this->assertDatabaseHas('crm_lead_activities',['lead_id'=>$ids['won'],'notes'=>'Original history','status'=>'won']);
        $this->assertSame(3,DB::table('crm_lead_activities')->where('activity_type','stage_migration')->count());
    }
}
