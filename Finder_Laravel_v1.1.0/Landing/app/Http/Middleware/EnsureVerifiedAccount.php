<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class EnsureVerifiedAccount
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user()?->fresh();
        if (!$user) return $next($request);
        if (config('sms.enabled')) {
            $sms = app(\App\Services\SmsAuthentication::class);
            if ($sms->complete($request, $user) || $request->routeIs('logout')) return $next($request);
            if ($sms->needsEmail($request, $user)) {
                if (!$user->requiresRegistrationVerification() && !$request->session()->has('login_otp_challenge')) {
                    $request->session()->put('login_otp_challenge', bin2hex(random_bytes(32)));
                }
                if ($request->routeIs('verification.*')) return $next($request);
                $route = 'verification.notice';
                $message = 'Please verify your email before continuing.';
            } else {
                $sms->challenge($request);
                if ($request->routeIs('phone-verification.*')) return $next($request);
                $route = 'phone-verification.notice';
                $message = 'Please enter your SMS verification code.';
            }
            if ($request->expectsJson()) return response()->json(['message' => $message], 403);
            return redirect()->route($route);
        }
        $verified = $request->session()->get('otp_verified');
        if (!$user->requiresRegistrationVerification() && $verified === [$user->id, $user->email]) return $next($request);
        if (!$user->requiresRegistrationVerification() && !$request->session()->has('login_otp_challenge')) {
            $request->session()->put('login_otp_challenge', bin2hex(random_bytes(32)));
        }
        if ($request->routeIs('verification.*', 'logout')) return $next($request);
        if ($request->expectsJson()) return response()->json(['message'=>'Please enter your email verification code.'], 403);
        return redirect()->route('verification.notice');
    }
}
