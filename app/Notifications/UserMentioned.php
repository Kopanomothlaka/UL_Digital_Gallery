<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Post;
use App\Models\User;

class UserMentioned extends Notification
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('You were mentioned in a post')
            ->line('Hello ' . $this->mentionedUser->name . ',')
            ->line('You were mentioned in a post on UL Digital Gallery:')
            ->line($this->post->text)
            ->action('View Post', url('/posts/' . $this->post->id));
    }

    public function toDatabase($notifiable)
    {
        return [
            'post_id' => $this->post->id,
            'user_id' => $this->mentionedUser->id,
            // Add other data as needed
        ];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
