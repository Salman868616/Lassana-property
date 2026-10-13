<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\LassanaPasswordReset;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    public function request()
    {
        return view('account.auth.account-password-recovery');
    }

    public function email(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'channel' => ['sometimes', 'in:email'],
            'phone' => ['prohibited'],
        ]);
        Password::sendResetLink(['email' => $data['email'], 'is_active' => true], function (User $user, string $token) {
            $user->notify(new LassanaPasswordReset($token));
        });

        // Use the same message for unknown, suspended, and throttled accounts.
        return redirect()->route('account-password-recovery')
            ->with('status', 'A reset link will be sent. Check your inbox or spam folder.');
    }

    public function edit(Request $request, string $token)
    {
        $email = is_string($request->query('email')) ? $request->query('email') : '';
        if ($request->has('u')) {
            return redirect()->route('account-password-recovery')
                ->withErrors(['email' => 'Please request a new password reset link using your email address.'])
                ->header('Referrer-Policy', 'no-referrer')->header('Cache-Control', 'no-store');
        }
        return response()->view('account.auth.account-password-reset', [
            'token' => $token,
            'email' => $email,
        ])->header('Referrer-Policy', 'no-referrer')->header('Cache-Control', 'no-store');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'token' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $resetUser = null;
        $status = DB::transaction(function () use ($data, &$resetUser) {
            // Serialize resets for this account, including token consumption.
            $account = User::where('email', $data['email'])->lockForUpdate()->first();
            if (! $account || ! $account->is_active) {
                return Password::INVALID_TOKEN;
            }

            return Password::reset($data + ['is_active' => true], function (User $user, string $password) use (&$resetUser) {
                $user->password = Hash::make($password);
                $user->remember_token = null;
                $user->auth_version = (int) $user->auth_version + 1;
                $user->save();
                $resetUser = $user;
            });
        });

        if ($status !== Password::PASSWORD_RESET) {
            return back()->withInput($request->only('email'))->withErrors([
                'email' => 'This reset link is invalid or has expired. Please request a new link.',
            ]);
        }

        event(new PasswordReset($resetUser));
        return redirect()->route('account-signin')->with('status', 'Your password has been reset. Sign in with your new password.');
    }
}
