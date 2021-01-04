<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adscripcions', function (Blueprint $table) {
            $table->id();
            $table->text('adscripcion');
            $table->unsignedBigInteger('idRegion');
            $table->timestamp('FUA');

            //$table->foreign('idRegion')->references('id')->on('regions')->cascade();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adscripcions');
    }
}
