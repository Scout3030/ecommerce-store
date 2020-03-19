<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerSellTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('buyer_sell', function (Blueprint $table) {
			$table->unsignedInteger('sell_id');
			$table->foreign('sell_id')->references('id')->on('sells');
			$table->unsignedInteger('buyer_id');
			$table->foreign('buyer_id')->references('id')->on('buyers');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('buyer_sell');
	}
}
