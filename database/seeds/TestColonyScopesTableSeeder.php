<?php
use App\ColonyScope;
use Illuminate\Database\Seeder;

class TestColonyScopesTableSeeder extends Seeder {

	public function run() {

		DB::table('colony_scopes')->delete();

		ColonyScope::create(array('name' => 'Indefinido' , ));
		ColonyScope::create(array('name' => 'Rural' , ));
		ColonyScope::create(array('name' => 'Urbano' , ));

		
	}
}