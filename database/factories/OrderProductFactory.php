<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use Faker\Generator as Faker;
use App\Models\OrderProduct;

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

$factory->define(OrderProduct::class, function (Faker $faker) {
        
    return [
        'product_id' => $faker->numberBetween(1, 20),
        'quantity' => $faker->numberBetween(1, 100),
        'price' => $faker->numberBetween(1, 200),
        'delivery' => $faker->numberBetween(5, 20),
        'total' => $faker->numberBetween(20, 500),
        'order_id' => $faker->numberBetween(1, 20),
        'comment' => $faker->word
    ];
});
