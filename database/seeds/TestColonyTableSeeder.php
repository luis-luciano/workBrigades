<?php
use App\Colony;
use App\ColonyScope;
use App\Sector;
use App\SettlementType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TestColonyTableSeeder extends Seeder {

	public function run() {
	
	DB::table('colonies')->delete();
			
		$colonies = json_decode(Storage::disk('seeds')->get('colonies.json'), true);

        foreach ($colonies as $colony) {
            
            
            $point = new Colony;
			$point->zip = $colony['zip'];
			$point->name = $colony['name'];
			$point->save();
            $point->colonyScope()->associate(ColonyScope::find($colony['colony_scope_id']))->save();
			$point->settlementType()->associate(SettlementType::find($colony['settlement_type_id']))->save();
			$point->sector()->associate(Sector::find($colony['sector_id']))->save();
			
        }
}
}