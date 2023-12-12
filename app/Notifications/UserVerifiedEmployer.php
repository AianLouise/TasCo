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
            'subject' => 'Congratulations! Your Employer Application is Approved',
            'greeting' => 'Hi there!',
            'message' => 'We are excited to inform you that your Employer application has been approved. Welcome to our platform! 🎉',
            'closing' => 'Thank you for choosing our platform. We look forward to your contributions!',
            'image' => 'UserVerifiedEmployer.jpg',
        ];        
        
    }
}
