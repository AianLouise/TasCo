<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobSeekerApplicationRejected extends Notification
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
            ->subject('Application Rejected Notification')
            ->line('Dear User,')
            ->line('We regret to inform you that your recent application for Job Seeker role has been rejected. Please contact us for more information')
            ->line('Thank you for considering our organization.')
            ->action('Visit Our Website', url('/'))
            ->line('Best Regards,')
            ->line(config('app.name'));
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
            'subject' => 'Important Update: Your Job Seeker Application',
            'greeting' => 'Hello!',
            'message' => 'We regret to inform you that your Job Seeker application has been rejected. We appreciate your interest and thank you for considering our platform. Please check the provided requirements and consider reapplying.',
            'closing' => 'If you have any questions or would like feedback, feel free to reach out. Thank you.',
            'image' => 'JobSeekerApplicationRejected.jpg',
        ];
        
        
    }
}
