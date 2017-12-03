<?php

use Faker\Generator as Faker;

$factory->define(App\Visit::class, function (Faker $faker) {
    return [
        'client_id' => $faker->randomDigitNotNull,
        'counselor_id' => $faker->randomDigitNotNull,
        'date' => $faker->date,
        'request' => $faker->paragraph,
        'action' => $faker->paragraph,
    ];
});
