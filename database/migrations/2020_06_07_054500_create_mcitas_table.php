<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcitas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_cli');
            $table->bigInteger('id_op');
            $table->bigInteger('msedes_id');
            $table->bigInteger('mservicios_id');
            $table->timestamp('fecha')->nullable();
            $table->string('hora_i', 20)->nullable();
            $table->string('hora_f', 20)->nullable();
            $table->integer('calificacion')->unsigned()->default(0);
            $table->text('comentario');
            $table->integer('status')->unsigned()->default(1);            
            $table->timestamps();
            $table->foreign('msedes_id')->references('id')->on('msedes')->onDelete('cascade');           
            $table->foreign('mservicios_id')->references('id')->on('mservicios')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mcitas');
    }
}
