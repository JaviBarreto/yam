<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Order;
use Carbon\Carbon;

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

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,3),
        'address_id' => $faker->numberBetween(1,20),
        'starttime' => $faker->time('H:i:s','now'),
        'endtime' => $faker->time('H:i:s','now'),
        'store_id' => $faker->numberBetween(1,20),
        'orderstatus' => $faker->randomElement($array = array ('cart','placed','shipping','delivered','cancelled','refund')),
        'ordertype' => $faker->randomElement($array = array ('home','pickup')),
        'paymentmethod' => $faker->randomElement($array = array ('cash','card')),
        'orderdate' => Carbon::now()
    ];
});
