<?php

namespace Tests\Feature;

use App\Contracts\SmsGateway;
use App\Models\User;
use App\Notifications\EmailVerificationCode;
use App\Services\PhoneVerification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\{DB, Hash, Notification};
use Tests\TestCase;

class SmsVerificationTest extends TestCase
{
    use RefreshDatabase;

    private array $messages = [];
    private const PHONE = '94771234567';
    private const PASSWORD = 'Sms-test-password-123';

    protected function setUp(): void
    {
        parent::setUp();
        config(['sms.enabled' => true]);
        Notification::fake();
        $this->mock(SmsGateway::class)->shouldReceive('send')->andReturnUsing(function ($recipient, $message) {
            $this->messages[] = compact('recipient', 'message');
        });
    }

    private function user(bool $enrolled = true): User
    {
        return User::factory()->create([
            'password' => Hash::make(self::PASSWORD), 'phone' => self::PHONE,
            'verified_phone' => $enrolled ? self::PHONE : null,
            'phone_verified_at' => $enrolled ? now() : null,
        ]);
    }

    private function login(User $user)
    {
        return $this->post('/login', ['email' => $user->email, 'password' => self::PASSWORD]);
    }

    private function smsCode(): string
    {
        preg_match('/\b([0-9]{6})\b/', end($this->messages)['message'], $matches);
        return $matches[1];
    }

    private function emailCode(User $user): string
    {
        return Notification::sent($user, EmailVerificationCode::class)->last()->code;
    }

