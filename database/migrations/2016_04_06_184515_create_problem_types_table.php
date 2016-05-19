<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProblemTypesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('problem_types', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 80);

			$table->string('typology_id', 50)->unsigned();
			$table->foreign('typology_id')->references('id')->on('typologies');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('problem_types');
	}
}
