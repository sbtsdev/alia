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

$factory->define(App\Models\Churches::class, function (Faker\Generator $faker) {
   $user_ids = \DB::table('users')->select('id')->get();
   $user_id = $faker->randomElement($user_ids)->id;

    return [
        'user_id' => $user_id,
        'phone' => $faker->cellNumber,
        'name' => $faker->company,
        'email' => $faker->unique()->safeEmail
    ];
});
