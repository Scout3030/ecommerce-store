<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shipping;
use Faker\Generator as Faker;

$factory->define(Shipping::class, function (Faker $faker) {
	return [
		'name' => $faker->word,
		'description' => $faker->sentence,
		'price' => 5,
	];
});
