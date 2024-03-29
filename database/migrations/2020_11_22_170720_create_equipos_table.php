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
            $table->string('numeroSerie',45);
            $table->string('claveInventarial',45);
            $table->unsignedBigInteger('idTipoEquipo');
            // $table->foreign('idTipoEquipo')->references('id')->on('cat_tipo_equipo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('equipos', function (Blueprint $table){
            $table->dropSoftDeletes();

        });
        Schema::dropIfExists('equipos');
    }
}
