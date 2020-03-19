<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sell;
use Faker\Generator as Faker;

$factory->define(Sell::class, function (Faker $faker) {
	return [
		'user_id' => \App\User::all()->random()->id,
		'amount' => $faker->radomFloat(0, 50, 200),
	];
});
