<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Template;
use Faker\Generator as Faker;

$factory->define(Template::class, function (Faker $faker) {
	return [
		'address' => $faker->address,
		'phone' => $faker->phoneNumber,
		'email' => $faker->email,
	];
});
