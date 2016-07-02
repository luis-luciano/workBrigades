<?php

use App\Problem;
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
        DB::table('problems')->delete();

        // :::::::::::::::Agua::::::::::::::::::::::::::
		Problem::create(['name' => 'Falta de Agua'])->typologies()->associate(Typology::find(1))->save();
		Problem::create(['name' => 'Falta Presion'])->typologies()->associate(Typology::find(1))->save();
		Problem::create(['name' => 'Fuga'])->typologies()->associate(Typology::find(1))->save();
		Problem::create(['name' => 'Toma Tapada'])->typologies()->associate(Typology::find(1))->save();
		Problem::create(['name' => 'Otro'])->typologies()->associate(Typology::find(1))->save();

		// :::::::::::::::Drena::::::::::::::::::::::::::
		Problem::create(['name' => 'Alcantarilla'])->typologies()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Alcantarilla Asolvada'])->typologies()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Cambio Brocal Con Tapa'])->typologies()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Construccion Descarga Sanitaria'])->typologies()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Drenaje Tapado'])->typologies()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Fuga de Drenaje'])->typologies()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Revision de Solicitudes'])->typologies()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Tapa de Registro Dañada'])->typologies()->associate(Typology::find(2))->save();


		// :::::::::::::::BACHEO::::::::::::::::::::::::::
		Problem::create(['name' => 'Bacheo'])->typologies()->associate(Typology::find(3))->save();
		Problem::create(['name' => 'Escombro'])->typologies()->associate(Typology::find(3))->save();

		// :::::::::::::::CULTURA deL Agua::::::::::::::::::::::::::
		Problem::create(['name' => 'Cultura del Agua'])->typologies()->associate(Typology::find(4))->save();

		// :::::::::::::::AREA COMERCIAL::::::::::::::::::::::::::
		Problem::create(['name' => 'Fuga Medidor'])->typologies()->associate(Typology::find(5))->save();
		Problem::create(['name' => 'Inspeccion'])->typologies()->associate(Typology::find(5))->save();
		Problem::create(['name' => 'Inspeccion de Toma Nueva'])->typologies()->associate(Typology::find(5))->save();
		
				
    }
}
