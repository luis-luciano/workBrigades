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
            $table->boolean('is_public')->default(false);
            
            $table->string('street', 80);
            $table->string('number',10)->nullable();
            $table->text('between_streets')->nullable();
            $table->text('reference')->nullable();

            $table->integer('colony_id')->unsigned()->index();
            $table->foreign('colony_id')->references('id')->on('colonies');

            $table->bigInteger('concerned_id')->unsigned()->index(); // morph
            $table->string('concerned_type')->index(); // morph

            $table->bigInteger('creator_id')->unsigned()->nullable()->index(); // morph
            $table->string('creator_type')->nullable()->index(); // morph

            $table->integer('request_priority_id')->unsigned()->index();
            $table->foreign('request_priority_id')->references('id')->on('request_priorities');

            $table->integer('request_state_id')->unsigned()->default(1)->index();
            $table->foreign('request_state_id')->references('id')->on('request_states');

            $table->bigInteger('request_rejection_id')->unsigned()->nullable()->index();
            $table->foreign('request_rejection_id')->references('id')->on('request_rejections')->onDelete('cascade');

            $table->bigInteger('request_location_id')->unsigned()->nullable()->index();
            
            $table->integer('brigade_id')->unsigned()->index();
            $table->foreign('brigade_id')->references('id')->on('brigades');

            $table->integer('problem_id')->unsigned()->index();
            $table->foreign('problem_id')->references('id')->on('problems');

            $table->timestamps();
            $table->softDeletes();
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
