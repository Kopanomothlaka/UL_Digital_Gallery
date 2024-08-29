<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Video;
use App\Models\User;

class UserVideoMentioned extends Notification implements ShouldQueue
{
    use Queueable;

    protected $mentionedUser;
    protected $video;

    /**
     * Create a new notification instance.
     *
     * @param User $mentionedUser
     * @param Video $video
     */
    public function __construct(User $mentionedUser, Video $video)
    {
        $this->mentionedUser = $mentionedUser;
        $this->video = $video;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database']; // You can add other channels if needed
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('You were mentioned in a video')
            ->line('Hello ' . $this->mentionedUser->name . ',')
            ->line('You were mentioned in a video on UL Digital Gallery:')
            ->line('Video Title: ' . $this->video->title)
            ->action('View Video', route('videos', ['id' => $this->video->id]));
    }

    /**
     * Get the array representation of the notification for database.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'video_id' => $this->video->id,
            'user_id' => $this->mentionedUser->id,
            'message' => 'You were mentioned in a video: ' . $this->video->title,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'video_id' => $this->video->id,
            'user_id' => $this->mentionedUser->id,
            'message' => 'You were mentioned in a video: ' . $this->video->title,
        ];
    }
}
