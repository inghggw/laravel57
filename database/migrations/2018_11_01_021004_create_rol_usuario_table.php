<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_usuario', function (Blueprint $table) {
            $table->bigIncrements('id');
           $table->mediumInteger('rol_id')->unsigned(); 
           $table->bigInteger('usuario_id')->unsigned();
           $table->timestamps();

           $table->foreign('usuario_id')->references('id')->on('usuario');
           $table->foreign('rol_id')->references('id')->on('rol');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_usuario');
    }
}
