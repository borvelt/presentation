<?php

namespace App;

use App\Events\TopicCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Topic extends Model
{
    use Notifiable;

    protected $dispatchesEvents = [
        'created' => TopicCreated::class,
    ];

    protected $fillable = [
        'title', 'description', 'banner', 'is_private', 'user_id',
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return env('TOPICS_CHANNEL_NAME');
    }

}
