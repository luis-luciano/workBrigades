<?php

use App\ProblemType;
use App\Typology;
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
		ProblemType::create(['name' => 'FALTA DE AGUA'])->typologies()->associate(Typology::find(1))->save();
		ProblemType::create(['name' => 'FALTA PRESION'])->typologies()->associate(Typology::find(1))->save();
		ProblemType::create(['name' => 'FUGA'])->typologies()->associate(Typology::find(1))->save();
		ProblemType::create(['name' => 'TOMA TAPADA'])->typologies()->associate(Typology::find(1))->save();
		ProblemType::create(['name' => 'OTRO'])->typologies()->associate(Typology::find(1))->save();

		// :::::::::::::::DRENAJE::::::::::::::::::::::::::
		ProblemType::create(['name' => 'ALCANTARILLA'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'ALCANTARILLA ASOLVADA'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'CAMBIO BROCAL CON TAPA'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'CONSTRUCION DESCARGA SANITARIA'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'DRENAJE TAPADO'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'FUGA DE DRENAJE'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'REVISION DE SOLICITUDES'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'TAPA DE REGISTRO DAÑADA'])->typologies()->associate(Typology::find(2))->save();


		// :::::::::::::::BACHEO::::::::::::::::::::::::::
		ProblemType::create(['name' => 'BACHEO'])->typologies()->associate(Typology::find(3))->save();
		ProblemType::create(['name' => 'ESCOMBRO'])->typologies()->associate(Typology::find(3))->save();

		// :::::::::::::::CULTURA DEL AGUA::::::::::::::::::::::::::
		ProblemType::create(['name' => 'CULTURA DEL AGUA'])->typologies()->associate(Typology::find(4))->save();

		// :::::::::::::::AREA COMERCIAL::::::::::::::::::::::::::
		ProblemType::create(['name' => 'FUGA MEDIDOR'])->typologies()->associate(Typology::find(5))->save();
		ProblemType::create(['name' => 'INSPECCION'])->typologies()->associate(Typology::find(5))->save();
		ProblemType::create(['name' => 'INSPECCION DE TOMA NUEVA'])->typologies()->associate(Typology::find(5))->save();
		
				
    }
}
