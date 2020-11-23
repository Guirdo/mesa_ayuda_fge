<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'area' => 'Direccion de Desarrollo y Tecnologias',
            'idAdscripcion' => '1',
        ]);

        DB::table('areas')->insert([
            'area' => 'Servicio Social',
            'idAdscripcion' => '1',
        ]);

        DB::table('areas')->insert([
            'area' => 'Direccion de Desarrollo y Tecnologias',
            'idAdscripcion' => '2',
        ]);

        DB::table('areas')->insert([
            'area' => 'Dep3',
            'idAdscripcion' => '3',
        ]);

        DB::table('areas')->insert([
            'area' => 'Dep4',
            'idAdscripcion' => '3',
        ]);
    }
}
