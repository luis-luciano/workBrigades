<?php

use Illuminate\Database\Seeder;
use App\Sector;

class SectorBrigadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relations=[
        	[
        		'sector_id' => 1,
        		'brigade_id' => 8,
                'is_default_brigade' => false
        	],
        	[
        		'sector_id' => 2,
        		'brigade_id' => 8,
                'is_default_brigade' => false
        	],
        	[
        		'sector_id' => 3,
        		'brigade_id' => 8,
                'is_default_brigade' => false
        	],
        	[
        		'sector_id' => 4,
        		'brigade_id' => 8,
                'is_default_brigade' => false
        	],
        	[
        		'sector_id' => 1,
        		'brigade_id' => 2,
                'is_default_brigade' => false
        	],
        	[
        		'sector_id' => 2,
        		'brigade_id' => 2,
                'is_default_brigade' => false
        	],
        	[
        		'sector_id' => 3,
        		'brigade_id' => 2,
                'is_default_brigade' => false
        	],
        	[
        		'sector_id' => 4,
        		'brigade_id' => 2,
                'is_default_brigade' => false
        	],
        ];

        

        foreach($relations as $relation){
        	Sector::find($relation['sector_id'])->brigades()->attach($relation['brigade_id'],['is_default_brigade'=>$relation['is_default_brigade']]);
        }
    }
}
