<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
	return [
		'name' => $faker->word,
		'value' => $faker->randomFloat(2, 0, 1),
	];
});
