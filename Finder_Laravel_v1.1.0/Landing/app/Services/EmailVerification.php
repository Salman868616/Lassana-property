<?php
namespace App\Services;
use App\Models\User;
use App\Notifications\EmailVerificationCode;
use Carbon\Carbon;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class EmailVerification
{
    public function send(User $user, ?string $challenge = null): ?string
    {
        try {
            return DB::transaction(function () use ($user, $challenge) {
                $account = User::lockForUpdate()->findOrFail($user->id);
                if (!$account->is_active || (!$challenge && !$account->requiresRegistrationVerification())) return 'This account does not need a verification code.';
                $row = DB::table('email_verification_codes')->where('user_id', $account->id)->first();
                $now = now();
                if ($row && Carbon::parse($row->sent_at)->addMinute()->isAfter($now)) {
                    return 'Please wait one minute before requesting another code.';
                }
                $sameWindow = $row && Carbon::parse($row->window_started_at)->addHour()->isAfter($now);
                if ($sameWindow && $row->send_count >= 5) return 'Too many code requests. Please try again in one hour.';
                $code = (string) random_int(100000, 999999);
                DB::table('email_verification_codes')->updateOrInsert(['user_id'=>$account->id], [
                    'email'=>$account->email, 'code_hash'=>Hash::make($challenge ? $challenge.':'.$code : $code),
                    'expires_at'=>$now->copy()->addMinutes(10), 'attempts'=>0, 'sent_at'=>$now,
                    'window_started_at'=>$sameWindow ? $row->window_started_at : $now,
                    'send_count'=>$sameWindow ? $row->send_count + 1 : 1,
                ]);
                // Keep issuance serialized with verification and resend requests.
                $account->notify(new EmailVerificationCode($code));
                return null;
            });
        } catch (\Throwable $exception) {
            report($exception);
            return 'We could not send your code. Please try again shortly.';
        }
    }

    public function verify(User $user, string $code, ?string $challenge = null): ?string
    {
        $verified = null;
        $error = DB::transaction(function () use ($user, $code, $challenge, &$verified) {
            $account = User::lockForUpdate()->findOrFail($user->id);
            if (!$account->is_active) return 'This account is not active.';
            if ((!$challenge && !$account->requiresRegistrationVerification())) return null;
            $row = DB::table('email_verification_codes')->where('user_id', $account->id)->first();
            if (!$row || $row->email !== $account->email || Carbon::parse($row->expires_at)->lessThanOrEqualTo(now())) {
                return 'Your code has expired or is unavailable. Request a new code.';
            }
            if ($row->attempts >= 5) return 'Too many incorrect codes. Request a new code.';
            if (!Hash::check($challenge ? $challenge.':'.$code : $code, $row->code_hash)) {
                // Return rather than throw so the failed attempt is committed.
                DB::table('email_verification_codes')->where('user_id', $account->id)->increment('attempts');
                return $row->attempts >= 4 ? 'Too many incorrect codes. Request a new code.' : 'The verification code is incorrect.';
            }
            $wasVerified = $account->hasVerifiedEmail();
            $account->registration_verification_pending = false;
            $account->markEmailAsVerified();
            DB::table('email_verification_codes')->where('user_id', $account->id)->delete();
            $verified = $wasVerified ? null : $account;
            return null;
        });
        if ($verified) event(new Verified($verified));
        return $error;
    }
}
