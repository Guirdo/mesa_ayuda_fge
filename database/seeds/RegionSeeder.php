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
        ]);

        DB::table('regions')->insert([
            'region' => 'ACAPULCO',
        ]);

        DB::table('regions')->insert([
            'region' => 'NORTE',
        ]);

        DB::table('regions')->insert([
            'region' => 'TIERRA CALIENTE',
        ]);

        DB::table('regions')->insert([
            'region' => 'COSTA CHICA',
        ]);

        DB::table('regions')->insert([
            'region' => 'COSTA GRANDE',
        ]);

        DB::table('regions')->insert([
            'region' => 'MONTAÑA',
        ]);
    }
}
