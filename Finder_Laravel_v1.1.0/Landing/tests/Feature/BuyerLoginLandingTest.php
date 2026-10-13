<?php

namespace Tests\Feature;

use App\Contracts\SmsGateway;
use App\Models\User;
use App\Notifications\EmailVerificationCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\{DB, Hash, Notification};
use Tests\TestCase;

class BuyerLoginLandingTest extends TestCase
{
    use RefreshDatabase;

    private array $messages = [];
    private const PHONE = '94771234567';
    private const PASSWORD = 'Buyer-login-test-123';

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\RoleSeeder::class);
        config(['sms.enabled' => true]);
        Notification::fake();
        $this->mock(SmsGateway::class)->shouldReceive('send')->andReturnUsing(function ($recipient, $message) {
            $this->messages[] = $message;
        });
    }

    private function user(array $roles = ['buyer'], bool $enrolled = true): User
    {
        $user = User::factory()->create([
            'password' => Hash::make(self::PASSWORD), 'phone' => self::PHONE,
            'verified_phone' => $enrolled ? self::PHONE : null,
            'phone_verified_at' => $enrolled ? now() : null,
        ]);
        $user->roles()->attach(DB::table('roles')->whereIn('name', $roles)->pluck('id'));
        return $user;
    }

    private function login(User $user)
    {
        return $this->post('/login', ['email' => $user->email, 'password' => self::PASSWORD]);
    }

    private function smsCode(): string
    {
        preg_match('/\b([0-9]{6})\b/', end($this->messages), $matches);
        return $matches[1];
    }

    public function test_buyers_first_login_enrolls_mobile_then_opens_homepage(): void
    {
        $user = $this->user(enrolled: false);
        $this->withSession(['url.intended' => url('/dashboard/buyer')]);
        $this->login($user)->assertRedirect('/verify-email');
        $this->get('/')->assertRedirect('/verify-email');
        $emailCode = Notification::sent($user, EmailVerificationCode::class)->last()->code;
        $this->post('/verify-email', ['code' => $emailCode])->assertRedirect('/verify-phone');
        $this->post('/verify-phone/resend', ['phone' => self::PHONE])->assertSessionHasNoErrors();
        $this->get('/')->assertRedirect('/verify-phone');
        $this->post('/verify-phone', ['code' => $this->smsCode()])->assertRedirect('/')->assertSessionHasNoErrors();
        $this->get('/')->assertOk()->assertSee('Welcome, '.$user->name);
        $this->assertAuthenticatedAs($user);
    }

    public function test_enrolled_buyers_land_home_on_each_login_and_can_still_open_dashboard(): void
    {
        $user = $this->user();
        for ($login = 0; $login < 2; $login++) {
            $this->login($user)->assertRedirect('/verify-phone');
            $this->get('/')->assertRedirect('/verify-phone');
            $this->post('/verify-phone', ['code' => $this->smsCode()])->assertRedirect('/')->assertSessionHasNoErrors();
            $this->get('/')->assertOk();
            $this->get('/dashboard')->assertRedirect('/dashboard/buyer');
            $this->get('/dashboard/buyer')->assertOk();
            $this->post('/logout');
            $this->travel(61)->seconds();
        }
        $this->assertCount(2, $this->messages);
    }

    public function test_completed_sms_pages_return_buyers_home_without_sending_another_code(): void
    {
        $user = $this->user();
        $this->login($user)->assertRedirect('/verify-phone');
        $code = $this->smsCode();
        $this->post('/verify-phone', ['code' => $code])->assertRedirect('/');
        $this->get('/verify-phone')->assertRedirect('/');
        $this->post('/verify-phone/resend')->assertRedirect('/');
        $this->post('/verify-phone', ['code' => $code])->assertRedirect('/');
        $this->assertCount(1, $this->messages);
    }

    public function test_email_only_login_and_completed_email_pages_return_buyers_home(): void
    {
        config(['sms.enabled' => false]);
        $user = $this->user(enrolled: false);
        $this->login($user)->assertRedirect('/verify-email');
        $code = Notification::sent($user, EmailVerificationCode::class)->last()->code;
        $this->post('/verify-email', ['code' => $code])->assertRedirect('/');
        $this->get('/')->assertOk();
        $this->get('/verify-email')->assertRedirect('/');
        $this->post('/verify-email/resend')->assertRedirect('/');
        $this->post('/verify-email', ['code' => $code])->assertRedirect('/');
        $this->put('/verify-email/address', ['email' => 'unchanged@example.test'])->assertRedirect('/');
        Notification::assertSentToTimes($user, EmailVerificationCode::class, 1);
        $this->assertCount(0, $this->messages);
    }

    public function test_seller_agent_and_staff_keep_dashboard_landing_even_with_buyer_role(): void
    {
        foreach (['seller', 'agent', 'admin', 'sales', 'verification'] as $role) {
            $user = $this->user(['buyer', $role]);
            $this->login($user)->assertRedirect('/verify-phone');
            $this->post('/verify-phone', ['code' => $this->smsCode()])->assertRedirect('/dashboard');
            $this->get('/dashboard')->assertRedirect('/dashboard/'.$role);
            $this->get('/verify-phone')->assertRedirect('/dashboard');
            $this->post('/verify-phone/resend')->assertRedirect('/dashboard');
            $this->post('/logout');
        }
        $this->assertCount(5, $this->messages);
    }
}
