<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function actors() {
        return $this->belongsToMany('App\Actor');
    }
    // many to man between the agent and movie
    public function agents() {
        return $this->belongsToMany('App\Agent');
    }
}
