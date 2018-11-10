<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('item_id')->nullable();
            $table->string('item', 60);
            $table->string('ruta', 80)->nullable();
            $table->string('icono', 60)->nullable();
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}
