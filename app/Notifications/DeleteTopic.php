<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeleteTopic extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $topic
     * @return array
     */
    public function via($topic)
    {
        return ['database', 'broadcast', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $topic
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($topic)
    {
        return (new MailMessage)
            ->subject($topic->title . "Has been removed.")
            ->markdown('mail.topic.deleted', compact('topic'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $topic
     * @return array
     */
    public function toArray($topic)
    {
        return [
            'id' => $topic->id,
            'title' => $topic->title,
            'description' => $topic->description,
        ];
    }

    public function toDatabase($topic)
    {
        return $this->toArray($topic);
    }

    public function toBroadcast($topic)
    {
        return (new BroadcastMessage($this->toArray($topic)))
            ->onQueue(env('BROADCAST_QUEUE'));
    }
}
