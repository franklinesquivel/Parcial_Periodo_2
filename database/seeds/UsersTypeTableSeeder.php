<?php

use Illuminate\Database\Seeder;

class UsersTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_types')->insert([
            'id' => 'ADM',
            'nombre' => 'Administrador',
            'description' => 'Administrador de la plataforma'
        ]);

        DB::table('users_types')->insert([
            'id' => 'CLE',
            'nombre' => 'Cliente',
            'description' => 'Cliente de la plataforma'
        ]);
    }
}
