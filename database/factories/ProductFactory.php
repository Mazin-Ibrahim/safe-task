<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' =>  $faker->name,
        'price' => $faker->numberBetween(100, 1000),
        'description' => $faker->sentence,
        'company_id' => function () {
            return factory('App\Company')->create()->id;
        }
    ];
});
