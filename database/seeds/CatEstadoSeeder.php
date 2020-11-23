<?php

use Illuminate\Database\Seeder;

class CatEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_estados')->insert([
            'estado' => 'SIN ATENDER',
        ]);

        DB::table('cat_estados')->insert([
            'estado' => 'ATENDIENDO',
        ]);

        DB::table('cat_estados')->insert([
            'estado' => 'TERMINADO',
        ]);

        DB::table('cat_estados')->insert([
            'estado' => 'CANCELADO',
        ]);
    }
}
