<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Car;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'brand' => $faker->word,
        'model' => $faker->word,
        'year' => $faker->numberBetween($min = 1955, $max = 2020),
        'maxSpeed' => $faker->numberBetween($min = 120, $max = 240),
        'isAutomatic' => $faker->boolean,
        'engine' => $faker->word,
        'numberOfDoors' => $faker->numberBetween($min = 3, $max = 5)
    ];
});
