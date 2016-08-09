<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectsBrigsTypsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sects_brigs_typs', function (Blueprint $table) {
            $table->integer('sector_id')->unsigned()->index();
            $table->integer('typology_id')->unsigned()->index();
            $table->integer('brigade_id')->unsigned()->index();
        
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->foreign('typology_id')->references('id')->on('typologies');
            $table->foreign('brigade_id')->references('id')->on('brigades');

            $table->primary(['sector_id','typology_id','brigade_id']);
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
        Schema::drop('sects_brigs_typs');
    }
}
