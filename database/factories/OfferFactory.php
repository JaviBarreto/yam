<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Offer;

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

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'status' => $faker->boolean,
        'startdatetime' => $faker->dateTime('now'), 
        'enddatetime' => $faker->dateTimeBetween('now', '1 months'),
        'product_id' => $faker->numberBetween(1,20)
    ];
});
