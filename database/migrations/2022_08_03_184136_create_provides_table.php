<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provides', function (Blueprint $table) {
            $table->id();
            $table->string('fecha_creacion');
            $table->string('razon_social');
            $table->string('ruc');
            $table->string('rubro');
            $table->string('categoria');
            $table->string('pagina_web');
            $table->string('direccion');
            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('tipo_doc');
            $table->string('number_doc');
            $table->string('genero');
            $table->string('telefono');
            $table->string('correo');
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
        Schema::dropIfExists('provides');
    }
}
