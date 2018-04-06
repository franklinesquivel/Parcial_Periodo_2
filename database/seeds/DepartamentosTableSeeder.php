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
        $datos = [['nombre' => 'Ahuachapán'], ['nombre' => 'Sonsonate'], ['nombre' => 'Santa Ana'], ['nombre' => 'Cabañas'], ['nombre' => 'Chalatenango'], ['nombre' => 'Cuscatlán'], ['nombre' => 'La Libertad'], ['nombre' => 'La Paz'], ['nombre' => 'San Salvador'], ['nombre' => 'San Vicente'], ['nombre' => 'Morazán'], ['nombre' => 'San Miguel'], ['nombre' => 'Usulután'], ['nombre' => 'La Unión']];
       
        foreach ($datos as $m) {
            App\Departamento::create($m);
        }

        // App\Departamento::create($datos);
    }
}
