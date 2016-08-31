<?php

use App\Supervision;
use Illuminate\Database\Seeder;

class TestSupervisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supervision::create(['name' => 'Hidrosistema', 'phone' => '2717125535', 'extension' => '','user_id'=>1,'supervision_id' =>null]);
        Supervision::create(['name' => 'Subdireccion de Operacion y Proyectos Hidraulicos', 'phone' => '2717125535', 'extension' => '999','user_id'=>1,'supervision_id' =>1]);
        Supervision::create(['name' => 'Departamento de Agua Potable y Bacheo'				, 'phone' => '2717125535', 'extension' => '209', 'user_id'=>1,'supervision_id' => 2]);
        Supervision::create(['name' => 'Departamento de Alcantarillado Sanitario'	, 'phone' => '2717125535', 'extension' => '210', 'user_id'=>1,'supervision_id' => 2]);
        Supervision::create(['name' => 'Unidad de Difusion' , 'phone' => '2717125535', 'extension' => '220', 'user_id'=>1,'supervision_id' => 1]);
        Supervision::create(['name' => 'SubDireccion Comercial'   , 'phone' => '2717125535', 'extension' => '205', 'user_id'=>1,'supervision_id' => 1]);
        Supervision::create(['name' => 'Departamento de Control de Rezago'   , 'phone' => '2717125535', 'extension' => '206', 'user_id'=>1,'supervision_id' => 7]);
    }
}
