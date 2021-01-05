<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Product;

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

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1),       
        'imagename' => 'img_product/'.$faker->image(storage_path('app/public/img_product'),500,500, null, false),
        'category_id' => $faker->numberBetween(1,20),
        'store_id' => $faker->numberBetween(1,20),
        'price' => $faker->numberBetween(1,500),
        'calories' => $faker->numberBetween(50,300),
        'remarks' => $faker->sentence(2,true),
        'weight' => $faker->numberBetween(50,300),
        'isonlycompliment' => $faker->boolean,
        'status' => $faker->boolean,
    ];
});
