<?php

namespace App\Services;

use App\Contracts\SmsGateway;
use App\Models\User;
use App\Support\SriLankaMobile;
use Carbon\Carbon;
use Illuminate\Support\Facades\{DB, Hash, RateLimiter};

class PhoneVerification
{
    public function __construct(private SmsGateway $gateway) {}

    public function send(User $user, string $challenge, string $ip): ?string
    {
        if (!config('sms.enabled') || $challenge === '') return 'SMS verification is not available.';
        return DB::transaction(function () use ($user, $challenge, $ip) {
            $account = User::lockForUpdate()->findOrFail($user->id);
            if ((int) $account->auth_version !== (int) $user->auth_version || $account->email !== $user->email) return 'Your account has changed. Please sign in again.';
            if (!$account->is_active || !$account->hasVerifiedEmail()) return 'Verify your email before requesting an SMS code.';
            $phone = SriLankaMobile::normalize($account->phone);
            if (!$phone) return 'Add a valid Sri Lankan mobile number to receive your code.';
            $row = DB::table('sms_verification_codes')->where('user_id', $account->id)->first();
            $now = now();
            if ($row && Carbon::parse($row->sent_at)->addMinute()->isAfter($now)) return 'Please wait one minute before requesting another code.';
            $sameWindow = $row && Carbon::parse($row->window_started_at)->addHour()->isAfter($now);
            if ($sameWindow && $row->send_count >= 5) return 'Too many code requests. Please try again in one hour.';
            // Also bound spend across registrations, phone changes and different accounts.
            $limits = ['sms-phone:'.hash('sha256', $phone) => 20, 'sms-ip:'.hash('sha256', $ip) => 30];
            foreach ($limits as $key => $limit) {
                if (RateLimiter::tooManyAttempts($key, $limit)) return 'Too many SMS requests. Please try again in one hour.';
            }
            foreach ($limits as $key => $limit) RateLimiter::hit($key, 3600);
            $code = (string) random_int(100000, 999999);
            DB::table('sms_verification_codes')->updateOrInsert(['user_id' => $account->id], [
                'phone' => $phone, 'code_hash' => Hash::make($challenge.':'.$code),
                'expires_at' => $now->copy()->addMinutes(10), 'attempts' => 0, 'sent_at' => $now,
                'window_started_at' => $sameWindow ? $row->window_started_at : $now,
                'send_count' => $sameWindow ? $row->send_count + 1 : 1,
            ]);
            try {
                $this->gateway->send($phone, "Lassana Property: Your verification code is {$code}. Valid for 10 minutes. Do not share this code.");
            } catch (\Throwable) {
                // Preserve limits on failed/uncertain sends, but make the code unusable.
                DB::table('sms_verification_codes')->where('user_id', $account->id)->update(['expires_at' => $now]);
                return 'We could not send your SMS code. Please wait one minute and try again. If this continues, contact support.';
            }
            return null;
        });
    }

    public function verify(User $user, #[\SensitiveParameter] string $code, string $challenge): ?string
    {
        if (!config('sms.enabled') || $challenge === '') return 'Request a new SMS code.';
        return DB::transaction(function () use ($user, $code, $challenge) {
            $account = User::lockForUpdate()->findOrFail($user->id);
            if ((int) $account->auth_version !== (int) $user->auth_version || $account->email !== $user->email || $account->phone !== $user->phone) return 'Your account has changed. Please sign in again.';
            if (!$account->is_active || !$account->hasVerifiedEmail()) return 'This account cannot be verified.';
            $row = DB::table('sms_verification_codes')->where('user_id', $account->id)->first();
            if (!$row || $row->phone !== SriLankaMobile::normalize($account->phone) || Carbon::parse($row->expires_at)->lessThanOrEqualTo(now())) {
                return 'Your code has expired or is unavailable. Request a new code.';
            }
            if ($row->attempts >= 5) return 'Too many incorrect codes. Request a new code.';
            if (!preg_match('/^[0-9]{6}$/', $code) || !Hash::check($challenge.':'.$code, $row->code_hash)) {
                DB::table('sms_verification_codes')->where('user_id', $account->id)->increment('attempts');
                return $row->attempts >= 4 ? 'Too many incorrect codes. Request a new code.' : 'The SMS code is incorrect.';
            }
            $account->forceFill(['verified_phone' => $row->phone, 'phone_verified_at' => now()])->save();
            // Consume the code, retaining hourly limits even after a successful login.
            DB::table('sms_verification_codes')->where('user_id', $account->id)->update(['expires_at' => now()]);
            return null;
        });
    }
}
