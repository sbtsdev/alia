<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingImage extends Model
{
    protected $table = 'listing_images';

    public function user()
    {
        return $this->belongsTo('App\Models\ListingImage');
    }
}
