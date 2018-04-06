<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            "dui" => '12548758-8',
            'email' => 'franklin.esquivel@outlook.com',
            'password' => bcrypt('20150126'),
            "nombre" => 'Franklin Armando',
            "apellido" => 'Esquivel Guevara',
            "fechaNac" => '1998-09-26',
            "edad" => 19,
            "direccion" => 'Santa Lucía',
            "telefono" => '76702569',
            "user_type_id" => 'ADM',
            "municipio_id" => 5
        ]);

        App\User::create([
            "dui" => '98526857-8',
            'email' => 'fulano@gmail.com',
            'password' => bcrypt('hola'),
            "nombre" => 'Fulano',
            "apellido" => 'Detal',
            "fechaNac" => '1995-09-26',
            "edad" => 23,
            "direccion" => 'Por allá',
            "telefono" => '00000000',
            "user_type_id" => 'CLE',
            "municipio_id" => 5
        ]);
    }
}
