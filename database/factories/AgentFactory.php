<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Agent;
use Faker\Generator as Faker;

$factory->define(Agent::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birthday' => $faker->date($format='Y-m-d', $max='1990-01-01'),
        'country' => $faker->country,
    ];
});
