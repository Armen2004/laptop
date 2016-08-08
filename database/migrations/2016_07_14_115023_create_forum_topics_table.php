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
            $table->text('description');
            $table->bigInteger('likes')->default(0);
            $table->timestamps();

            $table->foreign('forum_category_id')->references('id')->on('forum_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });

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
        Schema::drop('forum_topic_user');
        Schema::drop('forum_topics');
    }
}
