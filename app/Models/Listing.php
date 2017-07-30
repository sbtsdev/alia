<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    public static $types = [
        'Apartment' => 'Apartment',
        'full_apartment' => 'Full Apartment',
        'attached_apartment' => 'Attached Apartment',
        'full_house' => 'Full House',
        'single_room' => 'Room(s)',
        'bed' => 'Bed',
        'house' => 'House'
    ];

    protected $appends = [
        'kid_icon',
        'pet_icon',
        'listing_type'
    ];

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

    public function images()
    {
        return $this->hasMany('App\Models\ListingImage')->orderBy('order', 'asc');
    }

    public function filter($request)
    {
        //1 degree in latiude is ~69 miles
        $latDiff = 0.44;  // 30 miles
        //1 degree longitude is ~55 miles
        $longDiff = 0.55;
        //hypoteneuse is about 42 miles this way

        $filterData = $request->input('filter');
        $lat = $filterData['lat'];
        $long = $filterData['lng'];
        $beds = $filterData['beds'];
        $days = $filterData['nights'];

        $matches = $this->with('images')
            ->whereBetween('latitude',  [$lat - $latDiff, $lat + $latDiff])
            ->whereBetween('longitude',  [$long - $longDiff, $long + $longDiff])
            ->where('beds', '>=', $beds)
            ->where('max_stay_days', '>=', $days)
            ->get()
            ->toArray();

        return $matches;
    }

    public function getKidiconAttribute()
    {
        return $this->kid_friendly ? 'fa fa-check text-success' : 'fa fa-close text-danger';
    }

    public function getPeticonAttribute()
    {
        return $this->pet_friendly ? 'fa fa-check text-success' : 'fa fa-close text-danger';
    }

    public function getListingtypeAttribute()
    {
        return Listing::$types[$this->type];
    }

    public static function getTypes()
    {
        return Listing::$types;
    }

    public function getRequestedStays()
    {
        return $this->stays()->where('status', 'Requested');
    }
}
