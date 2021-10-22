<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('ApellidoPaterno');
            $table->string('ApellidoMaterno');
            $table->string('dni');
            $table->string('Telefono');
            $table->string('Correo');
            $table->string('Membresia');
            //$table->string('Promocion');
            $table->string('Entrenador');
            $table->text('Objetivo_fisico');
            $table->string('Foto');
            $table->string('Fecha_Inicio');
            $table->string('Fecha_Final');
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
        Schema::dropIfExists('clientes');
    }
}
