<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrigadeSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brigade_sector', function (Blueprint $table) {
            $table->integer('sector_id')->unsigned()->index();
            $table->integer('brigade_id')->unsigned()->index();

            $table->boolean('is_default_brigade')->default(false);

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
        Schema::drop('brigade_sector');
    }
}
