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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
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


$factory->define(App\Models\Listing::class, function (Faker\Generator $faker) {
    $user_ids = \DB::table('users')->select('id')->get()->toArray();
    $user_id = $faker->randomElement($user_ids)->id;
    $types = ['full_apartment', 'full_house', 'single_room', 'attached_apartment', 'bed'];

    return [
        'user_id' => $user_id,
        'name' => $faker->company . " House/Apartment",
        'description' => "listing description " . $faker->sentence($nbWords = 6, $variableNbWords = true),
        'type' =>  $types[array_rand($types)],
        'street1' => $faker->streetAddress,
        'street2' => "Apt. " . $faker->buildingNumber,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip' => $faker->postcode,
        'kid_friendly' => $faker->boolean(50),
        'pet_friendly' => $faker->boolean(50),
        'max_stay_days' => rand(1,365),
        'beds' => rand(1,10)
    ];
});

