<?php

use Illuminate\Database\Seeder;

class Cat_TipoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat__tipo_servicios')->insert([
            'tipoServicio' => 'Mantenimiento',
        ]);

        DB::table('cat__tipo_servicios')->insert([
            'tipoServicio' => 'Soporte tecnico',
        ]);

        DB::table('cat__tipo_servicios')->insert([
            'tipoServicio' => 'Redes',
        ]);

        DB::table('cat__tipo_servicios')->insert([
            'tipoServicio' => 'Sistemas',
        ]);
    }
}
