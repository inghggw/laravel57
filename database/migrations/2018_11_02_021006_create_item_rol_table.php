<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_rol', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('item_id');
            $table->unsignedMediumInteger('rol_id');
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('item');
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
        Schema::dropIfExists('item_rol');
    }
}

