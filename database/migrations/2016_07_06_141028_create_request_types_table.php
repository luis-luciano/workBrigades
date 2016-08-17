<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_types', function (Blueprint $table) {
            $table->increments('id');
                $table->string('name');
                $table->string('color');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('requests', function (Blueprint $table) {
            $table->integer('request_type_id')->unsigned()->default(2)->index();
            $table->foreign('request_type_id')->references('id')->on('request_types');
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
           $table->dropForeign('requests_request_type_id_foreign');
           $table->dropIndex('requests_request_type_id_index');
           $table->dropColumn('request_type_id');
        });
        Schema::drop('request_types');
    }
}
