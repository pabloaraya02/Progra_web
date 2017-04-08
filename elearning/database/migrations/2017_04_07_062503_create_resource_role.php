<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_role', function (Blueprint $table) {
            $table->increments('id_resource_role');
            $table->integer('id_resource')->unsigned();
            $table->integer('id_role')->unsigned();
            $table->boolean('status');
            $table->foreign('id_resource')->references('id_resource')->on('resource');
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
        Schema::dropIfExists('resource_role');
    }
}
