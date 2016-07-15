<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_posts', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('forum_topic_id');
            $table->unsignedInteger('user_id');
            $table->integer('parent_id')->default(0);
            $table->text('comment');
            $table->bigInteger('like')->default(0);
            $table->timestamps();

            $table->foreign('forum_topic_id')->references('id')->on('forum_topics')->onDelete('cascade');
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
