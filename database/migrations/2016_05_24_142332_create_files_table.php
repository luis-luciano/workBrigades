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
            $table->bigInteger('creator_id')->unsigned()->nullable()->index(); // morph
            $table->string('creator_type')->nullable()->index(); // morph
            $table->morphs('filable');

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
