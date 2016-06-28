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

        // :::::::::::::::Agua::::::::::::::::::::::::::
		ProblemType::create(['name' => 'Falta de Agua'])->typologies()->associate(Typology::find(1))->save();
		ProblemType::create(['name' => 'Falta Presion'])->typologies()->associate(Typology::find(1))->save();
		ProblemType::create(['name' => 'Fuga'])->typologies()->associate(Typology::find(1))->save();
		ProblemType::create(['name' => 'Toma Tapada'])->typologies()->associate(Typology::find(1))->save();
		ProblemType::create(['name' => 'Otro'])->typologies()->associate(Typology::find(1))->save();

		// :::::::::::::::Drena::::::::::::::::::::::::::
		ProblemType::create(['name' => 'Alcantarilla'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'Alcantarilla Asolvada'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'Cambio Brocal Con Tapa'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'Construccion Descarga Sanitaria'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'Drenaje Tapado'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'Fuga de Drenaje'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'Revision de Solicitudes'])->typologies()->associate(Typology::find(2))->save();
		ProblemType::create(['name' => 'Tapa de Registro Dañada'])->typologies()->associate(Typology::find(2))->save();


		// :::::::::::::::BACHEO::::::::::::::::::::::::::
		ProblemType::create(['name' => 'Bacheo'])->typologies()->associate(Typology::find(3))->save();
		ProblemType::create(['name' => 'Escombro'])->typologies()->associate(Typology::find(3))->save();

		// :::::::::::::::CULTURA deL Agua::::::::::::::::::::::::::
		ProblemType::create(['name' => 'Cultura del Agua'])->typologies()->associate(Typology::find(4))->save();

		// :::::::::::::::AREA COMERCIAL::::::::::::::::::::::::::
		ProblemType::create(['name' => 'Fuga Medidor'])->typologies()->associate(Typology::find(5))->save();
		ProblemType::create(['name' => 'Inspeccion'])->typologies()->associate(Typology::find(5))->save();
		ProblemType::create(['name' => 'Inspeccion de Toma Nueva'])->typologies()->associate(Typology::find(5))->save();
		
				
    }
}
