<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserVerifiedEmployer extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Account Verification')
            ->line('Dear user,')
            ->line('Your application for employer has been approved.')
            ->action('View My Account', url('/home'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'read_at' => null, // Initialize as unread
            'subject' => 'Employer Application Approval',
            'greeting' => 'Hello!',
            'message' => 'Your Employer application has been approved.',
            'closing' => 'Thank you for using our platform.',
            'additional_data' => [
                // Add any other data you want to include here
            ],
        ];
        
    }
}
