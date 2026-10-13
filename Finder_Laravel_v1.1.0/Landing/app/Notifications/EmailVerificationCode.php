<?php
namespace App\Notifications;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
class EmailVerificationCode extends Notification
{
    public function __construct(public readonly string $code) {}
    public function via(object $notifiable): array { return ['mail']; }
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)->subject('Verify your Lassana Property email')
            ->greeting('Hello '.$notifiable->name.',')
            ->line('Your email verification code is:')
            ->line($this->code)
            ->line('This code expires in 10 minutes. Do not share it with anyone.')
            ->action('Verify email', route('verification.notice'))
            ->line('If you did not request this code, you can ignore this email.');
    }
}
