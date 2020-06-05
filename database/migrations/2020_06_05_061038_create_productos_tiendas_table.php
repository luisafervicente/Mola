<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_tiendas', function (Blueprint $table) {
                        $table->id();
            $table->integer('cantidad');
            $table->string('disponibilidad');
            $table->double('precio');
            $table->foreignId('id_tienda')->references('id')->on('tiendas')->onDelete('cascade');
            $table->foreignId('id_producto')->references('id')->on('productos')->onDelete('cascade');

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
        Schema::dropIfExists('productos_tiendas');
    }
}
