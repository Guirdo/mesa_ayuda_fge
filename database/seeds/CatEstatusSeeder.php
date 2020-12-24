<?php

use Illuminate\Database\Seeder;

class CatEstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_estatuses')->insert([
            'estatus' => 'ACTIVO',
        ]);

        DB::table('cat_estatuses')->insert([
            'estatus' => 'BAJA',
        ]);

        DB::table('cat_estatuses')->insert([
            'estatus' => 'VACACIONES',
        ]);

    }
}
