<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_topics', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('forum_category_id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->bigInteger('view_count')->default(0);
            $table->timestamps();

            $table->foreign('forum_category_id')->references('id')->on('forum_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forum_posts');
    }
}
