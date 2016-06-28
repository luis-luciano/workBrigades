<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColoniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('colonies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zip', 06);
            $table->string('name', 80);

            $table->integer('colony_scope_id')->unsigned()->default(1)->index();
            $table->foreign('colony_scope_id')->references('id')->on('colony_scopes');

            $table->integer('settlement_type_id')->unsigned()->default(1)->index();
            $table->foreign('settlement_type_id')->references('id')->on('settlement_types');

            $table->integer('sector_id')->unsigned()->nullable()->index();
            $table->foreign('sector_id')->references('id')->on('sectors');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('colonies');
    }
}
