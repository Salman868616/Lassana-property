<?php
namespace Tests\Feature;
use App\Models\User;
use App\Notifications\EmailVerificationCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\{DB,Hash,Notification};
use Tests\TestCase;
class LoginRedirectTest extends TestCase
{
    use RefreshDatabase;
    public function test_every_role_requires_session_bound_otp_every_login(): void
    {
        Notification::fake();
        $this->seed(\Database\Seeders\RoleSeeder::class);
        foreach(['admin','seller','agent','sales','verification','buyer'] as $role) {
            $this->travel(61)->seconds();
            $user=User::factory()->create(['password'=>Hash::make('Login-test-password-123')]);
            $user->roles()->attach(DB::table('roles')->where('name',$role)->value('id'));
            $credentials=['email'=>$user->email,'password'=>'Login-test-password-123','remember'=>1];
            $this->post('/login',$credentials)->assertRedirect('/verify-email');
            $code=Notification::sent($user,EmailVerificationCode::class)->last()->code;
            $this->get('/dashboard')->assertRedirect('/verify-email');
            $this->getJson('/account-profile')->assertForbidden();
            $this->put('/verify-email/address',['email'=>'attacker@example.test','current_password'=>$credentials['password']])->assertForbidden();
            $this->post('/verify-email',['code'=>'000000'])->assertSessionHasErrors('code');
            $this->post('/verify-email',['code'=>$code])->assertRedirect($role === 'buyer' ? '/' : '/dashboard')->assertSessionHasNoErrors();
            if ($role !== 'buyer') $this->get('/dashboard')->assertRedirect('/dashboard/'.$role);
            $welcome = 'Welcome, '.$user->name.'! You have signed in successfully.';
            $landing = $role === 'buyer' ? '/' : '/dashboard/'.$role;
            $this->get($landing)->assertOk()->assertSee($welcome);
            $this->get($landing)->assertOk()->assertDontSee($welcome);
            $this->get('/dashboard')->assertRedirect('/dashboard/'.$role);
            $this->post('/logout');
            $this->post('/login',$credentials)->assertRedirect('/verify-email');
            $newCode=Notification::sent($user,EmailVerificationCode::class)->last()->code;
            $this->withSession(['login_otp_challenge'=>'different-session'])->post('/verify-email',['code'=>$newCode])->assertSessionHasErrors('code');
            $this->get('/dashboard')->assertRedirect('/verify-email');
            $this->assertFalse(\Illuminate\Support\Facades\Auth::viaRemember());
            $this->post('/logout');
        }
    }
    public function test_staff_land_on_their_dashboard_even_with_customer_roles(): void
    {
        Notification::fake();
        $this->seed(\Database\Seeders\RoleSeeder::class);
        foreach (['admin', 'sales', 'verification'] as $staffRole) {
            $this->travel(61)->seconds();
            $user = User::factory()->create(['password'=>Hash::make('Staff-password-123')]);
            $user->roles()->attach(DB::table('roles')->whereIn('name', [$staffRole, 'buyer', 'seller', 'agent'])->pluck('id'));
            $this->post('/login', ['email'=>$user->email, 'password'=>'Staff-password-123'])
                ->assertRedirect('/verify-email');
            $this->get('/dashboard')->assertRedirect('/verify-email');
            $code = Notification::sent($user, EmailVerificationCode::class)->last()->code;
            $this->post('/verify-email', ['code'=>$code])->assertRedirect('/dashboard')->assertSessionHasNoErrors();
            $this->get('/dashboard')->assertRedirect('/dashboard/'.$staffRole);
            $this->get('/dashboard/'.$staffRole)->assertOk();
            $this->post('/logout');
        }
        $admin = User::factory()->create();
        $admin->roles()->attach(DB::table('roles')->whereIn('name', ['admin','sales','verification'])->pluck('id'));
        $this->actingAs($admin)->get('/dashboard')->assertRedirect('/dashboard/admin');
    }

    public function test_agent_with_seller_role_lands_on_agent_dashboard_after_otp(): void
    {
        Notification::fake();
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $user = User::factory()->create(['password'=>Hash::make('Agent-password-123')]);
        $user->roles()->attach(DB::table('roles')->whereIn('name', ['buyer', 'seller', 'agent'])->pluck('id'));
        $this->post('/login', ['email'=>$user->email, 'password'=>'Agent-password-123'])->assertRedirect('/verify-email');
        $this->get('/dashboard')->assertRedirect('/verify-email');
        $code = Notification::sent($user, EmailVerificationCode::class)->last()->code;
        $this->post('/verify-email', ['code'=>$code])->assertRedirect('/dashboard')->assertSessionHasNoErrors();
        $this->get('/dashboard')->assertRedirect('/dashboard/agent');
        $this->get('/dashboard/agent')->assertOk();
        $this->get('/dashboard/seller')->assertOk();
    }

    public function test_logout_shows_confirmation_once_and_removes_authenticated_access(): void
    {
        $user = User::factory()->create();
        $message = 'You have been logged out successfully.';
        $this->actingAs($user)->post('/logout')->assertRedirect('/account-signin')
            ->assertSessionHas('status', $message)->assertSessionMissing('otp_verified');
        $this->assertGuest();
        $this->get('/account-signin')->assertOk()->assertSee($message);
        $this->get('/account-signin')->assertOk()->assertDontSee($message);
        $this->get('/account-profile')->assertRedirect('/account-signin');
    }

    public function test_old_sessions_and_delivery_failure_cannot_bypass_otp(): void
    {
        Notification::fake();
        $user=User::factory()->create(['password'=>Hash::make('Login-test-password-123')]);
        $this->actingAs($user)->withSession(['otp_verified'=>null])->get('/account-profile')->assertRedirect('/verify-email');
        $this->post('/logout');
        Notification::shouldReceive('send')->once()->andThrow(new \RuntimeException('Mail unavailable'));
        $this->post('/login',['email'=>$user->email,'password'=>'Login-test-password-123'])->assertRedirect('/verify-email')->assertSessionHasErrors('email');
        $this->get('/account-profile')->assertRedirect('/verify-email');
    }
}
