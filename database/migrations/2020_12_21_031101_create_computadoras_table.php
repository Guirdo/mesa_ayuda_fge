<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputadorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computadoras', function (Blueprint $table) {
            $table->id();
            $table->string('equipo_numeroSerie',45);
            $table->String('nombre_computadora',45);
            $table->String('grupo_de_trabajo',45);
            $table->String('discoDuro',30);
            $table->String('sistemaOperativo',45);
            $table->String('ram',10);
            $table->String('procesador',30);
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
        Schema::table('computadoras', function (Blueprint $table){
            $table->dropSoftDeletes();

        });
        Schema::dropIfExists('computadoras');
    }
}
