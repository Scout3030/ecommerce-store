<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpinionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('opinions', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedInteger('user_id')->nullable();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('comment');
			$table->enum('status', [
				\App\Opinion::UNPUBLISHED, \App\Opinion::PUBLISHED,
			])->default(\App\Opinion::UNPUBLISHED);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('opinions');
	}
}
