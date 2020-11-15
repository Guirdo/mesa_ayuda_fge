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
            'region' => 'Centro',
        ]);

        DB::table('regions')->insert([
            'region' => 'Montaña',
        ]);

        DB::table('regions')->insert([
            'region' => 'Costa Grande',
        ]);

        DB::table('regions')->insert([
            'region' => 'Costa Chica',
        ]);
    }
}
