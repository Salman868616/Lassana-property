<?php

namespace Tests\Feature;

use App\Models\{Property, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SellerEnquiryPrivacyTest extends TestCase
{
    use RefreshDatabase;

    private const CONTACT = ['name'=>'Confidential buyer', 'email'=>'private-buyer@example.test',
        'phone'=>'0770004321', 'message'=>'Private message: call 0779994321 or write to embedded@example.test.'];

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([\Database\Seeders\RoleSeeder::class, \Database\Seeders\PropertyCategorySeeder::class]);
    }

    private function member(string ...$roles): User
    {
        $user = User::factory()->create();
        $user->roles()->attach(DB::table('roles')->whereIn('name',$roles)->pluck('id'));
        return $user;
    }

    private function listing(User $owner): Property
    {
        $property = new Property;
        $property->forceFill(['title'=>'Seller privacy test property','owner_id'=>$owner->id,'created_by'=>$owner->id,
            'category'=>'land','property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),
            'status'=>'published','district'=>'Gampaha','city'=>'Nittambuwa','total_price'=>2000000])->save();
        return $property;
    }

    private function lead(Property $property, ?User $agent = null)
    {
        $enquiry = $property->enquiries()->create(self::CONTACT);
        return $enquiry->crmLead()->create(['property_id'=>$property->id,'assigned_to'=>$agent?->id,'status'=>'new','source'=>'website']);
    }

    private function assertNoContact($response): void
    {
        foreach (self::CONTACT as $value) $response->assertDontSee($value);
        $response->assertDontSee('0779994321')->assertDontSee('embedded@example.test');
    }

    public function test_seller_dashboard_does_not_load_or_render_buyer_enquiries(): void
    {
        $seller = $this->member('seller');
        $property = $this->listing($seller);
        $this->lead($property);
        $this->actingAs($seller);
        foreach (['','?tab=properties','?enquiries_page=1&lead_queue=due&section=leads'] as $query) {
            DB::enableQueryLog();
            DB::flushQueryLog();
            $response = $this->get('/dashboard/seller'.$query)->assertOk()
                ->assertViewHas('enquiries', null)->assertViewHas('leads', null)->assertViewHas('viewings', null)
                ->assertViewHas('enquiryCount', 0)
                ->assertDontSee('tab=enquiries', false)->assertDontSee('id="enquiries-list"', false)
                ->assertDontSee('<span>Enquiries</span>', false);
            $queries = DB::getQueryLog();
            DB::disableQueryLog();
            foreach ($queries as $entry) {
                foreach (['property_enquiries','crm_leads','property_viewings'] as $table) {
                    $this->assertStringNotContainsString($table, $entry['query']);
                }
            }
            $this->assertNoContact($response);
            if ($query === '' && getenv('SELLER_PRIVACY_PREVIEWS')) {
                file_put_contents(getenv('SELLER_PRIVACY_PREVIEWS').'/seller-dashboard.html', $response->getContent());
            }
        }
        $this->get('/dashboard/seller?tab=properties')->assertSee($property->title);
        $this->assertNoContact($this->get('/dashboard/seller/properties/'.$property->id)->assertOk());
        $this->assertDatabaseCount('property_enquiries',1);
        $this->assertDatabaseCount('crm_leads',1);
    }

    public function test_seller_cannot_reopen_old_enquiry_urls_or_use_staff_endpoints(): void
    {
        $seller = $this->member('seller');
        $lead = $this->lead($this->listing($seller));
        $this->actingAs($seller);
        $this->assertNoContact($this->get('/dashboard/seller?tab=enquiries')->assertForbidden());
        $this->assertNoContact($this->getJson('/dashboard/seller?tab=enquiries')->assertForbidden());
        $this->get('/dashboard/seller/leads/'.$lead->id)->assertNotFound();
        foreach (['admin','sales','agent'] as $role) {
            $this->assertNoContact($this->get('/dashboard/'.$role.'?tab=enquiries')->assertForbidden());
            $this->get('/dashboard/'.$role.'/leads/'.$lead->id)->assertForbidden();
            $this->post('/dashboard/'.$role.'/enquiries/'.$lead->enquiry_id.'/lead')->assertForbidden();
        }
        $this->get('/admin/reports?type=leads')->assertForbidden();
        $this->get('/admin/reports/download?type=leads')->assertForbidden();
    }

    public function test_admin_and_sales_keep_existing_enquiry_access(): void
    {
        $seller = $this->member('seller');
        $lead = $this->lead($this->listing($seller));
        foreach (['admin','sales'] as $role) {
            $this->actingAs($this->member($role));
            foreach (['/dashboard/'.$role.'?tab=enquiries','/dashboard/'.$role.'/leads/'.$lead->id] as $url) {
                $response = $this->get($url)->assertOk();
                foreach (self::CONTACT as $value) $response->assertSee($value);
            }
        }
    }

    public function test_only_the_assigned_agent_retains_enquiry_access(): void
    {
        $agent = $this->member('agent');
        $lead = $this->lead($this->listing($this->member('seller')), $agent);
        $this->actingAs($agent)->get('/dashboard/agent?tab=enquiries')->assertOk()->assertSee(self::CONTACT['email']);
        $this->get('/dashboard/agent/leads/'.$lead->id)->assertOk()->assertSee(self::CONTACT['message']);
        $this->actingAs($this->member('agent'));
        $this->assertNoContact($this->get('/dashboard/agent?tab=enquiries')->assertOk());
        $this->get('/dashboard/agent/leads/'.$lead->id)->assertNotFound();
    }

    public function test_seller_workspace_stays_private_for_multi_role_accounts(): void
    {
        $member = $this->member('seller','agent');
        $lead = $this->lead($this->listing($member), $member);
        $this->actingAs($member);
        $this->get('/dashboard/seller?tab=enquiries')->assertForbidden();
        $this->assertNoContact($this->get('/dashboard/seller')->assertOk()->assertViewHas('enquiries', null));
        $this->get('/dashboard/agent/leads/'.$lead->id)->assertOk()->assertSee(self::CONTACT['email']);
    }

    public function test_new_buyer_enquiry_reaches_admin_but_is_not_shared_with_seller(): void
    {
        $seller = $this->member('seller');
        $property = $this->listing($seller);
        $this->post(route('properties.enquiries.store',$property),self::CONTACT)->assertSessionHasNoErrors();
        $this->assertDatabaseHas('property_enquiries',['property_id'=>$property->id]+self::CONTACT);
        $this->actingAs($this->member('admin'))->get('/dashboard/admin?tab=enquiries')
            ->assertOk()->assertSee(self::CONTACT['email']);
        $this->actingAs($seller);
        $this->assertNoContact($this->get('/dashboard/seller')->assertOk());
        $this->get('/dashboard/seller?tab=enquiries')->assertForbidden();
    }
}
