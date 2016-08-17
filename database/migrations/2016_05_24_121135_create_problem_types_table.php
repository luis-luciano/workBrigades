<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('problems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 80);

            $table->integer('typology_id')->unsigned()->nullable();
            $table->foreign('typology_id')->references('id')->on('typologies');

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
        Schema::drop('problems');
    }
}
