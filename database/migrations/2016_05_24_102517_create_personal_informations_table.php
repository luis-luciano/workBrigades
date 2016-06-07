<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('personal_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 80);
            $table->string('paternal_surname', 80);
            $table->string('maternal_surname', 80);
            $table->char('sex', 1);
            $table->date('birthday')->nullable();
            $table->string('represent', 80);
            $table->string('house_phone', 10);
            $table->string('mobile_phone', 10);
            //$table->string('fax', 50);
            $table->string('street', 80);
            $table->string('number', 50);
            $table->string('interior', 50);
            $table->string('profession', 80);

            $table->integer('colony_id')->unsigned();
            $table->foreign('colony_id')->references('id')->on('colonies');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('personal_informations');
    }
}
