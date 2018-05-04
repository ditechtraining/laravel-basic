<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Task::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'deadline' => $faker->date(),
        'estimated_time' => $faker->numberBetween(1),
        'status' => rand(1, 3)
    ];
});
