<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumThreadVisitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_thread_visitations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('thread_id');
            $table->timestamp('visited_at');
            $table->string('ip', 100);
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
        Schema::drop('forum_thread_visitations');
    }
}
