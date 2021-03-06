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
		factory(\App\Role::class, 1)->create(['name' => 'buyer']);

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
			'email' => 'pedidos@huamachucostore.com',
			'address' => 'Jr. Leoncio Prado 570, Huamachuco',
			'phone' => '+51 969-449655',
		]);

		factory(\App\Shipping::class, 1)->create([
			'name' => 'Gratis',
			'price' => 0.00,
		]);
		factory(\App\Shipping::class, 1)->create([
			'name' => 'Recojo en tienda',
			'price' => 5.00,
		]);
		factory(\App\Shipping::class, 1)->create([
			'name' => 'Huamachuco',
			'price' => 5.00,
		]);
		// factory(\App\Shipping::class, 1)->create([
		// 	'name' => 'Lima Metropolitana',
		// ]);
		// factory(\App\Shipping::class, 1)->create([
		// 	'name' => 'Olva Courier',
		// ]);
		// factory(\App\Shipping::class, 1)->create([
		// 	'name' => 'Agencia de transporte',
		// ]);

		factory(\App\PaymentMethod::class, 1)->create([
			'name' => 'Depósito en cuenta',
		]);
		factory(\App\PaymentMethod::class, 1)->create([
			'name' => 'T. crédito/débito',
		]);
		factory(\App\PaymentMethod::class, 1)->create([
			'name' => 'Yape / Tunki / Lukita',
		]);
		// factory(\App\PaymentMethod::class, 1)->create([
		// 	'name' => 'Mercadopago',
		// ]);
		// factory(\App\PaymentMethod::class, 1)->create([
		// 	'name' => 'PayU',
		// ]);
		// factory(\App\PaymentMethod::class, 1)->create([
		// 	'name' => 'Paypal',
		// ]);

		factory(\App\Coupon::class, 10)->create();
	}
}
