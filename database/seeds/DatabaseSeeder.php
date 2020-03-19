<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		Storage::deleteDirectory('products');
		Storage::deleteDirectory('users');

		Storage::makeDirectory('products');
		Storage::makeDirectory('users');

		factory(\App\Role::class, 1)->create(['name' => 'admin']);
		factory(\App\Role::class, 1)->create(['name' => 'user']);

		factory(\App\User::class, 1)->create([
			'name' => 'admin',
			'email' => 'admin@mail.com',
			'password' => bcrypt('secret'),
			'role_id' => \App\Role::ADMIN,
		]);

		factory(\App\User::class, 1)->create([
			'name' => 'user',
			'email' => 'user@mail.com',
			'password' => bcrypt('secret'),
			'role_id' => \App\Role::BUYER,
		]);

		factory(\App\User::class, 25)->create()
			->each(function (\App\User $u) {
				factory(\App\Buyer::class, 1)->create(['user_id' => $u->id]);
			});

		factory(\App\Category::class, 5)->create();

		factory(\App\Color::class, 5)->create();

		factory(\App\Product::class, 50)->create();
	}
}
