<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		// Storage::deleteDirectory('products');
		// Storage::makeDirectory('categories');
		// Storage::deleteDirectory('users');

		// Storage::makeDirectory('products');
		// Storage::makeDirectory('categories');
		// Storage::makeDirectory('users');

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

		factory(\App\Template::class, 1)->create([
			'email' => 'contact@mail.com',
			'address' => 'My address',
			'phone' => '+51 987-644223',
		]);

		factory(\App\Shipping::class, 1)->create([
			'name' => 'Gratis',
		]);
		factory(\App\Shipping::class, 1)->create([
			'name' => 'Recojo en tienda',
		]);
		factory(\App\Shipping::class, 1)->create([
			'name' => 'Lima Metropolitana',
		]);
		factory(\App\Shipping::class, 1)->create([
			'name' => 'Olva Courier',
		]);
		factory(\App\Shipping::class, 1)->create([
			'name' => 'Agencia de transporte',
		]);

		factory(\App\PaymentMethod::class, 1)->create([
			'name' => 'Depósito en cuenta',
		]);
		factory(\App\PaymentMethod::class, 1)->create([
			'name' => 'Mercadopago',
		]);
		factory(\App\PaymentMethod::class, 1)->create([
			'name' => 'PayU',
		]);
		factory(\App\PaymentMethod::class, 1)->create([
			'name' => 'Paypal',
		]);

		factory(\App\Coupon::class, 10)->create();
	}
}
