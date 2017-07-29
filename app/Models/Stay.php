<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stay extends Model
{
    public function stayer()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function listing()
    {
        return $this->belongsTo('App\Models\Listing');
    }
}
