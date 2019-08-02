<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Todo;
use App\User;
use Faker\Generator as Faker;


$factory->define(Todo::class, function (Faker $faker) {
    return [
        'name' => $faker->text(80),
        'description' => $faker->realText(150),
        'status_id' => rand ( 1, 2),
        'user_id' => User::all()->random()->id,
    ];
});
