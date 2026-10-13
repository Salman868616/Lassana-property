<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAccountActive
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()) {
            $account = User::find($request->user()->id);
            // Remember tokens are cleared whenever access changes. A valid new
            // remember cookie may start a fresh session after a later login.
            if ($account?->is_active && Auth::viaRemember()) {
                $request->session()->put('auth_version', (int) $account->auth_version);
            }
            $version = (int) $request->session()->get('auth_version', 0);
            if (! $account || ! $account->is_active || $version !== (int) $account->auth_version) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('account-signin')->withErrors([
                    'email'=>'Your account access has changed. Please sign in again or contact an administrator.',
                ]);
            }
        }
        return $next($request);
    }
}
