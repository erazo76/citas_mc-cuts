<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMserviciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mservicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100)->nullable();
            $table->float('precio')->nullable();
            $table->string('duracion', 20)->nullable();
            $table->text('descripcion');
            $table->string('imagen', 100)->nullable()->default('default2.png');
            $table->integer('status')->unsigned()->default(1);
            $table->bigInteger('msedes_id');            
            $table->timestamps();
            $table->foreign('msedes_id')->references('id')->on('msedes')->onDelete('cascade');
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mservicios');
    }
}
