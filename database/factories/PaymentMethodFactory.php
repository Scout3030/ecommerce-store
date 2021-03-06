<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PaymentMethod;
use Faker\Generator as Faker;

$factory->define(PaymentMethod::class, function (Faker $faker) {
	return [
		'name' => $faker->word,
		'picture' => $faker->word,
		'description' => $faker->sentence,
	];
});
