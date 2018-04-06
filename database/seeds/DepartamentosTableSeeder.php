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
        $datos = ['Ahuachapán', 'Sonsonate', 'Santa Ana', 'Cabañas', 'Chalatenango', 'Cuscatlán', 'La Libertad', 'La Paz', 'San Salvador', 'San Vicente', 'Morazán', 'Usulután', 'La Unión'];
        foreach ($datos as $m) {
            App\Departamento::create($m);
        }
    }
}
