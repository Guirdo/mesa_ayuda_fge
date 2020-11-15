<?php

use Illuminate\Database\Seeder;

class AdscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adscripcions')->insert([
            'adscripcion' => 'Fiscalia General del Estado',
            'idRegion' => '1',
        ]);

        DB::table('adscripcions')->insert([
            'adscripcion' => 'FEPADE',
            'idRegion' => '1',
        ]);

        DB::table('adscripcions')->insert([
            'adscripcion' => 'Fiscalia General del Municipio',
            'idRegion' => '2',
        ]);

        DB::table('adscripcions')->insert([
            'adscripcion' => 'Fiscalia General del Municipio',
            'idRegion' => '2',
        ]);

        DB::table('adscripcions')->insert([
            'adscripcion' => 'Fiscalia General del Municipio',
            'idRegion' => '3',
        ]);
    }
}
