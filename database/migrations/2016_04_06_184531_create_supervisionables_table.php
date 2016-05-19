<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisionablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisionables', function (Blueprint $table) {
            $table->integer('supervision_id')->unsigned();
            $table->foreign('supervision_id')->references('id')->on('supervisions');
                $table->integer('supervisionable_id', 50);
                $table->string('supervisionable_type', 10);
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
        Schema::drop('supervisionables');
    }
}
