<?php

namespace App\Listeners;

use App\Events\TopicCreated;
use App\Notifications\NewTopic;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationForUsers implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // empty block
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(TopicCreated $event)
    {
        $event->topic->notify(new NewTopic());
        return true;
    }
}
