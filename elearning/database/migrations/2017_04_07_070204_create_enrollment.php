<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollment', function (Blueprint $table) {
            $table->increments('id_enrollment');
            $table->integer('period');
            $table->integer('year');
            $table->integer('id_course')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->dateTime('enrollment_date');
            $table->foreign('id_course')->references('id_course')->on('course');
            $table->foreign('id_user')->references('id_user')->on('users');
            //$table->foreign()->references()->on();
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
        Schema::dropIfExists('enrollment');
    }
}
