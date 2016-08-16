<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThumbnailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thumbnails', function (Blueprint $table) {
            $table->char('size');
            $table->bigInteger('file_id')->unsigned();

            $table->string('name');

            $table->foreign('file_id')->references('id')->on('files');

            $table->primary(['size', 'file_id']);

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
        Schema::drop('thumbnails');
    }
}
