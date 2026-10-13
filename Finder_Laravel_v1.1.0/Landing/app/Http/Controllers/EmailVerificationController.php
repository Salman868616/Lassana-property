<?php
namespace App\Http\Controllers;
use App\Services\EmailVerification;
use Illuminate\Http\Request;
class EmailVerificationController extends Controller
{
    public function notice(Request $request)
    {
        if (!config('sms.enabled') && $request->session()->get('otp_verified') === [$request->user()->id, $request->user()->email] && !$request->user()->fresh()->requiresRegistrationVerification()) return redirect()->route(app(\App\Services\DashboardAccess::class)->postLoginRoute($request->user()));
        $user = $request->user()->fresh();
        $codePending = \Illuminate\Support\Facades\DB::table('email_verification_codes')
            ->where('user_id', $user->id)->where('email', $user->email)
            ->where('expires_at', '>', now())->where('attempts', '<', 5)->exists();
        return response()->view('account.auth.verify-email', compact('user', 'codePending'))
            ->header('Cache-Control', 'no-store');
    }
    public function send(Request $request, EmailVerification $verification)
    {
        if (!config('sms.enabled') && $request->session()->get('otp_verified') === [$request->user()->id, $request->user()->email] && !$request->user()->fresh()->requiresRegistrationVerification()) return redirect()->route(app(\App\Services\DashboardAccess::class)->postLoginRoute($request->user()));
        $error = $verification->send($request->user(), $request->session()->get('login_otp_challenge'));
        return $error ? back()->withErrors(['email'=>$error]) : back()->with('status', 'A new verification code has been sent. Check your inbox and spam folder.');
    }
    public function changeEmail(Request $request)
    {
        abort_if($request->session()->has('login_otp_challenge'), 403);
        if (!config('sms.enabled') && $request->session()->get('otp_verified') === [$request->user()->id, $request->user()->email] && !$request->user()->fresh()->requiresRegistrationVerification()) return redirect()->route(app(\App\Services\DashboardAccess::class)->postLoginRoute($request->user()));
        $data = $request->validate([
            'email'=>['required','email','max:255',\Illuminate\Validation\Rule::unique('users','email')->ignore($request->user()->id)],
            'current_password'=>['required','current_password'],
        ]);
        $user = \Illuminate\Support\Facades\DB::transaction(function () use ($request, $data) {
            $account = \App\Models\User::lockForUpdate()->findOrFail($request->user()->id);
            abort_unless($account->is_active && (int)$account->auth_version === (int)$request->session()->get('auth_version',0),403);
            if (!$account->requiresRegistrationVerification() || $account->email === $data['email']) return $account;
            $account->email = $data['email'];
            $account->remember_token = null;
            $account->auth_version++;
            $account->save();
            // Invalidate the code but retain resend limits across address corrections.
            \Illuminate\Support\Facades\DB::table('email_verification_codes')->where('user_id',$account->id)
                ->update(['expires_at'=>now()]);
            return $account;
        });
        $request->session()->put('auth_version', $user->auth_version);
        $request->session()->regenerate();
        return redirect()->route('verification.notice')->with('status','Email address saved. Request a new verification code.');
    }
    public function verify(Request $request, EmailVerification $verification)
    {
        if (!config('sms.enabled') && $request->session()->get('otp_verified') === [$request->user()->id, $request->user()->email] && !$request->user()->fresh()->requiresRegistrationVerification()) return redirect()->route(app(\App\Services\DashboardAccess::class)->postLoginRoute($request->user()));
        $data = $request->validate(['code'=>['required','string','regex:/^[0-9]{6}$/']]);
        $error = $verification->verify($request->user(), $data['code'], $request->session()->get('login_otp_challenge'));
        if ($error) return back()->withErrors(['code'=>$error]);
        $request->session()->regenerate();
        $request->session()->put('otp_verified', [$request->user()->id, $request->user()->email]);
        $request->session()->forget('login_otp_challenge');
        if (config('sms.enabled')) {
            $request->session()->put('sms_enrollment_email', [$request->user()->id, $request->user()->email]);
            return app(\App\Services\SmsAuthentication::class)->start($request, $request->user()->fresh());
        }
        return redirect()->route(app(\App\Services\DashboardAccess::class)->postLoginRoute($request->user()))->with('success', 'Welcome, '.$request->user()->name.'! You have signed in successfully.');
    }
}
