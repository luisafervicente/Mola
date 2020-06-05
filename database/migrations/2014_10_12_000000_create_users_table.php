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
            $table->id();
            
            
            $table->string('password');
            $table->string('DNI')->unique();
            $table->string('name');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->enum('rol',['administrador','cliente','vendedor'])->nullable();
            $table->string('telefono');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
