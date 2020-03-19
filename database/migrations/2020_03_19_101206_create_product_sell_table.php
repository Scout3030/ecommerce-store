<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSellTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('product_sell', function (Blueprint $table) {
			$table->unsignedInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products');
			$table->unsignedInteger('sell_id');
			$table->foreign('sell_id')->references('id')->on('sells');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('product_sell');
	}
}
