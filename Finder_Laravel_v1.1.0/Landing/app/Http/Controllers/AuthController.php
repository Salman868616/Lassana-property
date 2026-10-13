<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',
                'unique:users,email',
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
            'account_type' => ['sometimes','required','in:buyer,seller,agent'],
            'phone' => config('sms.enabled')
                ? ['required', 'string', 'max:30', new \App\Rules\SriLankaMobileNumber]
                : ['exclude_unless:account_type,agent','required','string','max:30'],
            'agency_name' => ['exclude_unless:account_type,agent','nullable','string','max:150'],
            'service_areas' => ['exclude_unless:account_type,agent','required','string','max:500'],
            'bio' => ['exclude_unless:account_type,agent','required','string','max:2000'],
        ]);

        if (config('sms.enabled')) $data['phone'] = \App\Support\SriLankaMobile::normalize($data['phone']);
        $user = DB::transaction(function () use ($data) {
            $buyerRole = Role::where('name', 'buyer')->firstOrFail();

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $user->forceFill(['registration_verification_pending'=>true])->save();
            if (config('sms.enabled')) $user->forceFill(['phone' => $data['phone']])->save();
            $user->roles()->attach($buyerRole->id);
            if (($data['account_type'] ?? 'buyer') === 'seller') {
                $user->roles()->attach(Role::where('name','seller')->firstOrFail()->id);
            }
            if (($data['account_type'] ?? 'buyer') === 'agent') {
                $user->agentApplications()->create(\Illuminate\Support\Arr::only($data,['phone','agency_name','service_areas','bio']));
            }

            return $user;
        });

        Auth::login($user);
        $request->session()->forget(['otp_verified', 'login_otp_challenge', 'sms_verified', 'sms_otp_challenge', 'sms_enrollment_email']);
        $request->session()->regenerate();
        $request->session()->put('auth_version', (int) $request->user()->auth_version);

        $error = app(\App\Services\EmailVerification::class)->send($user);
        $redirect = redirect()->route('verification.notice');
        return $error ? $redirect->withErrors(['email'=>$error]) : $redirect->with('status', 'A verification code has been sent to your email.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $key = 'login:'.hash(
            'sha256',
            strtolower($credentials['email']).'|'.$request->ip()
        );

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            throw ValidationException::withMessages([
                'email' => "Too many attempts. Try again in {$seconds} seconds.",
            ]);
        }

        if (! Auth::attempt(array_merge($credentials, ['is_active'=>true]), false)) {
            RateLimiter::hit($key, 60);

            throw ValidationException::withMessages([
                'email' => 'The email or password is incorrect.',
            ]);
        }

        RateLimiter::clear($key);
        $request->session()->regenerate();
        $request->session()->put('auth_version', (int) $request->user()->auth_version);

        $request->session()->forget(['otp_verified', 'login_otp_challenge', 'sms_verified', 'sms_otp_challenge', 'sms_enrollment_email']);
        if (config('sms.enabled')) {
            $sms = app(\App\Services\SmsAuthentication::class);
            if (!$sms->needsEmail($request, $request->user())) return $sms->start($request, $request->user());
        }
        $challenge = bin2hex(random_bytes(32));
        $request->session()->put('login_otp_challenge', $challenge);
        $error = app(\App\Services\EmailVerification::class)->send($request->user(), $challenge);
        $redirect = redirect()->route('verification.notice');
        return $error ? $redirect->withErrors(['email'=>$error]) : $redirect->with('status', 'A sign-in code has been sent to your email.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('account-signin')->with('status', 'You have been logged out successfully.');
    }
}
