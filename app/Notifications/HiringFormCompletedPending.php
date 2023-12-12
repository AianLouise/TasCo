<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HiringFormCompletedPending extends Notification
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
            'read_at' => null,
            'subject' => 'Exciting News: Hiring Form Progress!',
            'greeting' => 'Hi there!',
            'message' => 'We wanted to share the good news that your hiring form is making progress! 🚀 It\'s now in the "Completed (Pending)" status. If everything looks good, including payment confirmation, you can mark it as complete to finalize the process.',
            'closing' => 'Thanks for being a part of our platform!',
            'additional_data' => [],
        ];        
    }
}
