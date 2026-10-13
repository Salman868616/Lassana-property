<?php

namespace Tests\Feature;

use App\Models\{User, Property, PropertyRequest, CrmLead};
use App\Services\SalesOverview;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PropertyRequestTest extends TestCase
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
        $user=User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $user;
    }

    private function payload(array $changes=[]): array
    {
        return array_replace(['category'=>'house','district'=>'Gampaha','city'=>'Nittambuwa',
            'budget_min'=>'1000000','budget_max'=>'10000000','bedrooms'=>3,
            'requirements'=>'A home near a school','phone'=>'0771234567'],$changes);
    }

    private function requestFor(User $buyer): PropertyRequest
    {
        $this->actingAs($buyer)->post('/buyer/property-requests',$this->payload())->assertSessionHasNoErrors();
        return PropertyRequest::latest('id')->firstOrFail();
    }

    private function property(array $changes=[]): Property
    {
        $seller=$this->member('seller');
        $property=new Property();
        $property->forceFill(array_replace(['property_code'=>'REQ-'.uniqid(),'title'=>'Matching house',
            'owner_id'=>$seller->id,'created_by'=>$seller->id,'category'=>'house',
            'property_category_id'=>DB::table('property_categories')->where('slug','house')->value('id'),
            'status'=>'published','currency'=>'LKR','total_price'=>5000000,
            'district'=>'Gampaha','city'=>'Nittambuwa'],$changes))->save();
        $property->details()->create(['property_type'=>'house','bedrooms'=>3,'bathrooms'=>2,'floor_area'=>1500]);
        return $property;
    }

    public function test_submission_creates_trusted_request_and_lead(): void
    {
        $buyer=$this->member('buyer');
        $this->actingAs($buyer)->get('/buyer/property-requests/create')->assertOk();
        $this->post('/buyer/property-requests',$this->payload(['customer_id'=>999,'assigned_to'=>999,'status'=>'converted','property_id'=>999]))->assertSessionHasNoErrors();
        $item=PropertyRequest::firstOrFail(); $lead=$item->crmLead;
        $this->assertSame($buyer->id,$item->customer_id);
        $this->assertSame('new',$lead->status);
        $this->assertSame('property_request',$lead->source);
        $this->assertNull($lead->assigned_to); $this->assertNull($lead->property_id);
        $this->assertSame(1,$lead->activities()->count());
        $this->assertDatabaseCount('property_requests',1);
        $this->assertDatabaseCount('crm_leads',1);
    }

    public function test_requests_and_internal_notes_remain_private(): void
    {
        $this->get('/buyer/property-requests/create')->assertRedirect();
        $buyer=$this->member('buyer'); $item=$this->requestFor($buyer);
        $item->crmLead->update(['notes'=>'Internal confidential note']);
        $this->get('/buyer/property-requests/'.$item->id)->assertOk()->assertDontSee('Internal confidential note');
        $other=$this->member('buyer');
        $this->actingAs($other)->get('/buyer/property-requests/'.$item->id)->assertNotFound();
        foreach (['seller','verification','agent'] as $role) {
            $user=$this->member($role);
            $this->actingAs($user)->post('/buyer/property-requests',$this->payload())->assertForbidden();
        }
        $this->get('/dashboard/agent/leads/'.$item->crmLead->id)->assertNotFound();
        $this->post('/dashboard/agent/leads/'.$item->crmLead->id.'/match-property',['property_id'=>1])->assertNotFound();
    }

    public function test_invalid_requirements_are_rejected(): void
    {
        $this->actingAs($this->member('buyer'));
        foreach ([['budget_min'=>11000000],['budget_max'=>-1],['category'=>'unknown'],['bedrooms'=>-1],['requirements'=>'']] as $change) {
            $this->post('/buyer/property-requests',$this->payload($change))->assertSessionHasErrors();
        }
        $this->assertDatabaseCount('property_requests',0);
        DB::table('property_categories')->where('slug','house')->update(['is_active'=>false]);
        $this->post('/buyer/property-requests',$this->payload())->assertSessionHasErrors('category');
        $this->post('/buyer/property-requests',$this->payload(['category'=>'land']))->assertSessionHasNoErrors();
        $this->assertNull(PropertyRequest::firstOrFail()->bedrooms);
    }

    public function test_matching_enforces_publication_location_budget_category_and_bedrooms(): void
    {
        $item=$this->requestFor($this->member('buyer')); $valid=$this->property();
        $invalid=[];
        foreach ([['status'=>'draft'],['category'=>'land'],['district'=>'Colombo'],['city'=>'Other'],['total_price'=>11000000],['total_price'=>500000],['currency'=>'USD']] as $change) $invalid[]=$this->property($change);
        $small=$this->property(); $small->details()->update(['bedrooms'=>2]); $invalid[]=$small;
        $this->assertSame([$valid->id],$item->matches()->pluck('id')->all());
        $sales=$this->member('sales'); $lead=$item->crmLead;
        $this->actingAs($sales)->get('/dashboard/sales/leads/'.$lead->id)->assertOk()->assertSee('Matching house');
        foreach ($invalid as $property) $this->post('/dashboard/sales/leads/'.$lead->id.'/match-property',['property_id'=>$property->id])->assertSessionHasErrors('property_id');
        $this->post('/dashboard/sales/leads/'.$lead->id.'/match-property',['property_id'=>$valid->id])->assertSessionHasNoErrors();
        $this->assertSame($valid->id,$lead->fresh()->property_id);
        $this->assertTrue($lead->activities()->where('activity_type','property_match')->exists());
    }

    public function test_selected_property_links_viewing_to_buyer_and_locks_after_viewing(): void
    {
        $buyer=$this->member('buyer'); $item=$this->requestFor($buyer); $lead=$item->crmLead;
        $agent=$this->member('agent'); $sales=$this->member('sales'); $property=$this->property();
        $this->actingAs($sales)->post('/dashboard/sales/leads/'.$lead->id.'/assign',['assigned_to'=>$agent->id])->assertSessionHasNoErrors();
        $this->actingAs($agent)->post('/dashboard/agent/leads/'.$lead->id.'/match-property',['property_id'=>$property->id])->assertSessionHasNoErrors();
        $this->post('/dashboard/agent/leads/'.$lead->id.'/viewings',['scheduled_at'=>'2026-10-02T10:00','customer_id'=>$sales->id])->assertSessionHasNoErrors();
        $viewing=$lead->viewings()->firstOrFail();
        $this->assertSame($buyer->id,$viewing->customer_id);
        $this->assertSame('2026-10-02 04:30:00',$viewing->scheduled_at->format('Y-m-d H:i:s'));
        $this->post('/dashboard/agent/leads/'.$lead->id.'/match-property',['property_id'=>$this->property()->id])->assertSessionHasErrors('property_id');
        $this->actingAs($buyer)->get('/dashboard/buyer')->assertOk()->assertSee('Request a property');
        $this->get('/buyer/property-requests/'.$item->id)->assertOk()->assertSee('Matching house');
    }

    public function test_daily_request_counts_use_local_boundaries_and_agent_scope(): void
    {
        $buyer=$this->member('buyer'); $agent=$this->member('agent'); $sales=$this->member('sales');
        foreach (['2026-09-30 18:29:59','2026-09-30 18:30:00','2026-10-01 18:29:59','2026-10-01 18:30:00'] as $index=>$time) {
            $item=$this->requestFor($buyer); $item->forceFill(['created_at'=>$time])->save();
            if ($index===1) $item->crmLead->update(['assigned_to'=>$agent->id]);
        }
        $this->assertSame(2,app(SalesOverview::class)->build($sales,'sales')['newRequests']);
        $this->assertSame(1,app(SalesOverview::class)->build($agent,'agent')['newRequests']);
        $this->actingAs($sales)->get('/dashboard/sales')->assertOk()->assertSee("Today's property requests");
    }
}
