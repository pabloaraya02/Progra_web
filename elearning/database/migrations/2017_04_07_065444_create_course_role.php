<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_role', function (Blueprint $table) {
            $table->increments('id_course_role');
            $table->integer('id_course')->unsigned();
            $table->integer('id_role')->unsigned();
            $table->foreign('id_course')->references('id_course')->on('course');
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
        Schema::dropIfExists('course_role');
    }
}
