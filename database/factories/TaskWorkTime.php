<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\TaskWorkTime::class, function (Faker $faker) {
    return [
        'worked_in' => $faker->date(),
        'time' => $faker->numberBetween(1)
    ];
});
