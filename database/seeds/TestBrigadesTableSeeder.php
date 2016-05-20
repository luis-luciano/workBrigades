<?php

use App\Brigade;
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
        
    	Brigade::create(array('name' => 'Brigada de Bacheo' , 'description' => 'Indefinido' , ));
    	Brigade::create(array('name' => 'Brigada de Cultura del Agua' , 'description' => 'Indefinido' , ));
    	Brigade::create(array('name' => 'Area Comercial' , 'description' => 'Indefinido' , ));
    	Brigade::create(array('name' => 'Brigada Unica' , 'description' => 'Indefinido' , ));
    	Brigade::create(array('name' => 'Brigada de Respuesta Rapida' , 'description' => 'Indefinido' , ));
    	Brigade::create(array('name' => 'Contacto de la Brigada 50' , 'description' => 'Indefinido' , ));
    	Brigade::create(array('name' => 'Contacto de la Brigada 97' , 'description' => 'Indefinido' , ));
    	Brigade::create(array('name' => 'Contacto de la Brigada 146' , 'description' => 'Indefinido' , ));
    	Brigade::create(array('name' => 'Contacto de la Brigada 143' , 'description' => 'Indefinido' , ));
    }
}
