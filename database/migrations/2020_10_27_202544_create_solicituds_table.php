<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('folio',18);
            $table->string('oficioRelacionado',45)->nullable();
            $table->text('descripcionFalla');
            $table->text('observaciones')->nullable();
            $table->text('diagnostico')->nullable();
            $table->text('respaldo')->nullable();
            $table->bigInteger('tipoSolicitud');
            $table->bigInteger('tipoServicio');
            $table->bigInteger('tipoReparacion')->default(1);
            $table->bigInteger('idEmpleado');
            $table->bigInteger('idEstado')->default(1);
            $table->timestamp('FUA')->useCurrentOnUpdate();
            $table->timestamp('fechaRegistro')->useCurrent();
            $table->timestamp('fechaTermino')->nullable();
            $table->timestamp('fechaCancelacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
}
