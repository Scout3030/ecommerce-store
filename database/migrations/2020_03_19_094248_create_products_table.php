<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->unsignedInteger('category_id');
			$table->foreign('category_id')->references('id')->on('categories');
			$table->unsignedInteger('color_id')->nullable();
			$table->foreign('color_id')->references('id')->on('colors');
			$table->string('keywords')->nullable();
			$table->string('short_description')->nullable();
			$table->string('long_description')->nullable();
			$table->string('picture')->nullable();
			$table->float('cost', 8, 2);
			$table->float('price', 8, 2);
			$table->integer('stock');
			$table->string('slug');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('products');
	}
}
