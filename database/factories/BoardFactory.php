<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Board;
use Faker\Generator as Faker;

$factory->define(Board::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 2),
        'content' => $faker->realText(20),
    ];
});
