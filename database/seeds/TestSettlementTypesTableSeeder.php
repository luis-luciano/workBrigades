<?php
use App\SettlementType;
use Illuminate\Database\Seeder;

class TestSettlementTypesTableSeeder extends Seeder {

	public function run() {

		DB::table('settlement_types')->delete();

		SettlementType::create(array('name' => 'Indefinido',	));
		SettlementType::create(array('name' => 'Colonia',	));
		SettlementType::create(array('name' => 'Localidad',	));
		SettlementType::create(array('name' => 'Barrio',	));
		SettlementType::create(array('name' => 'Ampliacion',	));
		SettlementType::create(array('name' => 'Fraccionamiento',	));
		SettlementType::create(array('name' => 'Condominio',	));
		SettlementType::create(array('name' => 'Rancheria',	));
		SettlementType::create(array('name' => 'Recidencial',	));
		SettlementType::create(array('name' => 'Unidad Habitacional',	));
		
		
	}
}