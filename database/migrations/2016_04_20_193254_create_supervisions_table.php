<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisions', function (Blueprint $table) {
            $table->increments('id');
                $table->string('name', 50);
                $table->string('phone', 10);
                $table->string('extension', 40);

                //$table->string('user_id')->unsigned();
                //$table->foreign('user_id')->references('id')->on('users');

                $table->string('supervision_id')->unsigned();
                $table->foreign('supervision_id')->references('id')->on('supervicionables');



            $table->timestamps();
        });
        Schema::create('request_supervision', function (Blueprint $table) {
                $table->integer('request_id')->unsigned();
                $table->integer('supervision_id')->unsigned();

                $table->foreign('request_id')->references('id')->on('requests');
                $table->foreign('supervision_id')->references('id')->on('supervisions');

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('supervisions');
        Schema::drop('request_supervision');
        Schema::drop('supervisions');
    }
}
