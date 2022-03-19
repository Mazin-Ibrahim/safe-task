<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'parent_id' => $faker->randomElement([null,function () {
            return factory('App\Category')->create()->id;
        }])
    ];
});
