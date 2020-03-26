<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Color;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
	$name = $faker->sentence;
	$cost = $faker->randomFloat(2, 10, 100);
	return [
		'name' => $name,
		'category_id' => \App\Category::all()->random()->id,
		'color_id' => \App\Color::all()->random()->id,
		'keywords' => "{$faker->word}, {$faker->word}, {$faker->word}",
		'short_description' => $faker->sentence,
		'long_description' => $faker->sentence,
		'cost' => $cost,
		'price' => $cost * 2,
		'slug' => str_slug($name, '-'),
		'stock' => $faker->randomFloat(0, 0, 100),
		'picture' => 'product' . $faker->numberBetween(1, 8) . '.png',
	];
});