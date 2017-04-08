<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeekt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week', function (Blueprint $table) {
            $table->increments('id_week');
            $table->string('subject');
            $table->boolean('visible');
            $table->boolean('status');
            $table->integer('id_course')->unsigned();
            $table->foreign('id_course')->references('id_course')->on('course');
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
        Schema::dropIfExists('week');
    }
}
