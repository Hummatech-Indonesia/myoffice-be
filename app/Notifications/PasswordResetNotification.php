<?php


namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordResetNotification extends Notification
{
    public string $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset Password')
            ->line('Klik tombol di bawah ini untuk reset password Anda:')
            ->action('Reset Password', url("/reset-password/{$this->token}?email=" . urlencode($notifiable->email)))
            ->line('Jika Anda tidak meminta reset, abaikan email ini.');
    }
}
