<?php

namespace App\Notifications;

use App\Notifications\TopicNotifications;

class UpdateTopic extends TopicNotifications
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
            ->subject($topic->title . ' has been updated.')
            ->markdown('mail.topic.updated', compact('topic'));
    }
}
