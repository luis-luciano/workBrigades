<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypologyBrigadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typology_brigade', function (Blueprint $table) {
            $table->integer('typology_id')->unsigned()->index();
            $table->integer('brigade_id')->unsigned()->index();

            $table->foreign('typology_id')->references('id')->on('typologies');
            $table->foreign('brigade_id')->references('id')->on('brigades');

            $table->primary(['typology_id','brigade_id']);
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
        Schema::drop('typology_brigade');
    }
}
