<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\ProductComplement;

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

$factory->define(ProductComplement::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1,20),
        'complement_id' => $faker->numberBetween(1,20),
        'ismendatory' => $faker->boolean,
        'multiselect' => $faker->boolean
    ];
});
