<?php
use App\SettlementType;
use Illuminate\Database\Seeder;

class TestSettlementTypesTableSeeder extends Seeder {

	public function run() {

		DB::table('settlement_types')->delete();

		SettlementType::create(['name' => 'Indefinido']);  		//1	  
		SettlementType::create(['name' => 'Colonia']);			//2  
		SettlementType::create(['name' => 'Localidad']);		//3	  
		SettlementType::create(['name' => 'Barrio']);			//4  
		SettlementType::create(['name' => 'Ampliacion']);		//5	  
		SettlementType::create(['name' => 'Fraccionamiento']);	//6		  
		SettlementType::create(['name' => 'Condominio']);		//7	  
		SettlementType::create(['name' => 'Rancheria']);		//8	  
		SettlementType::create(['name' => 'Unidad Habitacional']);		//9	  
		SettlementType::create(['name' => 'Congregacion']);		//10	  
		SettlementType::create(['name' => 'Residencial']);		//11	  
		SettlementType::create(['name' => 'Ejido']);			//12  
		SettlementType::create(['name' => 'Comunidad']);		//13	  
		SettlementType::create(['name' => 'Infonavit']);		//14	  
		SettlementType::create(['name' => 'Boulevard']);		//15	  
					  

	}
}