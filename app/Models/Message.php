<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function from_user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function to_user()
    {
        return $this->belongsTo('App\Models\User', 'to_user_id');
    }

    public function listing()
    {
        return $this->belongsTo('App\Models\Listing', 'from_user_id');
    }
}
