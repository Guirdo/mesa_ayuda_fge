<?php

use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleados')->insert([
            'nombre' => 'Federico',
            'apellidoPat' => 'Sanchez',
            'apellidoMat' => 'Sanchez',
            'CUIP' => '1234567890',
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Abedul',
            'apellidoPat' => 'Rios',
            'apellidoMat' => 'Sanchez',
            'CUIP' => '1234567899',
        ]);
    }
}
