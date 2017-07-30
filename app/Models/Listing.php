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


        $matches = $this->whereBetween('latitude',  [$lat - $latDiff, $lat + $latDiff])
            ->whereBetween('longitude',  [$long - $longDiff, $long + $longDiff])
            ->where('beds', '>=', $beds)
            ->where('max_stay_days', '>=', $days)
            ->get()
            ->toArray();
        return $matches;
    }
}
