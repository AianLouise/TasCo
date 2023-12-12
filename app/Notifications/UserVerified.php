<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserVerified extends Notification
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
        return [ 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Account Verification')
        ->line('Dear user,')
        ->line('Your job seeker application has been approved.')
        ->action('Visit Website', url('/'))
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
            'subject' => 'Exciting News: Your Job Seeker Application is Approved!',
            'greeting' => 'Hello!',
            'message' => 'Congratulations! We\'re thrilled to inform you that your Job Seeker application has been approved. Welcome to our platform!',
            'closing' => 'Thank you for choosing us. If you have any questions or need assistance, feel free to reach out.',
            'image' => 'UserVerified.jpg',
        ];
        
        
    }
}
