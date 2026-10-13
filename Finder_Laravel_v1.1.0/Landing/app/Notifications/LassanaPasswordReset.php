<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class LassanaPasswordReset extends ResetPassword
{
    protected function buildMailMessage($url)
    {
        $minutes = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        return (new MailMessage)
            ->subject('Reset your Lassana Property password')
            ->greeting('Hello!')
            ->line('We received a request to reset your Lassana Property password.')
            ->action('Reset password', $url)
            ->line("This link expires in {$minutes} minutes and can only be used once.")
            ->line('If you did not request this, you can ignore this email.')
            ->salutation('Lassana Property');
    }
}