<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('primer_nombre',100);
            $table->string('segundo_nombre',100)->nullable();
            $table->string('primer_apellido',100);
            $table->string('segundo_apellido',100)->nullable();
            $table->string('correo',150)->unique();
            $table->text('password');
            $table->date('fecha_nacimiento')->nullable();
            $table->unsignedTinyInteger('estado_id');
            $table->rememberToken();//Agregar
            $table->timestamp('email_verified_at')->nullable();//Agregar
            $table->timestamps();

            $table->foreign('estado_id')->references('id')->on('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
