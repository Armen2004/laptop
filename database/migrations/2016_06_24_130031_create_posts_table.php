<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->boolean('status');
            $table->string('image');
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });

        Schema::create('post_social', function(Blueprint $table) {
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('social_id');
            $table->string('share_link');

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('social_id')->references('id')->on('socials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_social');
        Schema::drop('posts');
    }
}
