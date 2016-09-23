<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typologies', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name');
            $table->smallInteger('expiration_day')->nullable()->unsigned();
            $table->smallInteger('expiration_day_by_law')->nullable()->unsigned();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('typologies');
    }
}
