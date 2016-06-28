<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorBrigadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector_brigade', function (Blueprint $table) {
            $table->integer('sector_id')->unsigned()->index();
            $table->integer('brigade_id')->unsigned()->index();

            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->foreign('brigade_id')->references('id')->on('brigades');

            $table->primary(['sector_id','brigade_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sector_brigade');
    }
}