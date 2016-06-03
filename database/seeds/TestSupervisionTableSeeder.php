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
        Supervision::create(array('name' => 'AGUA POTABLE'				, 'phone' => '9999999999', 'extension' => '999', 'supervision_id' => ''	,));
        Supervision::create(array('name' => 'ALCANTARILLADO SANITARIO'	, 'phone' => '9999999999', 'extension' => '999', 'supervision_id' => ''	,));
		Supervision::create(array('name' => 'AGUA POTABLE Y BACHEO'		, 'phone' => '9999999999', 'extension' => '999', 'supervision_id' => ''	,));
		Supervision::create(array('name' => 'UNIDAD DE DIFUSION'		, 'phone' => '9999999999', 'extension' => '999', 'supervision_id' => ''	,));
		Supervision::create(array('name' => 'CONTROL DEL REZAGO'		, 'phone' => '9999999999', 'extension' => '999', 'supervision_id' => ''	,));
		

    }
}
