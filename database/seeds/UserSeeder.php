<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'idTipoUsuario' => 1,
            //'idEmpleado' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Soporter',
            'email' => 'soport@gmail.com',
            'password' => Hash::make('password'),
            'idTipoUsuario' => 2,
            //'idEmpleado' => 2,
        ]);
    }
}
