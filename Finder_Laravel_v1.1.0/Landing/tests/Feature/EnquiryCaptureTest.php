<?php
namespace Tests\Feature;

use App\Models\{CrmLead,Property,PropertyEnquiry,User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class EnquiryCaptureTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class,\Database\Seeders\PropertyCategorySeeder::class]);
    }
    private function member(string $role): User
    {
        $user=User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $user;
    }
    private function listing(): Property
    {
        $seller=$this->member('seller');
        $p=new Property;
        $p->forceFill(['title'=>'Enquiry capture property','owner_id'=>$seller->id,'created_by'=>$seller->id,
            'category'=>'land','property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),
            'status'=>'published','district'=>'Gampaha','city'=>'Nittambuwa'])->save();
        return $p;
    }
    private function payload(): array
    {
        return ['name'=>'Enquiry customer','email'=>'customer@example.test','phone'=>'0771234567','message'=>'Please arrange a viewing.'];
    }
    public function test_guest_enquiry_creates_correct_lead_source_and_history_visible_to_sales(): void
    {
        $p=$this->listing();$buyer=$this->member('buyer');$other=$this->listing();
        $data=array_replace($this->payload(),['email'=>$buyer->email,'customer_id'=>$buyer->id,'property_id'=>$other->id,
            'source'=>'phone','status'=>'converted','assigned_to'=>$buyer->id]);
        $this->from(route('properties.show',$p->property_code))->post(route('properties.enquiries.store',$p),$data)
            ->assertRedirect(route('properties.show',$p->property_code))->assertSessionHas('enquiry_success')->assertSessionHasNoErrors();
        $this->assertDatabaseCount('property_enquiries',1);
        $this->assertDatabaseCount('crm_leads',1);
        $enquiry=PropertyEnquiry::firstOrFail();$lead=$enquiry->crmLead;
        foreach(['name','email','phone','message'] as $field) $this->assertSame($data[$field],$enquiry->$field);
        $this->assertEquals($p->id,$enquiry->property_id);
        $this->assertNull($enquiry->customer_id);
        $this->assertEquals($p->id,$lead->property_id);
        $this->assertSame('website',$lead->source);
        $this->assertSame('new',$lead->status);
        $this->assertNull($lead->assigned_to);
        $activity=$lead->activities()->sole();
        $this->assertSame('created',$activity->activity_type);
        $this->assertSame('new',$activity->status);
        $this->assertNotNull($activity->activity_at);
        $this->assertNull($activity->performed_by);
        foreach(['admin','sales'] as $role) {
            $this->actingAs($this->member($role))->get('/dashboard/'.$role.'/leads/'.$lead->id)
                ->assertOk()->assertSee($data['message'])->assertSee($p->title)->assertSee('Website enquiry');
        }
    }
    public function test_authenticated_customer_link_uses_buyer_identity_not_submitted_id(): void
    {
        $p=$this->listing();$buyer=$this->member('buyer');$other=$this->member('buyer');
        $this->actingAs($buyer)->post(route('properties.enquiries.store',$p),$this->payload()+['customer_id'=>$other->id])->assertSessionHasNoErrors();
        $lead=CrmLead::firstOrFail();
        $this->assertEquals($buyer->id,$lead->enquiry->customer_id);
        $this->assertEquals($buyer->id,$lead->activities()->sole()->performed_by);
        $this->actingAs($this->member('agent'))->post(route('properties.enquiries.store',$p),$this->payload()+['customer_id'=>$other->id])->assertSessionHasNoErrors();
        $this->assertNull(CrmLead::latest('id')->firstOrFail()->enquiry->customer_id);
    }
    public function test_invalid_fields_preserve_input_and_create_no_records(): void
    {
        $p=$this->listing();$return=route('properties.show',$p->property_code);
        foreach(['name'=>'','email'=>'not-an-email','phone'=>str_repeat('1',31),'message'=>str_repeat('a',5001)] as $field=>$value) {
            $data=array_replace($this->payload(),[$field=>$value]);
            $this->from($return)->post(route('properties.enquiries.store',$p),$data)
                ->assertRedirect($return)->assertSessionHasErrors($field)->assertSessionHasInput('message',$data['message']);
        }
        $this->assertDatabaseCount('property_enquiries',0);
        $this->assertDatabaseCount('crm_leads',0);
    }
    public function test_all_unavailable_statuses_and_deleted_listings_reject_enquiries(): void
    {
        $p=$this->listing();
        foreach(['draft','submitted','under_review','approved','sold','archived'] as $status) {
            $p->status=$status;$p->save();
            $this->post(route('properties.enquiries.store',$p),$this->payload())->assertNotFound();
        }
        $p->status='published';$p->save();$p->delete();
        $this->post(route('properties.enquiries.store',$p),$this->payload())->assertNotFound();
        $this->assertDatabaseCount('property_enquiries',0);
        $this->assertDatabaseCount('crm_leads',0);
    }
    public function test_failed_lead_creation_rolls_back_the_enquiry(): void
    {
        $p=$this->listing();
        CrmLead::creating(fn () => throw new \RuntimeException('Simulated CRM failure'));
        try {
            $this->withoutExceptionHandling();
            try {
                $this->post(route('properties.enquiries.store',$p),$this->payload());
                $this->fail('Expected the simulated CRM failure.');
            } catch (\RuntimeException $error) {
                $this->assertSame('Simulated CRM failure',$error->getMessage());
            }
            $this->assertDatabaseCount('property_enquiries',0);
            $this->assertDatabaseCount('crm_leads',0);
        } finally {
            CrmLead::flushEventListeners();
        }
    }
}
