<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use BeyondCode\SlackNotificationChannel\Messages\SlackMessage;

class SlackTaskNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Message title to be sent.
     *
     * @var string
     */
    protected $title;

    /**
     * Message body to be sent.
     *
     * @var string
     */
    protected $message;

    /**
     * Slack channel to send the message to.
     *
     * @var string
     */
    protected $channel;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $title, string $message, $channel = 'general')
    {
        $this->title = $title;
        $this->message = $message;
        $this->channel = $channel;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the plain content of the job.
     *
     * @return string
     */
    public function plainContent(): string
    {
        return "{$this->title}\n\n{$this->message}";
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->to("#{$this->channel}")
            ->success()
            ->content($this->plainContent());
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => $this->title,
            'message' => $this->message
        ];
    }
}
