<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id_user');
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('sex')->nullable();
            $table->string('country')->nullable();
            $table->string('ip')->nullable();
            $table->string('OS')->nullable();
            $table->string('browser')->nullable();
            $table->string('language')->nullable();
            $table->date('last_login')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
