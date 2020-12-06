<?php

use Illuminate\Database\Seeder;

class CatTipoReparacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_tipo_reparacions')->insert([
            'tipoReparacion' => 'SIN REPARACION',
        ]);

        DB::table('cat_tipo_reparacions')->insert([
            'tipoReparacion' => 'IN SITU',
        ]);

        DB::table('cat_tipo_reparacions')->insert([
            'tipoReparacion' => 'SALIDA DE EQUIPO',
        ]);

        DB::table('cat_tipo_reparacions')->insert([
            'tipoReparacion' => 'DICTAMEN DE BAJA',
        ]);
    }
}
