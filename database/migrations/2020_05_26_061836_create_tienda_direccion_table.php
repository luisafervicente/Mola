<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiendaDireccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tienda_direccion', function (Blueprint $table) {
            $table->id();
             $table->foreignId('tienda_id')->references('id')->on('tiendas')->onDelete('cascade');
            $table->foreignId('direccion_id')->references('id')->on('direccion')->onDelete('cascade');
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
        Schema::dropIfExists('tienda_direccion');
    }
}
