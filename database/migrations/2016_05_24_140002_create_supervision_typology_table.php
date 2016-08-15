<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisionTypologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervision_typology', function (Blueprint $table) {
                $table->integer('supervision_id')->unsigned();
                $table->integer('typology_id')->unsigned();

                $table->foreign('supervision_id')->references('id')->on('supervisions');

                $table->foreign('typology_id')->references('id')->on('typologies');
                $table->timestamps();
        });

        Schema::create('request_supervision', function (Blueprint $table) {
                $table->bigInteger('request_id')->unsigned();
                $table->integer('supervision_id')->unsigned();

                $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
                $table->foreign('supervision_id')->references('id')->on('supervisions');
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
        Schema::drop('request_supervision');
        Schema::drop('supervision_typology');
    }
}
