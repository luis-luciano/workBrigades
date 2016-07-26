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
		Problem::create(['name' => 'Falta de Agua'])->typology()->associate(Typology::find(1))->save();
		Problem::create(['name' => 'Falta Presion'])->typology()->associate(Typology::find(1))->save();
		Problem::create(['name' => 'Fuga'])->typology()->associate(Typology::find(1))->save();
		Problem::create(['name' => 'Toma Tapada'])->typology()->associate(Typology::find(1))->save();
		Problem::create(['name' => 'Otro'])->typology()->associate(Typology::find(1))->save();

		// :::::::::::::::Drena::::::::::::::::::::::::::
		Problem::create(['name' => 'Alcantarilla'])->typology()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Alcantarilla Asolvada'])->typology()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Cambio Brocal Con Tapa'])->typology()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Construccion Descarga Sanitaria'])->typology()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Drenaje Tapado'])->typology()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Fuga de Drenaje'])->typology()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Revision de Solicitudes'])->typology()->associate(Typology::find(2))->save();
		Problem::create(['name' => 'Tapa de Registro Dañada'])->typology()->associate(Typology::find(2))->save();

		// :::::::::::::::BACHEO::::::::::::::::::::::::::
		Problem::create(['name' => 'Bacheo'])->typology()->associate(Typology::find(3))->save();
		Problem::create(['name' => 'Escombro'])->typology()->associate(Typology::find(3))->save();

		// :::::::::::::::CULTURA deL Agua::::::::::::::::::::::::::
		Problem::create(['name' => 'Cultura del Agua'])->typology()->associate(Typology::find(4))->save();

		// :::::::::::::::AREA COMERCIAL::::::::::::::::::::::::::
		Problem::create(['name' => 'Fuga Medidor'])->typology()->associate(Typology::find(5))->save();
		Problem::create(['name' => 'Inspeccion'])->typology()->associate(Typology::find(5))->save();
		Problem::create(['name' => 'Inspeccion de Toma Nueva'])->typology()->associate(Typology::find(5))->save();				
    }
}
