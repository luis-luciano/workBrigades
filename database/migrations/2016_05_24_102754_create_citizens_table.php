<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('citizens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 80);
            $table->string('address', 150);
            $table->string('email', 80);

            $table->integer('personal_information_id')->unsigned();
            $table->foreign('personal_information_id')->references('id')->on('personal_informations');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('citizens');
    }
}
