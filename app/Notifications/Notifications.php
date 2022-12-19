<?php

namespace App\Notifications;

use App\Models\Likes;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Notifications extends Notification implements ShouldQueue
{
    use Queueable;

    private $likes;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Likes $likes)
    {
        $this->likes = $likes;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line("Seu post foi curtido")
                    ->action('Ver post', url('/post'))
                    ->line('Obrigado por usar o Forum!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'like' => $this->likes->load('user'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'like' => $this->likes->load('user'),
            ]
        ];
    }
}
