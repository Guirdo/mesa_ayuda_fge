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
            'telefonoPersonal'=>'7471121415',
            'CUIP' => '1234567890',
            'idArea'=>'1',
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Abedul',
            'apellidoPat' => 'Rios',
            'apellidoMat' => 'Sanchez',
            'email'=>'abe.r.s@email.com',
            'telefonoPersonal'=>'7471222324',
            'CUIP' => '1234567899',
            'idArea'=>'1',
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Diana',
            'apellidoPat' => 'Hernandez',
            'apellidoMat' => 'Gutierrez',
            'email'=>'dia.h.g@email.com',
            'telefonoPersonal'=>'7441454647',
            'CUIP' => 'GUHD060999',
            'idArea'=>'1',
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Humberto',
            'apellidoPat' => 'Mondragon',
            'apellidoMat' => 'Rosas',
            'email'=>'hum.m.r@email.com',
            'telefonoPersonal'=>'7441898786',
            'CUIP' => 'ROMH010198',
            'idArea'=>'1',
        ]);
    }
}
