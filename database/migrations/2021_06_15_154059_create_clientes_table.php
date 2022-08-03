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
            $table->string('tipo_cp');
            $table->string('fecha');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('tipo_doc');
            $table->integer('number_doc');
            $table->string('fecha_naci');
            $table->string('genero');
            $table->string('categoria1')->nullable();
            $table->string('categoria2')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('departamento')->nullable();
            $table->string('provincia')->nullable();
            $table->string('distrito')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('ruc')->nullable();
            $table->string('rubro')->nullable();
            $table->string('pagina_web')->nullable();
            $table->softDeletes();
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
