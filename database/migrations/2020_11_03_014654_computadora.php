<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Computadora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computadora', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('equipo_numeroSerie');
            $table->String('nombre',45);
            $table->String('grupo_de_trabajo',45);
            $table->String('discoDuro',30);
            $table->String('sistemaOperativo',45);
            $table->String('ram',10);
            $table->String('procesador',10);
            //$table->foreign('equipo_numeroSerie')->references('id')->on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computadora');
    }
}
