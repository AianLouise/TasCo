<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HiringFormRejected extends Notification
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
            'subject' => 'Important: Your Hiring Form Status Update',
            'greeting' => 'Hello!',
            'message' => 'We wanted to inform you that unfortunately, the worker has decided not to proceed with your hiring form at this time. If you have any questions or would like more details, we encourage you to try reaching out to the worker directly.',
            'closing' => 'We appreciate your understanding and thank you for using our platform. If you have any questions or need further assistance, feel free to reach out.',
            'image' => 'HiringFormRejected.jpg',
        ];        
    }
}
