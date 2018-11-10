<?php

namespace App\Events;

use App\Topic;
// use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
// use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TopicCreated/*implements ShouldBroadcast*/
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $topic;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    // public function broadcastOn()
    // {
    //     return new Channel(env('TOPICS_CHANNEL_NAME'));
    // }
}
