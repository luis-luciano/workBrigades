<?php
use App\SettlementType;
use Illuminate\Database\Seeder;

class TestSettlementTypesTableSeeder extends Seeder {

	public function run() {

		DB::table('settlement_types')->delete();

		SettlementType::create(['name' => 'Indefinido']);
		SettlementType::create(['name' => 'Colonia']);
		SettlementType::create(['name' => 'Localidad']);
		SettlementType::create(['name' => 'Barrio']);
		SettlementType::create(['name' => 'Ampliacion']);
		SettlementType::create(['name' => 'Fraccionamiento']);
		SettlementType::create(['name' => 'Condominio']);
		SettlementType::create(['name' => 'Rancheria']);
		SettlementType::create(['name' => 'Recidencial']);
		SettlementType::create(['name' => 'Unidad Habitacional']);		
	}
}