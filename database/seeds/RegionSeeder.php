<?php

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'region' => 'CENTRO',
            'siglas'=>'CEN'
        ]);

        DB::table('regions')->insert([
            'region' => 'ACAPULCO',
            'siglas'=>'ACA'
        ]);

        DB::table('regions')->insert([
            'region' => 'NORTE',
            'siglas'=>'NOR'
        ]);

        DB::table('regions')->insert([
            'region' => 'TIERRA CALIENTE',
            'siglas'=>'TC'
        ]);

        DB::table('regions')->insert([
            'region' => 'COSTA CHICA',
            'siglas'=>'CCH'
        ]);

        DB::table('regions')->insert([
            'region' => 'COSTA GRANDE',
            'siglas'=>'CG'
        ]);

        DB::table('regions')->insert([
            'region' => 'MONTAÑA',
            'siglas'=>'MON'
        ]);
    }
}
