<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('slug', 150)->unique();
            $table->string('description')->nullable();
            $table->string('sort')->default(99);
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
        Schema::drop('forum_categories');
    }
}
