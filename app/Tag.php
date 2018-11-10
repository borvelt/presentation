<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'slug',
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Topics()
    {
        return $this->belongsToMany('App\Topic');
    }

}
