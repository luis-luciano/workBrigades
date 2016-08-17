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
            
            $table->string('email', 80)->nullable();

            $table->bigInteger('personal_information_id')->unsigned()->index()->nullable();
            $table->foreign('personal_information_id')->references('id')->on('personal_informations');

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
        Schema::drop('citizens');
    }
}
