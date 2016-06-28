<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('subject');
            $table->date('start_date')->nullable();
            $table->date('finish_date')->nullable();
            
            $table->string('street', 80);
            $table->string('number',10)->nullable();
            $table->text('between_streets');
            $table->text('reference');

            $table->integer('colony_id')->unsigned()->index();
            $table->foreign('colony_id')->references('id')->on('colonies');

            $table->bigInteger('concerned_id')->unsigned()->index(); // morph
            $table->string('concerned_type')->index(); // morph

            $table->bigInteger('creator_id')->unsigned()->index(); // morph
            $table->string('creator_type')->index(); // morph

            // $table->integer('capture_type_id')->unsigned()->index();
            // $table->foreign('capture_type_id')->references('id')->on('capture_types');

            $table->integer('request_priority_id')->unsigned()->index();
            $table->foreign('request_priority_id')->references('id')->on('request_priorities');

            $table->integer('request_state_id')->unsigned()->index();
            $table->foreign('request_state_id')->references('id')->on('request_states');

            $table->bigInteger('request_rejection_id')->unsigned()->nullable()->index();
            $table->foreign('request_rejection_id')->references('id')->on('request_rejections');
            
            $table->integer('brigade_id')->unsigned()->index();
            $table->foreign('brigade_id')->references('id')->on('brigades');

            $table->integer('problem_type_id')->unsigned()->index();
            $table->foreign('problem_type_id')->references('id')->on('problem_types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('requests');
    }
}
