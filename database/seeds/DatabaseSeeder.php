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
            
            CatEstatusSeeder::class,
            CatTipoReparacionSeeder::class,
            CatEstadoSeeder::class,
            Cat_Tipo_SolicitudSeeder::class,
            Cat_TipoServicioSeeder::class,
            TipoEquipoSeeder::class,
            TipoUsuarioSeeder::class,
            UserSeeder::class,
        ]);
    }
}
