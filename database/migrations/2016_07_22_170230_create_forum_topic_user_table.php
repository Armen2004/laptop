<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumTopicUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_topic_user', function(Blueprint $table) {
            $table->unsignedInteger('forum_topic_id');
            $table->unsignedInteger('user_id');
            $table->timestamp('liked_at');

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
        Schema::drop('like_forum_topic');
    }
}
