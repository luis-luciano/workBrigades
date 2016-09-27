<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_locations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->double('latitude');
            $table->double('longitude');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->foreign('request_location_id')->references('id')->on('request_locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
           $table->dropForeign('requests_request_location_id_foreign');
           $table->dropIndex('requests_request_location_id_index');
        });

        Schema::drop('request_locations');
    }
}
