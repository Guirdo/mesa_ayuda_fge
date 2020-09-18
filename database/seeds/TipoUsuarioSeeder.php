<?php

use Illuminate\Database\Seeder;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.  
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat__tipo_usuarios')->insert([
            'tipoUsuario' => 'ADMINISTRADOR'
        ]);

        DB::table('cat__tipo_usuarios')->insert([
            'tipoUsuario' => 'SOPORTE'
        ]);
    }
}
