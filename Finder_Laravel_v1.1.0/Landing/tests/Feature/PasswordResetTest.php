<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\LassanaPasswordReset;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    private function payload(User $user, string $token): array
    {
        return ['email' => $user->email, 'token' => $token,
            'password' => 'New-test-password-123', 'password_confirmation' => 'New-test-password-123'];
    }

    public function test_recovery_pages_and_branded_notification_work(): void
    {
        Notification::fake();
        $user = User::factory()->create();
        $this->get('/account-signin')->assertOk()->assertSee(route('account-password-recovery'));
        $this->get('/account-password-recovery')->assertOk()->assertSee('Send reset link');
        $this->from('/account-password-recovery')->post('/forgot-password', ['email' => $user->email])
            ->assertRedirect('/account-password-recovery')->assertSessionHas('status');
        Notification::assertSentTo($user, LassanaPasswordReset::class, function ($notification) use ($user) {
            $mail = $notification->toMail($user);
            $this->assertSame('Reset your Lassana Property password', $mail->subject);
            $this->assertStringContainsString('/reset-password/', $mail->actionUrl);
            $this->get(route('password.reset', ['token' => $notification->token, 'email' => $user->email]))
                ->assertOk()->assertSee($user->email)->assertHeader('Referrer-Policy', 'no-referrer');
            $stored = DB::table('password_reset_tokens')->where('email', $user->email)->value('token');
            $this->assertNotSame($notification->token, $stored);
            return Password::tokenExists($user, $notification->token);
        });
    }

    public function test_unknown_suspended_and_repeated_requests_do_not_expose_accounts_or_send_extra_mail(): void
    {
        Notification::fake();
        $user = User::factory()->create();
        $suspended = User::factory()->create(['is_active' => false]);
        $this->post('/forgot-password', ['email' => $user->email])->assertSessionHas('status');
        $message = session('status');
        foreach ([$user->email, 'unknown@example.com', $suspended->email] as $email) {
            $this->post('/forgot-password', ['email' => $email])->assertSessionHas('status', $message);
        }
        Notification::assertSentToTimes($user, LassanaPasswordReset::class, 1);
        Notification::assertNotSentTo($suspended, LassanaPasswordReset::class);
    }

    public function test_successful_reset_changes_password_revokes_sessions_and_consumes_token(): void
    {
        Notification::fake();
        $user = User::factory()->create(['password' => Hash::make('Old-test-password-123'), 'remember_token' => 'old-token']);
        $token = Password::createToken($user);
        $data = $this->payload($user, $token);
        $this->post('/reset-password', $data)->assertRedirect('/account-signin')->assertSessionHasNoErrors();
        $user->refresh();
        $this->assertTrue(Hash::check($data['password'], $user->password));
        $this->assertFalse(Hash::check('Old-test-password-123', $user->password));
        $this->assertSame(1, $user->auth_version);
        $this->assertNull($user->remember_token);
        $this->assertGuest();
        $this->assertDatabaseMissing('password_reset_tokens', ['email' => $user->email]);
        $this->post('/reset-password', $data)->assertSessionHasErrors('email');
        $this->actingAs($user)->withSession(['auth_version' => 0])->get('/account-profile')->assertRedirect('/account-signin');
        $this->assertGuest();
        $this->post('/login', ['email' => $user->email, 'password' => $data['password']])->assertRedirect('/verify-email');
        $this->assertAuthenticatedAs($user);
        $this->get('/account-profile')->assertRedirect('/verify-email');
        Notification::assertSentTo($user, \App\Notifications\EmailVerificationCode::class);
    }

    public function test_invalid_expired_and_wrong_account_tokens_cannot_change_passwords(): void
    {
        $user = User::factory()->create();
        $other = User::factory()->create();
        $original = $user->password;
        $token = Password::createToken($user);
        $this->post('/reset-password', $this->payload($user, 'invalid'))->assertSessionHasErrors('email');
        $this->post('/reset-password', $this->payload($other, $token))->assertSessionHasErrors('email');
        $this->travel(61)->minutes();
        $this->post('/reset-password', $this->payload($user, $token))->assertSessionHasErrors('email');
        $this->assertSame($original, $user->fresh()->password);
        $this->travelBack();
    }

    public function test_validation_and_suspension_after_link_creation_are_enforced(): void
    {
        $user = User::factory()->create();
        $original = $user->password;
        $token = Password::createToken($user);
        $data = $this->payload($user, $token);
        $this->post('/forgot-password', ['email' => 'invalid'])->assertSessionHasErrors('email');
        $this->post('/reset-password', array_replace($data, ['password' => 'short', 'password_confirmation' => 'short']))->assertSessionHasErrors('password');
        $this->post('/reset-password', array_replace($data, ['password_confirmation' => 'different-password']))->assertSessionHasErrors('password');
        $user->forceFill(['is_active' => false])->save();
        $this->post('/reset-password', $data)->assertSessionHasErrors('email');
        $this->assertSame($original, $user->fresh()->password);
        $this->assertFalse($user->fresh()->is_active);
    }

    public function test_recovery_requests_are_rate_limited(): void
    {
        Notification::fake();
        for ($i = 0; $i < 5; $i++) {
            $this->post('/forgot-password', ['email' => 'unknown@example.com'])->assertRedirect();
        }
        $this->post('/forgot-password', ['email' => 'unknown@example.com'])->assertStatus(429);
    }
}
