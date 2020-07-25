<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msedes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100)->nullable();
            $table->string('direccion', 150)->nullable();
            $table->string('pais', 100)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('logo', 100)->default('default.png');
            $table->integer('status')->unsigned()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('msedes');
    }
}
