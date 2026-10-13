<?php

namespace Tests\Feature;

use App\Models\CrmLead;
use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LeadWorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
        $this->travelTo(\Carbon\Carbon::parse('2026-10-01 04:00:00', 'UTC'));
    }

    private function member(string $role): User
    {
        $user = User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name', $role)->value('id'));
        return $user;
    }

    private function listing(): Property
    {
        $owner = $this->member('seller');
        $property = new Property();
        $property->forceFill([
            'property_code'=>'TEST-'.\Illuminate\Support\Str::ulid(), 'title'=>'Lead workflow property',
            'owner_id'=>$owner->id, 'created_by'=>$owner->id, 'category'=>'land', 'status'=>'published',
            'property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),
        ])->save();
        return $property;
    }

    private function lead(?User $agent = null, ?User $buyer = null): CrmLead
    {
        $property = $this->listing();
        $enquiry = $property->enquiries()->create(['name'=>'Customer','email'=>'customer@example.test','message'=>'Private customer enquiry']);
        $enquiry->customer_id = $buyer?->id;
        $enquiry->save();
        return $enquiry->crmLead()->create(['property_id'=>$property->id,'assigned_to'=>$agent?->id,'status'=>'new']);
    }

    public function test_public_enquiry_creates_lead_without_trusting_protected_fields(): void
    {
        $property = $this->listing();
        $buyer = $this->member('buyer');
        $data = ['name'=>'Customer','email'=>$buyer->email,'message'=>'Interested in this property',
            'customer_id'=>$buyer->id,'assigned_to'=>$buyer->id,'status'=>'converted'];
        $url = route('properties.enquiries.store', $property);
        $this->post($url, $data)->assertRedirect()->assertSessionHasNoErrors();
        $lead = CrmLead::firstOrFail();
        $this->assertNull($lead->assigned_to);
        $this->assertNull($lead->enquiry->customer_id);
        $this->assertSame('new', $lead->status);
        $this->assertEquals($property->id, $lead->property_id);
        $this->assertSame(1, $lead->activities()->count());
        $this->actingAs($buyer)->post($url,$data)->assertRedirect()->assertSessionHasNoErrors();
        $this->assertEquals($buyer->id, CrmLead::latest('id')->first()->enquiry->customer_id);
        $property->update(['status'=>'draft']);
        $this->post($url,$data)->assertNotFound();
        $this->assertDatabaseCount('crm_leads',2);
    }

    public function test_old_enquiry_conversion_is_repeatable_without_duplicate_leads(): void
    {
        $property = $this->listing();
        $enquiry = $property->enquiries()->create(['name'=>'Old customer','email'=>'old@example.test','message'=>'Old enquiry']);
        $this->actingAs($this->member('admin'));
        $url = '/dashboard/admin/enquiries/'.$enquiry->id.'/lead';
        $this->post($url)->assertRedirect();
        $this->post($url)->assertRedirect();
        $this->assertSame(1,$enquiry->crmLead()->count());
        $this->assertSame(1,$enquiry->crmLead->activities()->count());
        $this->get('/dashboard/admin/leads/'.$enquiry->crmLead->id)->assertOk()->assertSee('Old customer');
    }

    public function test_lead_permissions_and_agent_scope_apply_to_reads_and_writes(): void
    {
        $agent = $this->member('agent');
        $lead = $this->lead($agent);
        $base = '/dashboard/agent/leads/'.$lead->id;
        $this->get($base)->assertRedirect('/account-signin');
        foreach (['seller','buyer','verification'] as $role) {
            $this->actingAs($this->member($role))->get('/dashboard/admin/leads/'.$lead->id)->assertForbidden();
            $this->post('/dashboard/sales/leads/'.$lead->id.'/assign',[])->assertForbidden();
        }
        $other = $this->member('agent');
        $this->actingAs($other)->get($base)->assertNotFound();
        $this->post($base.'/follow-up',[])->assertNotFound();
        $this->post($base.'/viewings',[])->assertNotFound();
        $this->get('/dashboard/agent')->assertOk()->assertDontSee('Private customer enquiry');
        $this->actingAs($agent)->get($base)->assertOk()->assertSee('Private customer enquiry');
        $this->post($base.'/assign',['assigned_to'=>$other->id])->assertForbidden();
        $this->post('/dashboard/agent/enquiries/'.$lead->enquiry_id.'/lead')->assertForbidden();
    }

    public function test_sales_assigns_agents_and_followups_keep_an_audit_history(): void
    {
        $sales = $this->member('sales');
        $agent = $this->member('agent');
        $lead = $this->lead();
        $this->actingAs($sales)->post('/dashboard/sales/leads/'.$lead->id.'/assign',['assigned_to'=>$this->member('buyer')->id])
            ->assertSessionHasErrors('assigned_to');
        $this->post('/dashboard/sales/leads/'.$lead->id.'/assign',['assigned_to'=>$agent->id])->assertSessionHasNoErrors();
        $url = '/dashboard/agent/leads/'.$lead->id.'/follow-up';
        $data = ['status'=>'contacted','activity_type'=>'call','notes'=>'Customer prefers morning viewings',
            'follow_up_at'=>'2026-10-02T10:00','assigned_to'=>$sales->id,'property_id'=>999];
        $this->actingAs($agent)->post($url,$data)->assertSessionHasNoErrors();
        $lead->refresh();
        $this->assertEquals($agent->id,$lead->assigned_to);
        $this->assertNotEquals(999,$lead->property_id);
        $this->assertSame('2026-10-02 04:30:00',$lead->follow_up_at->format('Y-m-d H:i:s'));
        $this->assertEquals($agent->id,$lead->activities()->latest('id')->first()->performed_by);
        $this->post($url,array_replace($data,['follow_up_at'=>'2026-09-30T10:00']))->assertSessionHasErrors('follow_up_at');
        $this->post($url,array_replace($data,['status'=>'converted','follow_up_at'=>'2026-09-30T10:00']))->assertSessionHasNoErrors();
        $this->assertNull($lead->fresh()->follow_up_at);
        $this->assertSame('published',$lead->property->status);
        $this->assertSame(3,$lead->activities()->count());
    }

    public function test_viewings_use_local_time_and_trusted_customer_and_agent_ids(): void
    {
        $agent = $this->member('agent');
        $buyer = $this->member('buyer');
        $other = $this->member('buyer');
        $lead = $this->lead($agent,$buyer);
        $url = '/dashboard/agent/leads/'.$lead->id.'/viewings';
        $data = ['scheduled_at'=>'2026-10-02T10:00','notes'=>'Meet at gate','customer_id'=>$other->id,'assigned_to'=>$other->id,'property_id'=>999];
        $this->actingAs($agent)->post($url,$data)->assertSessionHasNoErrors();
        $viewing = $lead->viewings()->firstOrFail();
        $this->assertEquals($buyer->id,$viewing->customer_id);
        $this->assertEquals($agent->id,$viewing->assigned_to);
        $this->assertEquals($lead->property_id,$viewing->property_id);
        $this->assertSame('2026-10-02 04:30:00',$viewing->scheduled_at->format('Y-m-d H:i:s'));
        $this->assertSame('viewing_scheduled',$lead->fresh()->status);
        $this->post($url,$data)->assertSessionHasErrors('scheduled_at');
        $this->post($url,['scheduled_at'=>'2026-09-30T10:00'])->assertSessionHasErrors('scheduled_at');
        $this->assertSame(1,$lead->viewings()->count());
        $this->actingAs($buyer)->get('/dashboard/buyer?tab=viewings')->assertOk()->assertSee('02 Oct 2026 10:00 AM');
        $this->actingAs($other)->get('/dashboard/buyer?tab=viewings')->assertOk()->assertDontSee('02 Oct 2026 10:00 AM');
    }

    public function test_reassignment_moves_scheduled_viewings_and_revokes_previous_agent_access(): void
    {
        $agent = $this->member('agent');
        $replacement = $this->member('agent');
        $lead = $this->lead($agent);
        $this->actingAs($agent)->post('/dashboard/agent/leads/'.$lead->id.'/viewings',['scheduled_at'=>'2026-10-02T10:00'])->assertSessionHasNoErrors();
        $this->actingAs($this->member('admin'))->post('/dashboard/admin/leads/'.$lead->id.'/assign',['assigned_to'=>$replacement->id])->assertSessionHasNoErrors();
        $this->assertEquals($replacement->id,$lead->viewings()->first()->assigned_to);
        $this->actingAs($agent)->get('/dashboard/agent/leads/'.$lead->id)->assertNotFound();
        $this->get('/dashboard/agent')->assertOk()->assertDontSee('02 Oct 2026 10:00 AM')->assertDontSee('Private customer enquiry');
        $this->actingAs($replacement)->get('/dashboard/agent/leads/'.$lead->id)->assertOk();
    }

    public function test_viewing_requires_assignment_open_lead_and_published_property(): void
    {
        $lead = $this->lead();
        $url = '/dashboard/admin/leads/'.$lead->id.'/viewings';
        $data = ['scheduled_at'=>'2026-10-02T10:00'];
        $this->actingAs($this->member('admin'))->post($url,$data)->assertSessionHasErrors('assigned_to');
        $lead->update(['assigned_to'=>$this->member('agent')->id,'status'=>'closed']);
        $this->post($url,$data)->assertSessionHasErrors('status');
        $lead->update(['status'=>'new']);
        $lead->property->update(['status'=>'draft']);
        $this->post($url,$data)->assertSessionHasErrors('scheduled_at');
        $this->assertDatabaseCount('property_viewings',0);
    }

    public function test_last_cancelled_viewing_prompts_followup_until_staff_update_the_lead(): void
    {
        $agent=$this->member('agent'); $lead=$this->lead($agent);
        $url='/dashboard/agent/leads/'.$lead->id;
        $this->actingAs($agent);
        $this->post($url.'/viewings',['scheduled_at'=>'2026-10-02T10:00'])->assertSessionHasNoErrors();
        $viewing=$lead->viewings()->firstOrFail();
        $this->post($url.'/viewings/'.$viewing->id.'/outcome',['status'=>'cancelled','outcome'=>'Buyer requested another date'])->assertSessionHasNoErrors();
        $this->get($url)->assertOk()->assertSee('Update this lead after the cancelled viewing.');
        $this->post($url.'/follow-up',['status'=>'interested','activity_type'=>'note','notes'=>'Arrange another date','follow_up_at'=>'2026-10-02T09:00'])->assertSessionHasNoErrors();
        $this->get($url)->assertOk()->assertDontSee('Update this lead after the cancelled viewing.');
        $this->assertSame('cancelled',$viewing->fresh()->status);
        $this->assertSame('interested',$lead->fresh()->status);
        $this->post($url.'/viewings',['scheduled_at'=>'2026-10-03T10:00'])->assertSessionHasNoErrors();
        $this->get($url)->assertOk()->assertDontSee('Update this lead after the cancelled viewing.');
        $this->assertSame(2,$lead->viewings()->count());
    }

    public function test_cancelling_one_of_two_upcoming_viewings_does_not_prompt_status_change(): void
    {
        $agent=$this->member('agent'); $lead=$this->lead($agent);
        $url='/dashboard/agent/leads/'.$lead->id;
        $this->actingAs($agent);
        foreach (['2026-10-02T10:00','2026-10-03T10:00'] as $date) {
            $this->post($url.'/viewings',['scheduled_at'=>$date])->assertSessionHasNoErrors();
        }
        $viewing=$lead->viewings()->firstOrFail();
        $this->post($url.'/viewings/'.$viewing->id.'/outcome',['status'=>'cancelled','outcome'=>'Keep later appointment'])->assertSessionHasNoErrors();
        $this->get($url)->assertOk()->assertDontSee('Update this lead after the cancelled viewing.');
        $this->assertSame('viewing_scheduled',$lead->fresh()->status);
    }

    public function test_viewing_outcomes_are_scoped_and_cannot_be_overwritten(): void
    {
        $agent = $this->member('agent');
        $lead = $this->lead($agent);
        $other = $this->lead($agent);
        $viewing = $lead->viewings()->create(['property_id'=>$lead->property_id,'assigned_to'=>$agent->id,'scheduled_at'=>'2026-10-02 04:30:00','status'=>'scheduled']);
        $this->actingAs($agent);
        $url = '/dashboard/agent/leads/'.$lead->id.'/viewings/'.$viewing->id.'/outcome';
        $data = ['status'=>'completed','outcome'=>'Customer attended'];
        $this->post('/dashboard/agent/leads/'.$other->id.'/viewings/'.$viewing->id.'/outcome',$data)->assertNotFound();
        $this->post($url,$data)->assertSessionHasErrors('status');
        $this->travelTo(\Carbon\Carbon::parse('2026-10-03 04:00:00','UTC'));
        $this->post($url,$data)->assertSessionHasNoErrors();
        $this->assertSame('completed',$viewing->fresh()->status);
        $this->post($url,['status'=>'cancelled','outcome'=>'Overwrite'])->assertSessionHasErrors('status');
        $this->assertSame('Customer attended',$viewing->fresh()->outcome);
    }
}
