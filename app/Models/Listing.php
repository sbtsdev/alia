<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function stays()
    {
         return $this->hasMany('App\Models\Stay');
    }

    public function availabilities()
    {
         return $this->hasMany('App\Models\Availability');
    }
}
