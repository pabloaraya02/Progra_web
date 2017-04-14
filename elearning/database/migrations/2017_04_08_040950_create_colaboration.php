<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColaboration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaboration', function (Blueprint $table) {
            $table->increments('id_collaboration');
            $table->integer('id_user')->unsigned();
            $table->integer('id_collaboration_type')->unsigned();
            $table->date('creation_date');
            $table->date('modification_date');
            $table->integer('father_collaboration')->unsigned();
            $table->boolean('visible');
            $table->integer('id_assignment')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_collaboration_type')->references('id_collaboration_type')->on('collaboration_type');
            $table->foreign('father_collaboration')->references('id_collaboration')->on('collaboration');
            $table->foreign('id_assignment')->references('id_assignment')->on('assignment');

            ///$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collaboration');
    }
}
