<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Store;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Store::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'address' => $faker->address,
        'streetaddress' => $faker->streetAddress,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'zipcode' => $faker->postcode ,
        'city' => $faker->city,
        'state' => $faker->state,
        'phonenumber' => $faker->phoneNumber,
        'email' => $faker->email,
        'admincontact' => $faker->name,
        'restaurant_id' => $faker->numberBetween(1,3)
    ];
});
