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

                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');

                $table->integer('supervisions_id')->unsigned()->nullable();
                $table->foreign('supervisions_id')->references('id')->on('supervisions');
                $table->timestamps();
        });
        Schema::create('supervision_user', function (Blueprint $table) {
                $table->integer('user_id')->unsigned();
                $table->integer('supervision_id')->unsigned();

                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('supervision_id')->references('id')->on('supervisions');

            });

        Schema::create('supervisionables', function (Blueprint $table) {
            $table->integer('supervision_id')->unsigned()->index();

            $table->morphs('supervisionable');

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
       Schema::drop('supervisionables');
        Schema::drop('supervision_user');
        Schema::drop('supervisions');
    }
}
