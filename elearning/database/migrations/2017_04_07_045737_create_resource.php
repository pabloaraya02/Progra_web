<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResource extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource', function (Blueprint $table) {
            $table->increments('id_resource');
            $table->string('name');
            $table->string('url')->nullable();
            $table->integer('id_resource_type')->unsigned();
            $table->integer('resource_father')->unsigned()->nullable();
            $table->boolean('visible')->nullable();
            $table->integer('sequence')->nullable();//orden en que se desplegaran los recursos
            $table->string('notes')->nullable();
            $table->boolean('status')->nullable();
            $table->integer('id_week')->unsigned();
            $table->foreign('id_resource_type')->references('id_resource_type')->on('resource_type');
            $table->foreign('resource_father')->references('id_resource')->on('resource');
            $table->foreign('id_week')->references('id_week')->on('week');
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
        Schema::dropIfExists('resource');
    }
}
