<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',30);
            $table->string('apellidoPat',30);
            $table->string('apellidoMat',30);
            $table->string('email',255);
            $table->string('telefonoPersonal',10)->nullable();
            $table->string('extencionTelOf',4)->nullable();
            $table->string('CUIP',10);
            $table->bigInteger('idArea');
            $table->timestamp('FUA');
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
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('empleados');
    }
}
