<?php

namespace App\Services;

use App\Models\User;
use App\Support\SriLankaMobile;
use Illuminate\Http\Request;

class SmsAuthentication
{
    public function needsEmail(Request $request, User $user): bool
    {
        return !$user->hasVerifiedEmail() || (!$user->hasVerifiedPhone() &&
            $request->session()->get('sms_enrollment_email') !== [$user->id, $user->email]);
    }

    public function complete(Request $request, User $user): bool
    {
        return $user->hasVerifiedEmail() && $user->hasVerifiedPhone() &&
            $request->session()->get('sms_verified') === [$user->id, $user->email, SriLankaMobile::normalize($user->phone)];
    }

    public function challenge(Request $request): string
    {
        if (!$request->session()->has('sms_otp_challenge')) {
            $request->session()->put('sms_otp_challenge', bin2hex(random_bytes(32)));
        }
        return $request->session()->get('sms_otp_challenge');
    }

    public function start(Request $request, User $user)
    {
        $this->challenge($request);
        // Unverified numbers (including old test data) require explicit confirmation first.
        if (!$user->hasVerifiedPhone()) return redirect()->route('phone-verification.notice');
        $error = app(PhoneVerification::class)->send($user, $this->challenge($request), (string) $request->ip());
        $redirect = redirect()->route('phone-verification.notice');
        return $error ? $redirect->withErrors(['code' => $error]) : $redirect->with('status', 'A sign-in code has been sent to your mobile.');
    }
}
