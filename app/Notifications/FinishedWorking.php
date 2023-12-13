<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FinishedWorking extends Notification
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
            'subject' => 'Project Completion Update',
            'greeting' => 'Hello!',
            'message' => 'We\'re delighted to inform you that the worker has successfully completed your project. Please check your dashboard to review the results. If everything looks good, feel free to mark the project as complete. If you have any questions or need further assistance, we\'re here to help!',
            'closing' => 'Thank you for choosing our platform. We appreciate your business!',
            'image' => 'FinishedWorking.jpg',
        ];
        
        
    }
}
