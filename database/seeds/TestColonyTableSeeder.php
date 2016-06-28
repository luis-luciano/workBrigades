<?php
use App\Colony;
use App\ColonyScope;
use App\SettlementType;
use Illuminate\Database\Seeder;

class TestColonyTableSeeder extends Seeder {

	public function run() {
	DB::table('colonies')->delete();
	$colonyScope=ColonyScope::find(1);
	$settlementTypes=SettlementType::find(1);

		//Colony::create(array('zip' =>'94500' ,'name' => '', 'colony_scope_id' => 1, 'settlement_type_id' => 1,	));
		
		Colony::create(array('zip' =>'94500' ,'name' => 'ZONA INDUSTRIAL                    ','sector_id'=>1));	

		$colonies=Colony::all();
		foreach ($colonies as $colony) {
			$colony->colonyScopes()->associate(ColonyScope::find(1))->save();
			$colony->settlementTypes()->associate(SettlementType::find(1))->save();
		}
}
}