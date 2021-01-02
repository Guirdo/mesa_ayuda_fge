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
            'tipoServicio' => 'SISTEMAS',
        ]);

        DB::table('cat__tipo_servicios')->insert([
            'tipoServicio' => 'TELEFONIA',
        ]);

        DB::table('cat__tipo_servicios')->insert([
            'tipoServicio' => 'MANTENIMIENTO',
        ]);

        DB::table('cat__tipo_servicios')->insert([
            'tipoServicio' => 'SOPORTE TECNICO',
        ]);

        DB::table('cat__tipo_servicios')->insert([
            'tipoServicio' => 'REDES',
        ]);

    }
}
