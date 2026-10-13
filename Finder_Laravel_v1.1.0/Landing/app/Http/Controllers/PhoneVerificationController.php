<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\SriLankaMobileNumber;
use App\Services\{DashboardAccess, PhoneVerification, SmsAuthentication};
use App\Support\SriLankaMobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhoneVerificationController extends Controller
{
    public function notice(Request $request, SmsAuthentication $sms)
    {
        abort_unless(config('sms.enabled'), 404);
        $user = $request->user()->fresh();
        if ($sms->complete($request, $user)) return redirect()->route(app(DashboardAccess::class)->postLoginRoute($user));
        $sms->challenge($request);
        $codePending = DB::table('sms_verification_codes')->where('user_id', $user->id)
            ->where('phone', SriLankaMobile::normalize($user->phone))
            ->where('expires_at', '>', now())->where('attempts', '<', 5)->exists();
        return response()->view('account.auth.verify-phone', compact('user', 'codePending'))
            ->header('Cache-Control', 'no-store');
    }

    public function send(Request $request, PhoneVerification $verification, SmsAuthentication $sms)
    {
        abort_unless(config('sms.enabled'), 404);
        $user = $request->user()->fresh();
        if ($sms->complete($request, $user)) return redirect()->route(app(DashboardAccess::class)->postLoginRoute($user));
        if (!$user->hasVerifiedPhone()) {
            // Enrollment can follow a fresh email OTP only. Login to an enrolled phone cannot replace it here.
            abort_unless($request->session()->get('sms_enrollment_email') === [$user->id, $user->email], 403);
            $data = $request->validate(['phone' => ['required', 'string', 'max:30', new SriLankaMobileNumber]]);
            $phone = SriLankaMobile::normalize($data['phone']);
            $user = DB::transaction(function () use ($request, $phone) {
                $account = User::lockForUpdate()->findOrFail($request->user()->id);
                abort_unless($account->is_active && (int) $account->auth_version === (int) $request->session()->get('auth_version', 0), 403);
                abort_if($account->hasVerifiedPhone(), 409, 'This mobile number has already been verified. Please sign in again.');
                $account->forceFill(['phone' => $phone, 'verified_phone' => null, 'phone_verified_at' => null])->save();
                return $account;
            });
        }
        $error = $verification->send($user, $sms->challenge($request), (string) $request->ip());
        $redirect = redirect()->route('phone-verification.notice');
        return $error ? $redirect->withErrors(['code' => $error]) : $redirect->with('status', 'Your SMS code has been sent.');
    }

    public function verify(Request $request, PhoneVerification $verification, SmsAuthentication $sms)
    {
        abort_unless(config('sms.enabled'), 404);
        $user = $request->user()->fresh();
        if ($sms->complete($request, $user)) return redirect()->route(app(DashboardAccess::class)->postLoginRoute($user));
        $data = $request->validate(['code' => ['required', 'string', 'regex:/^[0-9]{6}$/']]);
        $error = $verification->verify($user, $data['code'], (string) $request->session()->get('sms_otp_challenge'));
        if ($error) return back()->withErrors(['code' => $error]);
        $request->session()->regenerate();
        $request->session()->put('sms_verified', [$user->id, $user->email, SriLankaMobile::normalize($user->phone)]);
        $request->session()->forget('sms_otp_challenge');
        return redirect()->route(app(DashboardAccess::class)->postLoginRoute($user))->with('success', 'Welcome, '.$user->name.'! You have signed in successfully.');
    }
}
