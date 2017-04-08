<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->increments('id_user_role');
            $table->integer('id_user')->unsigned();
            $table->integer('id_role')->unsigned();
            
            $table->boolean('status');
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_role')->references('id_role')->on('role');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_role');
    }
}
