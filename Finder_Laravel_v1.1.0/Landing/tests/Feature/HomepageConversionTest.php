<?php
namespace Tests\Feature;
use App\Models\{BuyerServiceRequest,Developer,DeveloperApplication,Testimonial,User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
class HomepageConversionTest extends TestCase {
    use RefreshDatabase;
    protected function setUp(): void {
        parent::setUp();
        $this->seed(\Database\Seeders\RoleSeeder::class);
    }
    private function member(string $role): User {
        $user=User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $user;
    }
    private function registration(array $changes=[]): array {
        return array_replace(['company_name'=>'Example developer','city'=>'Gampaha','phone'=>'+94771234567','website'=>'https://example.com','description'=>'Our company builds homes.'],$changes);
    }
    private function quote(array $changes=[]): array {
        return array_replace(['customer_name'=>'Customer with permission','context'=>'Property buyer','quote'=>'A genuine approved quote.','is_published'=>0,'consent_confirmed'=>0,'display_order'=>0],$changes);
    }
    public function test_homepage_explains_the_services_and_links_to_real_destinations(): void {
        $home=$this->get('/')->assertOk()->assertSee('How Lassana Verified works')->assertSee('From finding land to planning your home')
            ->assertSee('Exploring Sri Lankan property from overseas?')->assertSee('Register your company')->assertSee('Property guides')
            ->assertSee('Land, homes and property services in Sri Lanka')->assertSee('property="og:image"',false)->assertDontSee('What our customers say');
        $this->assertSame(4,substr_count($home->getContent(),'<svg class="lp-home-category-art"'));
        foreach (['house-plans'=>'house_plans','architectural-design'=>'architectural_design','boq'=>'boq'] as $slug=>$service) {
            $home->assertSee(route('services.show',['page'=>$slug]),false);
            $this->get('/services/'.$slug)->assertOk()->assertSee('service='.$service,false);
        }
        foreach (config('property_guides') as $slug=>$article) {
            $home->assertSee(route('guides.show',$slug),false);
            $this->get('/guides/'.$slug)->assertOk()->assertSee($article['title'])->assertSee('index, follow');
        }
        $this->get('/guides')->assertOk();$this->get('/guides/not-an-article')->assertNotFound();
        $this->get('/account/developer-application')->assertRedirect('/account-signin');
        $this->get('/account/agent-application')->assertRedirect('/account-signin');
    }
    public function test_service_selection_is_carried_into_the_real_sales_lead(): void {
        $buyer=$this->member('buyer');
        $this->actingAs($buyer);
        foreach (BuyerServiceRequest::SERVICES as $key=>$label) {
            $this->get('/buyer/service-requests/create?type=lgc_service&service='.$key)->assertOk()->assertViewHas('service',$key);
            $this->post('/buyer/service-requests',['type'=>'lgc_service','service'=>$key,'phone'=>'0771234567','location'=>'Gampaha','message'=>'Please discuss my project.'])->assertSessionHasNoErrors()->assertRedirect();
            $item=BuyerServiceRequest::latest('id')->firstOrFail();
            $this->assertStringContainsString('Requested service: '.$label,$item->message);
            $this->assertSame($buyer->id,$item->customer_id);
            $this->assertSame('lgc_service',$item->crmLead->source);
            $this->get('/buyer/service-requests/'.$item->id)->assertOk()->assertSee($label);
        }
        $this->post('/buyer/service-requests',['type'=>'lgc_service','service'=>'unapproved','phone'=>'0771234567','location'=>'Gampaha','message'=>'Test'])->assertSessionHasErrors('service');
        $this->assertDatabaseCount('buyer_service_requests',4);
        $this->actingAs($this->member('sales'))->get(route('leads.show',['role'=>'sales','lead'=>$item->crmLead->id]))->assertOk()->assertSee('Requested service: BOQ services');
    }
    public function test_company_registration_is_private_and_cannot_grant_access_or_publish_itself(): void {
        $applicant=$this->member('buyer');
        $this->post('/account/developer-application',$this->registration())->assertRedirect('/account-signin');
        $this->actingAs($applicant)->post('/account/developer-application',$this->registration(['user_id'=>999,'status'=>'approved','developer_id'=>999,'is_published'=>1,'role'=>'admin']))->assertSessionHasNoErrors()->assertRedirect();
        $application=DeveloperApplication::firstOrFail();
        $this->assertSame($applicant->id,$application->user_id);$this->assertSame('pending',$application->status);
        $this->assertNull($application->developer_id);$this->assertFalse($applicant->fresh()->hasRole('admin'));
        $this->post('/account/developer-application',$this->registration())->assertSessionHasErrors('application');
        $this->assertDatabaseCount('developer_applications',1);$this->assertDatabaseCount('developers',0);
        $this->get('/account/developer-application')->assertOk()->assertSee('Example developer');
        $this->get('/admin/developer-applications/'.$application->id)->assertForbidden();
        $this->post('/admin/developer-applications/'.$application->id.'/review',['decision'=>'approved','review_notes'=>'Attempted bypass'])->assertForbidden();
        $this->actingAs($this->member('buyer'))->get('/account/developer-application')->assertOk()->assertDontSee('Example developer');
    }
    public function test_admin_review_creates_only_a_draft_and_cannot_be_replayed(): void {
        $applicant=$this->member('buyer');
        $this->actingAs($applicant)->post('/account/developer-application',$this->registration())->assertSessionHasNoErrors();
        $application=DeveloperApplication::firstOrFail();
        $this->actingAs($this->member('admin'))->get('/admin/developer-applications')->assertOk()->assertSee('Example developer');
        $this->get('/admin/developer-applications/'.$application->id)->assertOk()->assertSee($applicant->email);
        $this->post('/admin/developer-applications/'.$application->id.'/review',['decision'=>'approved','review_notes'=>'Details reviewed.'])->assertSessionHasNoErrors();
        $application->refresh();$developer=$application->developer;
        $this->assertSame('approved',$application->status);$this->assertFalse($developer->is_published);$this->assertNull($developer->phone);$this->assertNull($developer->email);
        $this->get('/developers')->assertOk()->assertDontSee('Example developer');
        $this->post('/admin/developer-applications/'.$application->id.'/review',['decision'=>'approved','review_notes'=>'Again'])->assertSessionHasErrors('application');
        $this->assertDatabaseCount('developers',1);
        $this->actingAs($applicant)->get('/account/developer-application')->assertOk()->assertSee('Details reviewed.');
        $this->post('/account/developer-application',$this->registration())->assertSessionHasErrors('application');
    }
    public function test_invalid_and_rejected_company_registrations_are_handled(): void {
        $applicant=$this->member('buyer');
        $this->actingAs($applicant)->post('/account/developer-application',$this->registration(['website'=>'javascript:alert(1)']))->assertSessionHasErrors('website');
        $this->assertDatabaseCount('developer_applications',0);
        $this->post('/account/developer-application',$this->registration())->assertSessionHasNoErrors();
        $application=DeveloperApplication::firstOrFail();
        $this->actingAs($this->member('admin'))->post('/admin/developer-applications/'.$application->id.'/review',['decision'=>'rejected','review_notes'=>'Please clarify the company details.'])->assertSessionHasNoErrors();
        $this->actingAs($applicant)->get('/account/developer-application')->assertOk()->assertSee('Please clarify the company details.');
        $this->post('/account/developer-application',$this->registration(['description'=>'Updated company details.']))->assertSessionHasNoErrors();
        $this->assertSame('pending',$application->fresh()->status);$this->assertNull($application->fresh()->review_notes);
        $this->assertDatabaseCount('developers',0);
    }
    public function test_only_admins_manage_testimonials(): void {
        $this->post('/admin/testimonials',$this->quote())->assertRedirect('/account-signin');
        foreach(['buyer','seller','agent','sales','verification'] as $role) {
            $this->actingAs($this->member($role))->get('/admin/testimonials')->assertForbidden();
            $this->post('/admin/testimonials',$this->quote())->assertForbidden();
        }
        $this->assertDatabaseCount('testimonials',0);
    }
    public function test_testimonials_require_permission_and_can_be_unpublished(): void {
        $this->actingAs($this->member('admin'));
        $this->get('/admin/testimonials/create')->assertOk();
        $this->post('/admin/testimonials',$this->quote(['is_published'=>1]))->assertSessionHasErrors(['consent_confirmed','consent_notes']);
        $this->post('/admin/testimonials',$this->quote(['is_published'=>1,'consent_confirmed'=>1]))->assertSessionHasErrors('consent_notes');
        $this->post('/admin/testimonials',$this->quote())->assertSessionHasNoErrors();
        $quote=Testimonial::firstOrFail();
        $this->get('/')->assertOk()->assertDontSee($quote->quote)->assertDontSee('What our customers say');
        $payload=$this->quote(['is_published'=>1,'consent_confirmed'=>1,'consent_notes'=>'Private permission record','quote'=>'Helpful team <script>alert(1)</script>']);
        $this->put('/admin/testimonials/'.$quote->id,$payload)->assertSessionHasNoErrors();
        $this->get('/')->assertOk()->assertSee('What our customers say')->assertSee('&lt;script&gt;',false)->assertDontSee('<script>alert(1)</script>',false)->assertDontSee('Private permission record');
        $this->put('/admin/testimonials/'.$quote->id,array_replace($payload,['is_published'=>0]))->assertSessionHasNoErrors();
        $this->get('/')->assertOk()->assertDontSee('What our customers say');
    }
}
