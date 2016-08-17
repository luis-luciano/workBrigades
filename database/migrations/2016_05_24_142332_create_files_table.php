<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('display_name');
            $table->integer('user_id')->unsigned();
            $table->morphs('filable');

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::drop('files');
    }
}
