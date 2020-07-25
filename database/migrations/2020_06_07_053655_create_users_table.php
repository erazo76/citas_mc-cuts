<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('telefono', 20);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('msedes_id');
            $table->bigInteger('mroles_id');
            $table->text('descripcion')->nullable();
            // $table->integer('status')->unsigned()->default(1);
            $table->string('imagen', 100)->nullable()->default('default3.png');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            //$table->foreign('msedes_id')->references('id')->on('msedes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
