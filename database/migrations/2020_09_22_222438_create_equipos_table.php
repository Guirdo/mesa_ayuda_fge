<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('marca',45);
            $table->string('modelo',45);
            $table->bigInteger('numeroSerie');
            $table->bigInteger('claveInventarial');
            $table->integer('idTipoEquipo');
            //$table->foreign('idTipoEquipo')->references('id')->on('cat__tipo_equipo');
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
        Schema::dropIfExists('equipos');
    }
}
