<?php

namespace Tests\Feature;

use App\Models\{BuyerServiceRequest, CrmLead, Property, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class BuyerServiceRequestTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
        // 5 October in Colombo, still 4 October in UTC.
        $this->travelTo(\Carbon\Carbon::parse('2026-10-04 20:00:00', 'UTC'));
    }

    private function member(string $role): User
    {
        $user = User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name', $role)->value('id'));
        return $user;
    }

    private function listing(string $status = 'published'): Property
    {
        $owner = $this->member('seller');
        $property = new Property();
        $property->forceFill(['title'=>'Inspection test property', 'owner_id'=>$owner->id, 'created_by'=>$owner->id,
            'category'=>'land', 'district'=>'Gampaha', 'status'=>$status, 'currency'=>'LKR', 'total_price'=>2000000,
            'property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id')])->save();
        return $property;
    }

    private function payload(array $changes = []): array
    {
        return array_replace(['type'=>'lgc_service', 'phone'=>'0771234567', 'location'=>'Gampaha town',
            'preferred_date'=>'2026-10-05', 'message'=>'Please discuss the home improvement service I need.'], $changes);
    }

    public function test_both_requests_create_trusted_leads_and_reach_staff(): void
    {
        $buyer = $this->member('buyer'); $property = $this->listing();
        $this->actingAs($buyer)->get(route('properties.show', $property->property_code))->assertOk()->assertSee('Request inspection');
        foreach (['inspection','lgc_service'] as $type) {
            $this->get(route('buyer.services.create', ['type'=>$type, 'property_code'=>$property->property_code]))
                ->assertOk()->assertSee($property->property_code);
            $this->post(route('buyer.services.store'), $this->payload(['type'=>$type,
                'property_code'=>$type === 'inspection' ? $property->property_code : null,
                'customer_id'=>999, 'status'=>'converted', 'assigned_to'=>999, 'source'=>'phone', 'property_id'=>999]))
                ->assertSessionHasNoErrors()->assertRedirect();
        }
        $this->assertDatabaseCount('buyer_service_requests', 2);
        $this->assertDatabaseCount('crm_leads', 2);
        $this->assertDatabaseCount('property_viewings', 0);
        foreach (BuyerServiceRequest::with('crmLead')->get() as $item) {
            $this->assertSame($buyer->id, $item->customer_id);
            $this->assertSame('new', $item->crmLead->status);
            $this->assertSame($item->type, $item->crmLead->source);
            $this->assertNull($item->crmLead->assigned_to);
            $this->assertSame($item->type === 'inspection' ? $property->id : null, $item->property_id);
            $this->assertSame($item->property_id, $item->crmLead->property_id);
            $this->assertSame(1, $item->crmLead->activities()->where('performed_by',$buyer->id)->count());
            foreach (['admin','sales'] as $role) {
                $this->actingAs($this->member($role))->get(route('leads.show',['role'=>$role,'lead'=>$item->crmLead->id]))
                    ->assertOk()->assertSee($item->message)->assertSee($buyer->email);
                $this->get(route('dashboard.role',['role'=>$role,'tab'=>'leads']))->assertOk()->assertSee($buyer->name);
            }
        }
    }

    public function test_requests_are_scoped_and_internal_notes_are_not_shared(): void
    {
        $buyer = $this->member('buyer');
        $this->actingAs($buyer)->post(route('buyer.services.store'), $this->payload())->assertSessionHasNoErrors();
        $item = BuyerServiceRequest::firstOrFail(); $lead = $item->crmLead;
        $lead->update(['notes'=>'Staff confidential note', 'status'=>'contacted']);
        $this->get(route('buyer.services.index'))->assertOk()->assertSee('Contacted')->assertDontSee('Staff confidential note');
        $this->get(route('buyer.services.show',$item))->assertOk()->assertSee($item->message)->assertSee('Contacted')->assertDontSee('Staff confidential note');
        $this->actingAs($this->member('buyer'))->get(route('buyer.services.show',$item))->assertNotFound();
        $this->get(route('buyer.services.index'))->assertOk()->assertSee('No service requests yet.');
        $agent = $this->member('agent');
        $this->actingAs($agent)->get(route('leads.show',['role'=>'agent','lead'=>$lead->id]))->assertNotFound();
        $this->get(route('dashboard.role',['role'=>'agent','tab'=>'leads']))->assertOk()->assertDontSee($buyer->name);
        $lead->update(['assigned_to'=>$agent->id]);
        $this->get(route('leads.show',['role'=>'agent','lead'=>$lead->id]))->assertOk()->assertSee($item->message);
    }

    public function test_guests_nonbuyers_and_suspended_accounts_cannot_submit(): void
    {
        $this->get(route('buyer.services.create'))->assertRedirect();
        $this->post(route('buyer.services.store'), $this->payload())->assertRedirect();
        foreach (['seller','agent','sales','verification','admin'] as $role) {
            $this->actingAs($this->member($role))->get(route('buyer.services.create'))->assertForbidden();
            $this->post(route('buyer.services.store'), $this->payload())->assertForbidden();
        }
        $buyer = $this->member('buyer'); $buyer->forceFill(['is_active'=>false])->save();
        $this->actingAs($buyer)->post(route('buyer.services.store'), $this->payload())->assertRedirect('/account-signin');
        $this->assertDatabaseCount('buyer_service_requests',0);
        $this->assertDatabaseCount('crm_leads',0);
    }

    public function test_validation_and_nonpublic_properties_are_rejected_without_partial_records(): void
    {
        // Exercise all validation cases without hitting the separate request rate limit.
        $this->withoutMiddleware(\Illuminate\Routing\Middleware\ThrottleRequests::class);
        $this->actingAs($this->member('buyer'));
        foreach ([['type'=>'invalid'], ['type'=>'inspection','property_code'=>null], ['phone'=>''], ['message'=>''],
            ['location'=>''], ['preferred_date'=>'2026-10-04'], ['preferred_date'=>'2026-02-30'], ['property_code'=>'UNKNOWN']] as $change) {
            $this->post(route('buyer.services.store'), $this->payload($change))->assertSessionHasErrors();
        }
        foreach (['draft','submitted','under_review','approved','sold','archived'] as $status) {
            $property = $this->listing($status);
            $this->get(route('buyer.services.create',['type'=>'inspection','property_code'=>$property->property_code]))->assertNotFound();
            $this->post(route('buyer.services.store'), $this->payload(['type'=>'inspection','property_code'=>$property->property_code]))->assertSessionHasErrors('property_code');
        }
        $property = $this->listing(); $property->delete();
        $this->post(route('buyer.services.store'), $this->payload(['property_code'=>$property->property_code]))->assertSessionHasErrors('property_code');
        $this->assertDatabaseCount('buyer_service_requests',0);
        $this->assertDatabaseCount('crm_leads',0);
    }

    public function test_staff_schedule_uses_request_buyer_and_private_listing_details_stay_hidden(): void
    {
        $buyer = $this->member('buyer'); $property = $this->listing(); $agent = $this->member('agent');
        $this->actingAs($buyer)->post(route('buyer.services.store'), $this->payload(['type'=>'inspection','property_code'=>$property->property_code]))->assertSessionHasNoErrors();
        $item = BuyerServiceRequest::firstOrFail(); $lead = $item->crmLead;
        $this->actingAs($this->member('admin'))->post(route('leads.assign',['role'=>'admin','lead'=>$lead->id]),['assigned_to'=>$agent->id])->assertSessionHasNoErrors();
        $this->actingAs($agent)->post(route('leads.schedule',['role'=>'agent','lead'=>$lead->id]),['scheduled_at'=>'2026-10-06T10:00','customer_id'=>999])->assertSessionHasNoErrors();
        $this->assertSame($buyer->id, $lead->viewings()->firstOrFail()->customer_id);
        $this->assertSame('viewing_scheduled',$lead->fresh()->status);
        $this->actingAs($buyer)->get('/dashboard/buyer?tab=viewings')->assertOk()->assertSee('06 Oct 2026');
        $property->update(['status'=>'draft','title'=>'Private revised title']);
        $this->get(route('buyer.services.show',$item))->assertOk()->assertSee('Property unavailable')->assertDontSee('Private revised title');
        $this->get(route('buyer.services.index'))->assertOk()->assertDontSee('Private revised title');
    }
}
