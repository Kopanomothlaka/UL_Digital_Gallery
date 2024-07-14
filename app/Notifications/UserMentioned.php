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

    protected $mentionedUser;
    protected $post;

    /**
     * Create a new notification instance.
     *
     * @param User $mentionedUser
     * @param Post $post
     */
    public function __construct(User $mentionedUser, Post $post)
    {
        $this->mentionedUser = $mentionedUser;
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Extract mentions from the post text
        preg_match_all('/@([\w\s]+)/', $this->post->text, $matches);

        // Check if any mentions were found
        if (!empty($matches[1])) {
            // Find users based on usernames
            $mentionedUsers = User::whereIn('name', $matches[1])->get();

            // Notify each mentioned user
            foreach ($mentionedUsers as $user) {
                if ($user->id === $this->mentionedUser->id) {
                    return (new MailMessage)
                        ->subject('You were mentioned in a post')
                        ->line('Hello ' . $user->name . ',')
                        ->line('You were mentioned in a post on UL Digital Gallery:')
                        ->line($this->post->text)
                        ->action('View Post', route('pictures', ['id' => $this->post->id]));
                }
            }
        }

        return (new MailMessage)
            ->subject('You were mentioned in a post')
            ->line('Hello ' . $this->mentionedUser->name . ',')
            ->line('You were mentioned in a post on UL Digital Gallery:')
            ->line($this->post->text)
            ->action('View Post', route('pictures', ['id' => $this->post->id]));
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
