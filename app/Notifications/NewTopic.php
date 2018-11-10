<?php

namespace App\Notifications;

use App\Notifications\TopicNotifications;

class NewTopic extends TopicNotifications
{

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $topic
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($topic)
    {
        return (new MailMessage)
            ->subject('New Topic Created.')
            ->markdown('mail.topic.created', compact('topic'));
    }
}
