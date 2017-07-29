<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    protected $table = 'churches';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
