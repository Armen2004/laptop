<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_type_id');
            $table->string('name');
            $table->string('image');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('last_activity');
            $table->timestamps();

            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
