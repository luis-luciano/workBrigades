<?php

use App\ProblemType;
use Illuminate\Database\Seeder;

class TestProblemTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('problem_types')->delete();

        // :::::::::::::::AGUA::::::::::::::::::::::::::
		ProblemType::create(array('typology_id' => 1 ,'name' => 'FALTA DE AGUA',	));
		ProblemType::create(array('typology_id' => 1 ,'name' => 'FALTA PRESION',	));
		ProblemType::create(array('typology_id' => 1 ,'name' => 'FUGA',	));
		ProblemType::create(array('typology_id' => 1 ,'name' => 'TOMA TAPADA',	));
		ProblemType::create(array('typology_id' => 1 ,'name' => 'OTRO',	));

		// :::::::::::::::DRENAJE::::::::::::::::::::::::::
		ProblemType::create(array('typology_id' => 2 ,'name' => 'ALCANTARILLA',	));
		ProblemType::create(array('typology_id' => 2 ,'name' => 'ALCANTARILLA ASOLVADA',	));
		ProblemType::create(array('typology_id' => 2 ,'name' => 'CAMBIO BROCAL CON TAPA',	));
		ProblemType::create(array('typology_id' => 2 ,'name' => 'CONSTRUCION DESCARGA SANITARIA',	));
		ProblemType::create(array('typology_id' => 2 ,'name' => 'DRENAJE TAPADO',	));
		ProblemType::create(array('typology_id' => 2 ,'name' => 'FUGA DE DRENAJE',	));
		ProblemType::create(array('typology_id' => 2 ,'name' => 'REVISION DE SOLICITUDES',	));
		ProblemType::create(array('typology_id' => 2 ,'name' => 'TAPA DE REGISTRO DAÑADA',	));


		// :::::::::::::::BACHEO::::::::::::::::::::::::::
		ProblemType::create(array('typology_id' => 3 ,'name' => 'BACHEO',	));
		ProblemType::create(array('typology_id' => 3 ,'name' => 'ESCOMBRO',	));

		// :::::::::::::::CULTURA DEL AGUA::::::::::::::::::::::::::
		ProblemType::create(array('typology_id' => 4 ,'name' => 'CULTURA DEL AGUA',	));

		// :::::::::::::::AREA COMERCIAL::::::::::::::::::::::::::
		ProblemType::create(array('typology_id' => 2 ,'name' => 'FUGA MEDIDOR',	));
		ProblemType::create(array('typology_id' => 2 ,'name' => 'INSPECCION',	));
		ProblemType::create(array('typology_id' => 2 ,'name' => 'INSPECCION DE TOMA NUEVA',	));
		
				
    }
}