    public function test_registration_requires_email_then_sms_and_stores_only_a_hash(): void
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $this->post('/register', [
            'name' => 'SMS Buyer', 'email' => 'sms-buyer@example.test', 'password' => self::PASSWORD,
            'password_confirmation' => self::PASSWORD, 'terms' => 1, 'phone' => '0771234567',
            'verified_phone' => self::PHONE, 'phone_verified_at' => now(),
        ])->assertRedirect('/verify-email')->assertSessionHasNoErrors();
        $user = User::where('email', 'sms-buyer@example.test')->firstOrFail();
        $this->assertSame(self::PHONE, $user->phone);
        $this->assertFalse($user->hasVerifiedPhone());
        $this->get('/verify-phone')->assertRedirect('/verify-email');
        $this->post('/verify-phone/resend', ['phone' => self::PHONE])->assertRedirect('/verify-email');
        $this->assertCount(0, $this->messages);
        $this->post('/verify-email', ['code' => $this->emailCode($user)])->assertRedirect('/verify-phone');
        $this->get('/account-profile')->assertRedirect('/verify-phone');
        $this->get('/verify-phone')->assertOk()->assertSee('Verify your mobile')->assertSee('Mobile number');
        $this->post('/verify-phone/resend', ['phone' => self::PHONE])->assertSessionHasNoErrors();
        $row = DB::table('sms_verification_codes')->where('user_id', $user->id)->first();
        $this->assertNotSame($this->smsCode(), $row->code_hash);
        $this->assertTrue(Hash::check(session('sms_otp_challenge').':'.$this->smsCode(), $row->code_hash));
        $this->get('/verify-phone')->assertDontSee($this->smsCode());
        $this->post('/verify-phone', ['code' => $this->smsCode(), 'user_id' => 999])->assertRedirect('/')->assertSessionHasNoErrors();
        $this->assertTrue($user->fresh()->hasVerifiedPhone());
        $this->get('/account-profile')->assertOk();
    }

    public function test_every_login_requires_sms_and_cannot_fall_back_to_email_or_change_enrolled_phone(): void
    {
        $user = $this->user();
        $this->login($user)->assertRedirect('/verify-phone');
        Notification::assertNothingSent();
        $this->get('/account-profile')->assertRedirect('/verify-phone');
        $this->getJson('/account-profile')->assertForbidden();
        $this->get('/verify-email')->assertRedirect('/verify-phone');
        $this->post('/verify-email', ['code' => '123456'])->assertRedirect('/verify-phone');
        $this->get('/verify-phone')->assertOk()->assertDontSee('name="phone"', false);
        $this->travel(61)->seconds();
        $this->post('/verify-phone/resend', ['phone' => '94761112222'])->assertSessionHasNoErrors();
        $this->assertSame(self::PHONE, $user->fresh()->phone);
        $this->assertSame(self::PHONE, end($this->messages)['recipient']);
        $this->post('/verify-phone', ['code' => $this->smsCode()])->assertRedirect('/dashboard');
        $this->get('/account-profile')->assertOk();
        $this->post('/logout');
        $this->assertGuest();
        $this->travel(61)->seconds();
        $this->login($user)->assertRedirect('/verify-phone');
        $this->get('/account-profile')->assertRedirect('/verify-phone');
        Notification::assertNothingSent();
        $this->assertCount(3, $this->messages);
    }

    public function test_old_test_accounts_need_fresh_email_and_explicit_number_confirmation(): void
    {
        $user = $this->user(false);
        $user->forceFill(['phone' => '2445661'])->save();
        $this->login($user)->assertRedirect('/verify-email');
        $this->put('/verify-email/address', ['email' => 'attacker@example.test', 'current_password' => self::PASSWORD])->assertForbidden();
        $this->post('/verify-phone/resend', ['phone' => self::PHONE])->assertRedirect('/verify-email');
        $this->post('/verify-email', ['code' => $this->emailCode($user)])->assertRedirect('/verify-phone');
        $this->assertCount(0, $this->messages);
        $this->post('/verify-phone/resend', ['phone' => '2445661'])->assertSessionHasErrors('phone');
        $this->post('/verify-phone/resend', ['phone' => '+94 77 123 4567'])->assertSessionHasNoErrors();
        $this->assertSame(self::PHONE, $user->fresh()->phone);
        $this->post('/verify-phone', ['code' => $this->smsCode()])->assertSessionHasNoErrors();
        $this->assertTrue($user->fresh()->hasVerifiedPhone());
    }

    public function test_invalid_expired_and_consumed_codes_cannot_verify(): void
    {
        $user = $this->user(false);
        $service = app(PhoneVerification::class);
        $this->assertNull($service->send($user, 'session-one', '127.0.0.1'));
        $code = $this->smsCode();
        for ($i = 0; $i < 5; $i++) $this->assertNotNull($service->verify($user, '000000', 'session-one'));
        $this->assertNotNull($service->verify($user, $code, 'session-one'));
        $this->assertFalse($user->fresh()->hasVerifiedPhone());
        $this->travel(61)->seconds();
        $this->assertNull($service->send($user, 'session-one', '127.0.0.1'));
        $this->travel(10)->minutes();
        $this->assertNotNull($service->verify($user, $this->smsCode(), 'session-one'));
        $this->assertNull($service->send($user, 'session-one', '127.0.0.1'));
        $code = $this->smsCode();
        $this->assertNull($service->verify($user, $code, 'session-one'));
        $this->assertNotNull($service->verify($user, $code, 'session-one'));
    }

    public function test_code_is_bound_to_account_phone_and_login_session(): void
    {
        $user = $this->user(false);
        $other = $this->user(false);
        $service = app(PhoneVerification::class);
        $service->send($user, 'session-one', '127.0.0.1');
        $code = $this->smsCode();
        $this->assertNotNull($service->verify($other, $code, 'session-one'));
        $this->assertNotNull($service->verify($user, $code, 'session-two'));
        $user->forceFill(['phone' => '94761112222'])->save();
        $this->assertNotNull($service->verify($user, $code, 'session-one'));
        $this->assertFalse($user->fresh()->hasVerifiedPhone());
    }

    public function test_resend_limits_survive_successful_login_and_phone_corrections(): void
    {
        $user = $this->user(false);
        $service = app(PhoneVerification::class);
        $this->assertNull($service->send($user, 'one', '127.0.0.1'));
        $this->assertNotNull($service->send($user, 'two', '127.0.0.1'));
        $this->assertNull($service->verify($user, $this->smsCode(), 'one'));
        $user->forceFill(['phone' => '94761112222'])->save();
        for ($i = 0; $i < 4; $i++) {
            $this->travel(61)->seconds();
            $this->assertNull($service->send($user, 'two', '127.0.0.1'));
        }
        $this->travel(61)->seconds();
        $this->assertNotNull($service->send($user, 'two', '127.0.0.1'));
        $this->assertCount(5, $this->messages);
        $this->travel(1)->hours();
        $this->assertNull($service->send($user, 'two', '127.0.0.1'));
    }

    public function test_provider_failure_keeps_code_invalid_and_limits_retries(): void
    {
        $user = $this->user(false);
        $this->mock(SmsGateway::class)->shouldReceive('send')->once()->andThrow(new \RuntimeException('secret-password and OTP must not leak'));
        $service = app(PhoneVerification::class);
        $error = $service->send($user, 'one', '127.0.0.1');
        $this->assertStringNotContainsString('secret-password', $error);
        $this->assertFalse($user->fresh()->hasVerifiedPhone());
        $this->assertNotNull($service->send($user, 'one', '127.0.0.1'));
        $this->assertDatabaseHas('sms_verification_codes', ['user_id' => $user->id, 'send_count' => 1]);
        $this->assertTrue(now()->greaterThanOrEqualTo(DB::table('sms_verification_codes')->where('user_id', $user->id)->value('expires_at')));
    }

    public function test_mobile_change_requires_password_revokes_sessions_and_requires_reverification(): void
    {
        $user = $this->user();
        $this->login($user);
        $this->post('/verify-phone', ['code' => $this->smsCode()]);
        $data = ['name' => $user->name, 'email' => $user->email, 'phone' => '0761112222'];
        $this->put('/account-profile', $data)->assertSessionHasErrors('current_password');
        $this->put('/account-profile', $data + ['current_password' => self::PASSWORD])->assertRedirect('/account-profile');
        $this->assertFalse($user->fresh()->hasVerifiedPhone());
        $this->assertSame(1, $user->fresh()->auth_version);
        $this->get('/account-profile')->assertRedirect('/verify-email');
        $this->withSession(['auth_version' => 0])->get('/verify-phone')->assertRedirect('/account-signin');
    }

    public function test_disabled_or_suspended_accounts_cannot_send_or_verify_sms(): void
    {
        $user = $this->user();
        $this->login($user);
        $user->forceFill(['is_active' => false])->save();
        $this->post('/verify-phone', ['code' => $this->smsCode()])->assertRedirect('/account-signin');
        $this->assertCount(1, $this->messages);
        config(['sms.enabled' => false]);
        $service = app(PhoneVerification::class);
        $this->assertNotNull($service->send($user, 'one', '127.0.0.1'));
        $this->assertNotNull($service->verify($user, '123456', 'one'));
    }

    public function test_phone_is_required_for_all_signup_roles_and_agent_field_is_not_duplicated(): void
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $response = $this->get('/account-signup');
        $response->assertOk();
        $this->assertSame(1, preg_match_all('/<input\b[^>]*\bname="phone"/', $response->getContent()));
        foreach (['buyer', 'seller', 'agent'] as $role) {
            $this->post('/register', ['name' => 'Test', 'email' => $role.'@example.test', 'password' => self::PASSWORD,
                'password_confirmation' => self::PASSWORD, 'terms' => 1, 'account_type' => $role,
                'bio' => 'Test agent', 'service_areas' => 'Colombo', 'phone' => '0111234567',
            ])->assertSessionHasErrors('phone');
        }
        $this->assertDatabaseCount('users', 0);
    }

    public function test_sms_login_applies_to_all_six_account_roles(): void
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);
        foreach (['buyer', 'seller', 'agent', 'sales', 'verification', 'admin'] as $role) {
            $user = $this->user();
            $user->roles()->attach(DB::table('roles')->where('name', $role)->value('id'));
            $this->login($user)->assertRedirect('/verify-phone');
            $this->get('/account-profile')->assertRedirect('/verify-phone');
            $this->post('/verify-phone', ['code' => $this->smsCode()])->assertSessionHasNoErrors();
            $this->get('/account-profile')->assertOk();
            $this->post('/logout')->assertRedirect('/account-signin');
        }
        Notification::assertNothingSent();
    }

    public function test_password_reset_does_not_remove_the_sms_login_requirement(): void
    {
        $user = $this->user();
        $token = \Illuminate\Support\Facades\Password::createToken($user);
        $this->post('/reset-password', ['email' => $user->email, 'token' => $token,
            'password' => 'Replacement-password-123', 'password_confirmation' => 'Replacement-password-123',
        ])->assertRedirect('/account-signin')->assertSessionHasNoErrors();
        $this->post('/login', ['email' => $user->email, 'password' => 'Replacement-password-123'])->assertRedirect('/verify-phone');
        $this->get('/account-profile')->assertRedirect('/verify-phone');
        $this->post('/verify-phone/resend', ['phone' => '94761112222']);
        $this->assertSame(self::PHONE, $user->fresh()->verified_phone);
        $this->post('/verify-phone', ['code' => $this->smsCode()])->assertSessionHasNoErrors();
        $this->get('/account-profile')->assertOk();
    }

    public function test_a_new_code_replaces_the_old_code_and_changed_access_invalidates_it(): void
    {
        $user = $this->user();
        $service = app(PhoneVerification::class);
        $service->send($user, 'one', '127.0.0.1');
        DB::table('sms_verification_codes')->where('user_id', $user->id)->update(['code_hash' => Hash::make('one:000000')]);
        $this->travel(61)->seconds();
        $this->assertNull($service->send($user, 'two', '127.0.0.1'));
        $this->assertNotNull($service->verify($user, '000000', 'one'));
        $currentCode = $this->smsCode();
        User::whereKey($user->id)->update(['auth_version' => 1]);
        $this->assertNotNull($service->verify($user, $currentCode, 'two'));
    }

    public function test_sessions_from_before_activation_need_fresh_email_for_enrollment(): void
    {
        $user = $this->user(false);
        $this->actingAs($user)->get('/account-profile')->assertRedirect('/verify-email');
        $this->get('/verify-email')->assertOk();
        $this->post('/verify-phone/resend', ['phone' => self::PHONE])->assertRedirect('/verify-email');
        $this->assertCount(0, $this->messages);
    }
}
