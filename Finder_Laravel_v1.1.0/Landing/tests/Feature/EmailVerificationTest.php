<?php
namespace Tests\Feature;
use App\Models\User;
use App\Notifications\EmailVerificationCode;
use App\Services\EmailVerification;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\{DB, Event, Hash, Notification};
use Tests\TestCase;
class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        Notification::fake();
    }
    private function code(User $user): string
    {
        return Notification::sent($user, EmailVerificationCode::class)->last()->code;
    }
    public function test_registration_sends_a_hashed_expiring_code_and_requires_verification(): void
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $response=$this->post('/register',[
            'name'=>'New Buyer','email'=>'new@example.test','password'=>'Registration-password-123',
            'password_confirmation'=>'Registration-password-123','terms'=>'1','email_verified_at'=>now(),'role'=>'admin','registration_verification_pending'=>false,
        ]);
        $response->assertRedirect(route('verification.notice'))->assertSessionHasNoErrors();
        $user=User::where('email','new@example.test')->firstOrFail();
        $this->assertAuthenticatedAs($user);
        $this->assertNull($user->email_verified_at);
        $this->assertTrue($user->registration_verification_pending);
        $this->assertTrue($user->hasRole('buyer'));
        $this->assertFalse($user->hasRole('admin'));
        Notification::assertSentTo($user,EmailVerificationCode::class);
        $row=DB::table('email_verification_codes')->where('user_id',$user->id)->first();
        $this->assertTrue(Hash::check($this->code($user),$row->code_hash));
        $this->assertNotSame($this->code($user),$row->code_hash);
        $this->assertSame(now()->addMinutes(10)->format('Y-m-d H:i'),substr($row->expires_at,0,16));
        $this->get('/dashboard')->assertRedirect(route('verification.notice'));
        $this->get('/verify-email')->assertOk()->assertSee('autocomplete="one-time-code"',false)->assertDontSee($this->code($user));
    }
    public function test_valid_code_verifies_only_the_session_account_and_is_consumed(): void
    {
        Event::fake([Verified::class]);
        $user=User::factory()->unverified()->state(['registration_verification_pending'=>true])->create();
        $other=User::factory()->unverified()->state(['registration_verification_pending'=>true])->create();
        app(EmailVerification::class)->send($user);
        $this->actingAs($user)->post('/verify-email',['code'=>$this->code($user),'user_id'=>$other->id,'email'=>$other->email])
            ->assertRedirect(route('dashboard'))->assertSessionHasNoErrors();
        $this->assertNotNull($user->fresh()->email_verified_at);
        $this->assertFalse($user->fresh()->registration_verification_pending);
        $this->assertNull($other->fresh()->email_verified_at);
        $this->assertDatabaseMissing('email_verification_codes',['user_id'=>$user->id]);
        $this->post('/verify-email',['code'=>$this->code($user)])->assertRedirect(route('dashboard'));
        Event::assertDispatchedTimes(Verified::class,1);
        $this->actingAs($other)->post('/verify-email',['code'=>$this->code($user)])->assertSessionHasErrors('code');
    }
    public function test_expired_codes_and_five_wrong_attempts_cannot_verify(): void
    {
        $user=User::factory()->unverified()->state(['registration_verification_pending'=>true])->create();
        app(EmailVerification::class)->send($user);
        $this->actingAs($user);
        for($i=0;$i<5;$i++) $this->post('/verify-email',['code'=>'000000'])->assertSessionHasErrors('code');
        $this->assertDatabaseHas('email_verification_codes',['user_id'=>$user->id,'attempts'=>5]);
        $this->post('/verify-email',['code'=>$this->code($user)])->assertSessionHasErrors('code');
        $this->assertNull($user->fresh()->email_verified_at);
        $this->travel(61)->seconds();
        $this->post('/verify-email/resend')->assertSessionHasNoErrors();
        $this->travel(10)->minutes();
        $this->post('/verify-email',['code'=>$this->code($user)])->assertSessionHasErrors('code');
        $this->assertNull($user->fresh()->email_verified_at);
    }
    public function test_resend_cooldown_hourly_limit_and_replacement_are_enforced(): void
    {
        $user=User::factory()->unverified()->state(['registration_verification_pending'=>true])->create();
        $service=app(EmailVerification::class);
        $this->assertNull($service->send($user));
        $this->assertNotNull($service->send($user));
        // Use a deterministic old code to avoid a random six-digit collision.
        DB::table('email_verification_codes')->where('user_id',$user->id)->update(['code_hash'=>Hash::make('000000')]);
        $this->travel(61)->seconds();
        $this->assertNull($service->send($user));
        $this->assertNotNull($service->verify($user,'000000'));
        for($i=0;$i<3;$i++) { $this->travel(61)->seconds(); $this->assertNull($service->send($user)); }
        $this->travel(61)->seconds();
        $this->assertNotNull($service->send($user));
        Notification::assertSentToTimes($user,EmailVerificationCode::class,5);
        $this->travel(1)->hours();
        $this->assertNull($service->send($user));
    }
    public function test_unverified_users_are_restricted_to_verification_email_correction_and_logout(): void
    {
        $user=User::factory()->unverified()->state(['registration_verification_pending'=>true])->create();
        $this->actingAs($user)->get('/')->assertRedirect(route('verification.notice'));
        $this->get('/account-profile')->assertRedirect(route('verification.notice'));
        $this->put('/account-profile',['name'=>'Changed'])->assertRedirect(route('verification.notice'));
        $this->assertNotSame('Changed',$user->fresh()->name);
        $this->get('/verify-email')->assertOk()->assertSee('Correct email address');
        $this->get('/dashboard')->assertRedirect(route('verification.notice'));
        $this->getJson('/dashboard')->assertForbidden();
        $this->seed(\Database\Seeders\PropertyCategorySeeder::class);
        $property=new \App\Models\Property;
        $property->forceFill(['title'=>'Public property','owner_id'=>$user->id,'created_by'=>$user->id,
            'category'=>'land','property_category_id'=>DB::table('property_categories')->where('slug','land')->value('id'),
            'status'=>'published','district'=>'Gampaha','city'=>'Nittambuwa'])->save();
        $this->post(route('properties.enquiries.store',$property),[])->assertRedirect(route('verification.notice'));
        $this->assertDatabaseCount('property_enquiries',0);
        $this->post('/logout')->assertRedirect('/account-signin');
        $this->assertGuest();
        $this->get('/verify-email')->assertRedirect('/account-signin');
        $this->post('/verify-email/resend')->assertRedirect('/account-signin');
    }
    public function test_email_change_invalidates_old_code_and_requires_current_address(): void
    {
        $user=User::factory()->unverified()->state(['registration_verification_pending'=>true])->create(['password'=>Hash::make('Profile-test-password-123')]);
        app(EmailVerification::class)->send($user);
        $oldCode=$this->code($user);
        $this->actingAs($user)->put('/verify-email/address',[
            'name'=>$user->name,'email'=>'changed@example.test','current_password'=>'Profile-test-password-123',
        ])->assertSessionHasNoErrors();
        $user->refresh();
        $this->assertNull($user->email_verified_at);
        $this->assertNotNull(app(EmailVerification::class)->verify($user,$oldCode));
        $this->assertNotNull(app(EmailVerification::class)->send($user));
        $this->travel(61)->seconds();
        // An issued code is also bound to the exact email, even if changed elsewhere.
        app(EmailVerification::class)->send($user);
        $user->forceFill(['email'=>'changed-again@example.test'])->save();
        $this->assertNotNull(app(EmailVerification::class)->verify($user,$this->code($user)));
        $this->assertNull($user->fresh()->email_verified_at);
    }
    public function test_email_correction_checks_password_uniqueness_and_cannot_change_other_fields(): void
    {
        $user=User::factory()->unverified()->state(['registration_verification_pending'=>true])->create(['password'=>Hash::make('Correction-password-123')]);
        $other=User::factory()->create();
        $this->actingAs($user)->put('/verify-email/address',['email'=>'new@example.test'])->assertSessionHasErrors('current_password');
        $this->put('/verify-email/address',['email'=>'new@example.test','current_password'=>'wrong'])->assertSessionHasErrors('current_password');
        $this->put('/verify-email/address',['email'=>$other->email,'current_password'=>'Correction-password-123'])->assertSessionHasErrors('email');
        $this->put('/verify-email/address',['email'=>'new@example.test','current_password'=>'Correction-password-123',
            'id'=>$other->id,'name'=>'Tampered','email_verified_at'=>now(),'roles'=>['admin']])->assertRedirect('/verify-email');
        $this->assertSame('new@example.test',$user->fresh()->email);
        $this->assertSame($user->name,$user->fresh()->name);
        $this->assertNull($user->fresh()->email_verified_at);
        $this->assertSame($other->email,$other->fresh()->email);
        $this->assertSame(1,$user->fresh()->auth_version);
        $this->assertNull($user->fresh()->remember_token);
        $this->get('/verify-email')->assertOk();
        $this->withSession(['auth_version'=>0])->get('/verify-email')->assertRedirect('/account-signin');
    }
    public function test_unverified_login_redirects_and_suspended_users_cannot_receive_codes(): void
    {
        $user=User::factory()->unverified()->state(['registration_verification_pending'=>true])->create(['password'=>Hash::make('Login-test-password-123')]);
        $this->post('/login',['email'=>$user->email,'password'=>'Login-test-password-123'])->assertRedirect(route('verification.notice'));
        $user->forceFill(['is_active'=>false])->save();
        $this->post('/verify-email/resend')->assertRedirect('/account-signin');
        Notification::assertSentToTimes($user,EmailVerificationCode::class,1);
    }
    public function test_delivery_failure_keeps_account_unverified_and_allows_retry(): void
    {
        $user=User::factory()->unverified()->state(['registration_verification_pending'=>true])->create();
        Notification::shouldReceive('send')->once()->andThrow(new \RuntimeException('Test mail unavailable'));
        $this->assertNotNull(app(EmailVerification::class)->send($user));
        $this->assertDatabaseMissing('email_verification_codes',['user_id'=>$user->id]);
        $this->assertNull($user->fresh()->email_verified_at);
        Notification::fake();
        $this->assertNull(app(EmailVerification::class)->send($user));
    }
    public function test_existing_unverified_accounts_require_otp(): void
    {
        $user=User::factory()->unverified()->create(['password'=>Hash::make('Existing-password-123')]);
        $this->post('/login',['email'=>$user->email,'password'=>'Existing-password-123'])->assertRedirect('/verify-email');
        $this->get('/account-profile')->assertRedirect('/verify-email');
        $this->post('/verify-email',['code'=>$this->code($user)])->assertRedirect('/dashboard')->assertSessionHasNoErrors();
        $this->assertNotNull($user->fresh()->email_verified_at);
        $this->get('/account-profile')->assertOk();
    }
    public function test_completed_signup_requires_otp_after_email_change_and_login(): void
    {
        $user=User::factory()->unverified()->state(['registration_verification_pending'=>true])
            ->create(['password'=>Hash::make('Completed-password-123')]);
        $service=app(EmailVerification::class);
        $service->send($user);
        $this->assertNull($service->verify($user,$this->code($user)));
        $this->actingAs($user->fresh())->put('/account-profile',[
            'name'=>$user->name,'email'=>'replacement@example.test','current_password'=>'Completed-password-123',
        ])->assertRedirect('/account-profile');
        $this->get('/account-profile')->assertRedirect('/verify-email');
        $this->assertNull($user->fresh()->email_verified_at);
        $this->assertFalse($user->fresh()->registration_verification_pending);
        $this->post('/logout');
        $this->post('/login',['email'=>'replacement@example.test','password'=>'Completed-password-123'])->assertRedirect('/verify-email');
        Notification::assertSentToTimes($user,EmailVerificationCode::class,2);
    }
    public function test_malformed_codes_are_rejected_and_verified_accounts_do_not_get_mail(): void
    {
        $user=User::factory()->unverified()->state(['registration_verification_pending'=>true])->create();
        $this->actingAs($user)->post('/verify-email',['code'=>'12345'])->assertSessionHasErrors('code');
        $this->post('/verify-email',['code'=>['123456']])->assertSessionHasErrors('code');
        $user->markEmailAsVerified();
        $this->get('/verify-email')->assertRedirect(route('dashboard'));
        $this->post('/verify-email/resend')->assertRedirect(route('dashboard'));
        Notification::assertNothingSent();
    }
}
