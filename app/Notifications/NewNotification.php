<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewNotification extends Notification implements ShouldQueue
{

    use Queueable;

    /**
     * @var string
     */
    public string $notification;

    /**
     * Create a new notification instance.
     *
     * @param string $notification
     */
    public function __construct(string $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject('Notification')
            ->line($this->notification)
//            ->action('Notifications', route(Helper::getRoute('notifications')->route))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            'data' => $this->notification,
            'icon' => 'icon-bell',
            'bg' => 'bg-warning'
        ];
    }
}
