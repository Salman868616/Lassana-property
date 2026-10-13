<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\EmailVerificationCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\{Hash, Notification, Password};
use Tests\TestCase;

class PasswordMinimumLengthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        config(['sms.enabled' => false]);
        Notification::fake();
        if ($views = getenv('PASSWORD_CANDIDATE_VIEWS')) $this->app['view']->getFinder()->prependLocation($views);
    }

    public function test_registration_rejects_seven_characters_and_mismatches_but_accepts_eight(): void
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $data = ['name' => 'Eight character buyer', 'email' => 'eight@example.test', 'terms' => 1];
        $this->post('/register', $data + ['password' => 'Pass123', 'password_confirmation' => 'Pass123'])
            ->assertSessionHasErrors('password');
        $this->post('/register', $data + ['password' => 'Pass1234', 'password_confirmation' => 'Pass4321'])
            ->assertSessionHasErrors('password');
        $this->assertDatabaseCount('users', 0);
        $this->post('/register', $data + ['password' => 'Pass1234', 'password_confirmation' => 'Pass1234'])
            ->assertRedirect('/verify-email')->assertSessionHasNoErrors();
        $user = User::where('email', $data['email'])->firstOrFail();
        $this->assertTrue(Hash::check('Pass1234', $user->password));
        $this->assertTrue($user->registration_verification_pending);
        Notification::assertSentTo($user, EmailVerificationCode::class);
    }

    public function test_reset_uses_the_same_minimum_and_still_requires_confirmation(): void
    {
        $user = User::factory()->create();
        $token = Password::createToken($user);
        $data = ['email' => $user->email, 'token' => $token];
        $original = $user->password;
        $this->post('/reset-password', $data + ['password' => 'Pass123', 'password_confirmation' => 'Pass123'])
            ->assertSessionHasErrors('password');
        $this->post('/reset-password', $data + ['password' => 'Pass1234', 'password_confirmation' => 'Pass4321'])
            ->assertSessionHasErrors('password');
        $this->assertSame($original, $user->fresh()->password);
        $this->post('/reset-password', $data + ['password' => 'Pass1234', 'password_confirmation' => 'Pass1234'])
            ->assertRedirect('/account-signin')->assertSessionHasNoErrors();
        $this->assertTrue(Hash::check('Pass1234', $user->fresh()->password));
        $this->assertFalse(Password::tokenExists($user, $token));
    }

    public function test_forms_show_eight_character_guidance(): void
    {
        $this->get('/account-signup')->assertOk()->assertSee('Minimum 8 characters')
            ->assertSee('minlength="8"', false)->assertDontSee('minlength="12"', false);
        $this->get('/reset-password/preview')->assertOk()->assertSee('at least 8 characters')
            ->assertSee('minlength="8"', false)->assertDontSee('minlength="12"', false);
    }

    public function test_email_recovery_uses_requested_message_for_known_and_unknown_addresses(): void
    {
        $user = User::factory()->create();
        foreach ([$user->email, 'unknown@example.test'] as $email) {
            $this->post('/forgot-password', ['email' => $email])
                ->assertSessionHas('status', 'A reset link will be sent. Check your inbox or spam folder.');
        }
    }
}
