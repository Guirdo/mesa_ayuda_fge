<?php

use Illuminate\Database\Seeder;

class Cat_Tipo_SolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat__tipo__solicituds')->insert([
            'tipoSolicitud' => 'Via telefonica',
        ]);

        DB::table('cat__tipo__solicituds')->insert([
            'tipoSolicitud' => 'Oficio relacionado',
        ]);

        DB::table('cat__tipo__solicituds')->insert([
            'tipoSolicitud' => 'Web',
        ]);
    }
}
