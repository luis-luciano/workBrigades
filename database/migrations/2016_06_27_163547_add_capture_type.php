<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCaptureType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->integer('capture_type_id')->unsigned()->default(1)->index();
            $table->foreign('capture_type_id')->references('id')->on('capture_types');
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
           $table->dropForeign('requests_capture_type_id_foreign');
           $table->dropIndex('requests_capture_type_id_index');
           $table->dropColumn('capture_type_id');
        });
    }
}
