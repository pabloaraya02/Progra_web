<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment', function (Blueprint $table) {
            $table->increments('id_assignment');
            $table->integer('id_course')->unsigned();
            $table->text('description');
            $table->float('grade', 5, 2);
            $table->dateTime('creation_date');
            $table->dateTime('delivery_date');
            $table->float('score', 5, 2);
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
        Schema::dropIfExists('assignment');
    }
}
