<?php
namespace Tests\Feature;
use App\Models\{User,AgentApplication};
use App\Notifications\EmailVerificationCode;
use App\Services\EmailVerification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\{DB,Notification};
use Tests\TestCase;
class AccountOnboardingTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\RoleSeeder::class);
        Notification::fake();
    }
    private function member(string $role='buyer'): User
    {
        $user=User::factory()->create();
        $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
        return $user;
    }
    private function details(): array
    {
        return ['phone'=>'0771234567','agency_name'=>'Example agency','service_areas'=>'Colombo, Gampaha','bio'=>'Local property agent.'];
    }
    private function signup(string $type): array
    {
        return ['name'=>'New member','email'=>'new@example.test','password'=>'Signup-password-123',
            'password_confirmation'=>'Signup-password-123','terms'=>1,'account_type'=>$type];
    }
    public function test_seller_signup_requires_otp_and_then_can_submit_to_existing_review_flow(): void
    {
        $this->get('/account-signup?account_type=seller')->assertOk()->assertSee('Account type');
        $this->post('/register',$this->signup('seller'))->assertRedirect('/verify-email')->assertSessionHasNoErrors();
        $user=User::where('email','new@example.test')->firstOrFail();
        $this->assertTrue($user->hasRole('seller'));
        $this->assertTrue($user->hasRole('buyer'));
        $this->get('/dashboard/seller')->assertRedirect('/verify-email');
        $code=Notification::sent($user,EmailVerificationCode::class)->sole()->code;
        $this->post('/verify-email',['code'=>$code])->assertSessionHasNoErrors();
        $this->get('/dashboard/seller')->assertOk();
        $this->get('/seller/properties/create')->assertOk();
        $this->get('/admin/users')->assertForbidden();
    }
    public function test_agent_signup_creates_pending_application_without_agent_access(): void
    {
        $this->post('/register',$this->signup('agent')+$this->details()+['roles'=>['admin'],'status'=>'approved','reviewed_by'=>1])
            ->assertSessionHasNoErrors()->assertRedirect('/verify-email');
        $user=User::where('email','new@example.test')->firstOrFail();
        $application=AgentApplication::sole();
        $this->assertSame($user->id,$application->user_id);
        $this->assertSame('pending',$application->status);
        $this->assertNull($application->reviewed_by);
        $this->assertFalse($user->hasRole('agent'));
        $this->assertFalse($user->hasRole('admin'));
        $this->post('/verify-email',['code'=>Notification::sent($user,EmailVerificationCode::class)->sole()->code]);
        $this->get('/dashboard/agent')->assertForbidden();
        $this->get('/account/agent-application')->assertOk()->assertSee('awaiting admin review');
    }
    public function test_invalid_account_type_or_incomplete_agent_details_create_no_account(): void
    {
        $this->post('/register',$this->signup('admin'))->assertSessionHasErrors('account_type');
        $this->post('/register',$this->signup('agent'))->assertSessionHasErrors(['phone','service_areas','bio']);
        $this->assertDatabaseCount('users',0);
        $this->assertDatabaseCount('agent_applications',0);
    }
    public function test_existing_user_can_add_seller_access_only_to_self_and_only_once(): void
    {
        $user=$this->member();$other=$this->member();
        $this->actingAs($user)->post('/account/seller-access',['user_id'=>$other->id,'roles'=>['admin']])->assertRedirect('/dashboard/seller');
        $this->assertTrue($user->fresh()->hasRole('seller'));
        $this->assertFalse($other->fresh()->hasRole('seller'));
        $this->assertFalse($user->fresh()->hasRole('admin'));
        $this->post('/account/seller-access')->assertRedirect('/dashboard/seller');
        $this->assertDatabaseCount('user_access_changes',1);
        $this->get('/dashboard/seller')->assertOk();
        $this->assertNull($user->fresh()->remember_token);
    }
    public function test_agent_approval_records_admin_preserves_roles_and_revokes_old_sessions(): void
    {
        $user=$this->member('seller');$admin=$this->member('admin');
        $this->actingAs($user)->post('/account/agent-application',$this->details())->assertSessionHasNoErrors();
        $application=AgentApplication::sole();
        $this->actingAs($admin)->get('/admin/agent-applications')->assertOk()->assertSee($user->email);
        $this->get('/admin/agent-applications/'.$application->id)->assertOk()->assertSee('Local property agent.');
        $this->post('/admin/agent-applications/'.$application->id.'/review',['decision'=>'approved','review_notes'=>'Professional details reviewed.'])
            ->assertSessionHasNoErrors();
        $this->assertTrue($user->fresh()->hasRole('agent'));
        $this->assertTrue($user->fresh()->hasRole('seller'));
        $this->assertSame('Example agency',$user->fresh()->agency_name);
        $this->assertSame($admin->id,$application->fresh()->reviewed_by);
        $this->assertNotNull($application->fresh()->reviewed_at);
        $this->assertDatabaseCount('user_access_changes',1);
        $this->post('/admin/agent-applications/'.$application->id.'/review',['decision'=>'rejected','review_notes'=>'Overwrite'])->assertSessionHasErrors('application');
        $this->assertSame('approved',$application->fresh()->status);
        $this->actingAs($user->fresh())->withSession(['auth_version'=>0])->get('/dashboard/agent')->assertRedirect('/account-signin');
        $this->actingAs($user->fresh())->withSession(['auth_version'=>$user->fresh()->auth_version])->get('/dashboard/agent')->assertOk();
    }
    public function test_rejection_is_visible_and_resubmission_keeps_history(): void
    {
        $user=$this->member();$other=$this->member();$admin=$this->member('admin');
        $this->actingAs($user)->post('/account/agent-application',$this->details());
        $application=AgentApplication::sole();
        $this->post('/account/agent-application',$this->details())->assertSessionHasErrors('application');
        $this->assertDatabaseCount('agent_applications',1);
        $this->actingAs($admin)->post('/admin/agent-applications/'.$application->id.'/review',['decision'=>'rejected','review_notes'=>'Please specify service areas.'])->assertSessionHasNoErrors();
        $this->actingAs($user)->get('/account/agent-application')->assertOk()->assertSee('Please specify service areas.');
        $this->post('/account/agent-application',$this->details())->assertSessionHasNoErrors();
        $this->assertDatabaseCount('agent_applications',2);
        $this->assertFalse($user->fresh()->hasRole('agent'));
        $this->actingAs($other)->get('/account/agent-application')->assertDontSee('Please specify service areas.');
    }
    public function test_only_admin_can_review_and_pending_or_suspended_accounts_cannot_be_approved(): void
    {
        $user=$this->member();$sales=$this->member('sales');$admin=$this->member('admin');
        $application=$user->agentApplications()->create($this->details());
        $url='/admin/agent-applications/'.$application->id.'/review';
        $payload=['decision'=>'approved','review_notes'=>'Checked'];
        $this->actingAs($sales)->post($url,$payload)->assertForbidden();
        $this->actingAs($user)->post($url,$payload)->assertForbidden();
        $this->actingAs($admin)->post($url,['decision'=>'approved'])->assertSessionHasErrors('review_notes');
        $user->forceFill(['registration_verification_pending'=>true,'email_verified_at'=>null])->save();
        $this->post($url,$payload)->assertSessionHasErrors('application');
        $user->forceFill(['registration_verification_pending'=>false,'is_active'=>false])->save();
        $this->post($url,$payload)->assertSessionHasErrors('application');
        $this->assertSame('pending',$application->fresh()->status);
        $this->assertFalse($user->fresh()->hasRole('agent'));
    }
    public function test_guests_and_pending_signups_cannot_gain_access_through_onboarding(): void
    {
        $this->post('/account/seller-access')->assertRedirect('/account-signin');
        $this->post('/account/agent-application',$this->details())->assertRedirect('/account-signin');
        $user=$this->member();$user->forceFill(['registration_verification_pending'=>true,'email_verified_at'=>null])->save();
        $this->actingAs($user)->post('/account/seller-access')->assertRedirect('/verify-email');
        $this->post('/account/agent-application',$this->details())->assertRedirect('/verify-email');
        $this->assertFalse($user->fresh()->hasRole('seller'));
        $this->assertDatabaseCount('agent_applications',0);
    }
}
