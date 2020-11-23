<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call([
            RegionSeeder::class,
            AdscripcionSeeder::class,
            AreaSeeder::class,
            EmpleadoSeeder::class,
            TipoEquipoSeeder::class,
            TipoUsuarioSeeder::class,
            UserSeeder::class,
        ]);
    }
}
