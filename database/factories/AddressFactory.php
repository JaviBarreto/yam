<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Address;

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

$factory->define(Address::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,3),
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'name' => $faker->streetName,
        'fieldstreetaddress' => $faker->streetAddress,
        'floorno' => $faker->numberBetween(1,30),
        'houseno' => $faker->numberBetween(50,1000),
        'zipcode' => $faker->postcode,
        'city' => $faker->city,
        'state' => $faker->state,
        'isDefault' => $faker->boolean,
        'buildingtype' => $faker->randomElement($array = array ('Departamento','Casa','Oficina')),
        'district' => $faker->cityPrefix
    ];
});
