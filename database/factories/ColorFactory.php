<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Color;
use Faker\Generator as Faker;

$factory->define(Color::class, function (Faker $faker) {
	$color = $faker->word;
	return [
		'name' => $color,
		'slug' => str_slug($color, '-'),
	];
});
