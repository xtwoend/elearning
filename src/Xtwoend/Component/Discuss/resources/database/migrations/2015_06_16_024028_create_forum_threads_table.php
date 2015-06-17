<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_threads', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('author_id');
            $table->string('subject');
            $table->text('body');
            $table->string('slug');
            $table->string('category_slug');
            $table->integer('most_recent_reply_id');
            $table->integer('reply_count');
            $table->boolean('is_question');
            $table->string('ip', 100);
            $table->boolean('pinned');
            $table->integer('solution_reply_id')->nullable()->defaults(null);
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
        Schema::drop('forum_threads');
    }
}
