<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_replies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('reply_type_id')->unsigned();
            $table->integer('who_last_edited_id')->unsigned();

            $table->foreign('reply_type_id')->references('id')->on('reply_types');
            $table->foreign('who_last_edited_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->foreign('request_reply_id')->references('id')->on('request_replies');
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
           $table->dropForeign('requests_request_reply_id_foreign');
           $table->dropIndex('requests_request_reply_id_index');
           $table->dropColumn('request_reply_id');
        });
        
        Schema::drop('request_replies');
    }
}
