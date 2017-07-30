<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

function modelFactoryStartEndDates($faker, $maxDiff  = 180 )
{

    //following lines calculate start and end days
   $rand_days = rand(1,180);

    $pos_neg = rand(0,1) ? 'sub': 'add';

    $date = new DateTime(date('Y-m-d'));
    $date->$pos_neg(new DateInterval('P' . $rand_days . 'D'));
    $start_date = $date->format('Y-m-d');

    $stay_days = rand(1,$maxDiff);

    $endDateObj = \DateTime::createFromFormat('Y-m-d', $start_date);
    $endDateObj->add(new DateInterval('P' . $stay_days . 'D'));
    $end_date = $endDateObj->format('Y-m-d');
    return compact('start_date', 'end_date');


}

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'image' => 'https://placeimg.com/640/480/people',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Church::class, function (Faker\Generator $faker) {
    $user_ids = \DB::table('users')->select('id')->get()->toArray();
    $user_id = $faker->randomElement($user_ids)->id;

    return [
        'user_id' => $user_id,
        'phone' => $faker->e164PhoneNumber,
        'name' => $faker->company . " Church",
        'email' => $faker->unique()->safeEmail
    ];
});

function drand($low, $high)
{
return mt_rand($low*1000, $high*1000) / 10000;
}

$factory->define(App\Models\Listing::class, function (Faker\Generator $faker) {
    $user_ids = \DB::table('users')->select('id')->get()->toArray();
    $user_id = $faker->randomElement($user_ids)->id;
    $types = ['full_apartment', 'full_house', 'single_room', 'attached_apartment', 'bed'];

    $lat = 37.5 + drand(0,10);
    $long = -84.5 + drand(0,10);
        //'state' => $faker->state,
    return [
        'user_id' => $user_id,
        'name' => $faker->company . " House/Apartment",
        'description' => "listing description " . $faker->sentence($nbWords = 6, $variableNbWords = true),
        'type' =>  $types[array_rand($types)],
        'street1' => $faker->streetAddress,
        'street2' => "Apt. " . $faker->buildingNumber,
        'neighborhood' => $faker->city,
        'city' => $faker->city,
        'state' => 'KY',
        'zip' => $faker->postcode,
        'latitude' => $lat,
        'longitude' => $long,
        'kid_friendly' => $faker->boolean(50),
        'pet_friendly' => $faker->boolean(50),
        'max_stay_days' => rand(1,365),
        'beds' => rand(1,10)
    ];
});

$factory->define(App\Models\Stay::class, function (Faker\Generator $faker) {
    $listing_ids = \DB::table('listings')->select('id')->get()->toArray();
    $listing_id = $faker->randomElement($listing_ids)->id;
    $listing = \App\Models\Listing::find($listing_id);
    $listing_max_day = $listing->max_stay_days;

    $stayer_ids = \DB::table('users')->select('id')->get()->toArray();
    $stayer_id = $faker->randomElement($stayer_ids)->id;

    $dates = modelFactoryStartEndDates($faker, $listing_max_day);
    $start_date = $dates['start_date'];
    $end_date = $dates['end_date'];

    $statuses = ['requested', 'accepted', 'denied', 'canceled', 'past', 'missed', 'complete'];
    $status = $statuses[array_rand($statuses)];
    return [
        'stayer_id' => $stayer_id,
        'listing_id' => $listing_id,
        'status' => $status,
        'start_date' => $start_date,
        'end_date' => $end_date,
    ];
});


$factory->define(App\Models\Availability::class, function (Faker\Generator $faker) {
    $listing_ids = \DB::table('listings')->select('id')->get()->toArray();
    $listing_id = $faker->randomElement($listing_ids)->id;
    $dates = modelFactoryStartEndDates($faker);
    return [
        'listing_id' => $listing_id,
        'start_date' => $dates['start_date'],
        'end_date' => $dates['end_date'],
    ];
});


$factory->define(App\Models\Message::class, function (Faker\Generator $faker) {

    //one of two users needs to have the listing associated with them
    $users = \App\Models\User::has('listings')->get(['id'])->toArray();
    $user = $users[array_rand($users)];
    $listing_user_id = $user['id'];

    $listing_user = rand(0, 1) ? 'from_user_id' : 'to_user_id';
    $user_ids = \DB::table('users')->select('id')->get()->toArray();
    if ($listing_user == 'from_user_id') {
        $from_user_id = $listing_user_id;
        $to_user_id = $faker->randomElement($user_ids)->id;
    } else {
        $to_user_id = $listing_user_id;
        $from_user_id = $faker->randomElement($user_ids)->id;
    }

    $listing_ids = \DB::table('listings')
        ->select('id')
        ->where('user_id', $listing_user_id)
        ->get()
        ->toArray();
    $listing_id = $faker->randomElement($listing_ids)->id;

    return [
        'to_user_id' => $to_user_id,
        'from_user_id' => $from_user_id,
        'listing_id' => $listing_id,
        'subject' => $faker->sentence($nbWords = 8, $variableNbWords = true),
        'text' => $faker->realText($maxNbChars = 500, $indexSize = 2)
    ];
});

$factory->define(App\Models\ListingImage::class, function (Faker\Generator $faker) {
    $listing_ids = \DB::table('listings')->select('id')->get()->toArray();
    $listing_id = $faker->randomElement($listing_ids)->id;

    return [
        'listing_id' => $listing_id,
        'order' => rand(0,10),
        'path' => "https://placeimg.com/640/480/arch"
    ];
});
