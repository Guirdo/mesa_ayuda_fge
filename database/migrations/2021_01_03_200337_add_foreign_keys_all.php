<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('idTipoUsuario')->references('id')->on('cat__tipo_usuarios')->cascade();
            $table->foreign('idEmpleado')->references('id')->on('empleados')->cascade();
        });

        Schema::table('adscripcions', function (Blueprint $table) {
            $table->foreign('idRegion')->references('id')->on('regions')->cascade();
        });

        Schema::table('areas', function (Blueprint $table) {
            $table->foreign('idAdscripcion')->references('id')->on('adscripcions')->cascade();
        });

        Schema::table('equipos', function (Blueprint $table) {
            $table->foreign('idTipoEquipo')->references('id')->on('cat_tipo_equipos')->cascade();
        });

        Schema::table('equipo_solicituds', function (Blueprint $table) {
            $table->foreign('idEquipo')->references('id')->on('equipos')->cascade();
            $table->foreign('idSolicitud')->references('id')->on('solicituds')->cascade();
        });

        Schema::table('solicituds', function (Blueprint $table) {
            $table->foreign('tipoSolicitud')->references('id')->on('cat__tipo__solicituds')->cascade();
            $table->foreign('tipoServicio')->references('id')->on('cat__tipo_servicios')->cascade();
            $table->foreign('tipoReparacion')->references('id')->on('cat_tipo_reparacions')->cascade();
            $table->foreign('idEmpleado')->references('id')->on('empleados')->cascade();
            $table->foreign('idEstado')->references('id')->on('cat_estados')->cascade();
        });

        Schema::table('empleados', function (Blueprint $table) {
            $table->foreign('idArea')->references('id')->on('areas')->cascade();
            $table->foreign('idEstatus')->references('id')->on('cat_estatuses')->cascade();
        });

        Schema::table('solicitud_soportes', function (Blueprint $table) {
            $table->foreign('idSoporte')->references('id')->on('empleados')->cascade();
            $table->foreign('idSolicitud')->references('id')->on('solicituds')->cascade();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_idtipousuario_foreign');
            $table->dropForeign('users_idempleado_foreign');
        });

        Schema::table('adscripcions', function (Blueprint $table) {
            $table->dropForeign('adscripcions_idregion_foreign');
        });

        Schema::table('areas', function (Blueprint $table) {
            $table->dropForeign('areas_idadscripcion_foreign');
        });

        Schema::table('equipos', function (Blueprint $table) {
            $table->dropForeign('equipos_idtipoequipo_foreign');
        });
        
        Schema::table('equipo_solicituds', function (Blueprint $table) {
            $table->dropForeign('equipo_solicituds_idequipo_foreign');
            $table->dropForeign('equipo_solicituds_idsolicitud_foreign');
        });

        Schema::table('solicituds', function (Blueprint $table) {
            $table->dropForeign('solicituds_tiposolicitud_foreign');
            $table->dropForeign('solicituds_tiposervicio_foreign');
            $table->dropForeign('solicituds_tiporeparacion_foreign');
            $table->dropForeign('solicituds_idempleado_foreign');
            $table->dropForeign('solicituds_idestado_foreign');
        });
        
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropForeign('empleados_idestatus_foreign');
            $table->dropForeign('empleados_idarea_foreign');
        });

        Schema::table('solicitud_soportes', function (Blueprint $table) {
            $table->dropForeign('solicitud_soportes_idsoporte_foreign');
            $table->dropForeign('solicitud_soportes_idsolicitud_foreign');
        });
    }
}
