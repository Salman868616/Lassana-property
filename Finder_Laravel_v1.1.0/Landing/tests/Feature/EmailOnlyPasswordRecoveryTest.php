<?php

namespace Tests\Feature;

use App\Contracts\SmsGateway;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\{Notification, Password};
use Tests\TestCase;

class EmailOnlyPasswordRecoveryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Notification::fake();
        // Email-only recovery must hold even after SMS login is enabled.
        config(['sms.enabled' => true]);
        $this->mock(SmsGateway::class)->shouldNotReceive('send');
        if ($views = getenv('EMAIL_ONLY_CANDIDATE_VIEWS')) {
            $this->app['view']->getFinder()->prependLocation($views);
        }
    }

    public function test_old_mobile_bookmark_now_shows_only_the_email_form(): void
    {
        foreach (['/account-password-recovery', '/account-password-recovery?channel=mobile'] as $url) {
            $this->get($url)->assertOk()->assertSee('name="email"', false)
                ->assertDontSee('name="phone"', false)->assertDontSee('Mobile number')
                ->assertDontSee('lp-recovery-methods')->assertDontSee('SMS recovery')
                ->assertSee('auth-modern-home-20261012.webp');
        }
    }

    public function test_legacy_mobile_requests_cannot_send_a_reset_message_or_create_a_token(): void
    {
        $user = User::factory()->create([
            'phone' => '94771234567', 'verified_phone' => '94771234567', 'phone_verified_at' => now(),
        ]);
        $this->post('/forgot-password', ['channel' => 'mobile', 'phone' => '0771234567'])
            ->assertSessionHasErrors(['email', 'channel', 'phone']);
        $this->post('/forgot-password', ['channel' => 'mobile', 'phone' => '0771234567', 'email' => $user->email])
            ->assertSessionHasErrors(['channel', 'phone']);
        $this->assertDatabaseCount('password_reset_tokens', 0);
        Notification::assertNothingSent();
    }

    public function test_old_sms_links_return_to_email_recovery_without_disclosing_an_account(): void
    {
        $user = User::factory()->create();
        $token = Password::createToken($user);
        $this->get(route('password.reset', ['token' => $token, 'u' => $user->id]))
            ->assertRedirect('/account-password-recovery')->assertSessionHasErrors('email')
            ->assertDontSee($user->email)->assertHeader('Cache-Control', 'no-store, private');
    }
}
