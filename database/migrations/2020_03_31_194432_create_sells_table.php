<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('sells', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('buyer_id')->nullable();
			$table->foreign('buyer_id')->references('id')->on('buyers');
			$table->string('amount');
			$table->unsignedInteger('payment_method_id')->nullable();
			$table->foreign('payment_method_id')->references('id')->on('payment_methods');
			$table->unsignedInteger('shipping_id')->nullable();
			$table->foreign('shipping_id')->references('id')->on('shippings');
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
		Schema::dropIfExists('sells');
	}
}
