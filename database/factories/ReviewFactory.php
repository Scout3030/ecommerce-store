<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
	return [
		'product_id' => \App\Product::all()->random()->id,
		'rating' => $faker->randomFloat(2, 1, 5),
	];
});
