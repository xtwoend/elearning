<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quiz_id');
            $table->integer('number');
            $table->text('question');
            $table->enum('type', array('MULTIPLECHOIS', 'MATCHING', 'TEXT'))->default('MULTIPLECHOIS');
            $table->integer('time_limit');
            $table->integer('answer_count');
            $table->enum('level', array('EASY', 'MEDIUM', 'HARD'))->default('MEDIUM');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quizzes');
    }
}
