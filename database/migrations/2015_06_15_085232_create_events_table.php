<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->boolean('all_day')->default(false);
            $table->datetime('start');
            $table->datetime('end');            
            $table->integer('user_id');
            $table->string('url');
            $table->text('description');
            $table->string('background_color');
            $table->string('border_color');
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
        Schema::drop('events');
    }
}
