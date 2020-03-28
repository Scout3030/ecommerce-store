<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmailSubscription;
use Faker\Generator as Faker;

$factory->define(EmailSubscription::class, function (Faker $faker) {
	return [
		'email' => $faker->safeEmail,
	];
});
