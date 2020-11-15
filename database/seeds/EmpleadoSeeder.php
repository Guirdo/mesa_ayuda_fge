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
            'email'=>'fede.s.s@email.com',
            'CUIP' => '1234567890',
            'idArea'=>'1',
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Abedul',
            'apellidoPat' => 'Rios',
            'apellidoMat' => 'Sanchez',
            'email'=>'abe.r.s@email.com',
            'CUIP' => '1234567899',
            'idArea'=>'1',
        ]);
    }
}
