<?php

use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos = [];

        foreach ($datos as $m) {
            App\Departamento::create($m);
        }
    }
}
