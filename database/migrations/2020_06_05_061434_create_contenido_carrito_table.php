<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenidoCarritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido_carrito', function (Blueprint $table) {
           $table->id();
            $table->integer('cantidad');
            $table->foreignId('id_carrito')->references('id')->on('carritos')->onDelete('cascade');
            $table->foreignId('id_producto')->references('id')->on('productos')->onDelete('cascade');
   
            $table->foreignId('id_tienda')->references('id')->on('tiendas')->onDelete('cascade');

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
        Schema::dropIfExists('contenido_carrito');
    }
}
