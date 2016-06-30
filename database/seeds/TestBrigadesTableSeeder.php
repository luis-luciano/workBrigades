<?php

use App\Brigade;
use App\Sector;
use Illuminate\Database\Seeder;

class TestBrigadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	Brigade::create(['name' => 'Brigada 164' , 'description' => 'Brigada de Bacheo']);
    	Brigade::create(['name' => 'Brigada 20' , 'description' => 'Brigada Universal']);
    	Brigade::create(['name' => 'Brigada 50' , 'description' => 'Brigada de Agua']);
    	Brigade::create(['name' => 'Brigada 97' , 'description' => 'Brigada de Agua']);
    	Brigade::create(['name' => 'Brigada 140' , 'description' => 'Brigada de Agua']);
    	Brigade::create(['name' => 'Brigada 143' , 'description' => 'Brigada de Agua']);
        Brigade::create(['name' => 'Brigada 96' , 'description' => 'Brigada de Drenaje']);
        Brigade::create(['name' => 'Brigada 39' , 'description' => 'Brigada de Drenaje']);
    }
}
