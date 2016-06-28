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
        		'brigade_id' => 3,
        	],
        	[
        		'sector_id' => 2,
        		'brigade_id' => 6,
        	],
        	[
        		'sector_id' => 3,
        		'brigade_id' => 5,
        	],
        	[
        		'sector_id' => 4,
        		'brigade_id' => 4,
        	],
        	[
        		'sector_id' => 1,
        		'brigade_id' => 7,
        	],
        	[
        		'sector_id' => 2,
        		'brigade_id' => 7,
        	],
        	[
        		'sector_id' => 3,
        		'brigade_id' => 7,
        	],
        	[
        		'sector_id' => 4,
        		'brigade_id' => 7,
        	],
        	[
        		'sector_id' => 1,
        		'brigade_id' => 8,
        	],
        	[
        		'sector_id' => 2,
        		'brigade_id' => 8,
        	],
        	[
        		'sector_id' => 3,
        		'brigade_id' => 8,
        	],
        	[
        		'sector_id' => 4,
        		'brigade_id' => 8,
        	],
        	[
        		'sector_id' => 1,
        		'brigade_id' => 1,
        	],
        	[
        		'sector_id' => 2,
        		'brigade_id' => 1,
        	],
        	[
        		'sector_id' => 3,
        		'brigade_id' => 1,
        	],
        	[
        		'sector_id' => 4,
        		'brigade_id' => 1,
        	],
        	[
        		'sector_id' => 1,
        		'brigade_id' => 2,
        	],
        	[
        		'sector_id' => 2,
        		'brigade_id' => 2,
        	],
        	[
        		'sector_id' => 3,
        		'brigade_id' => 2,
        	],
        	[
        		'sector_id' => 4,
        		'brigade_id' => 2,
        	],
        ];

        foreach($relations as $relation){
        	Sector::find($relation['sector_id'])->brigades()->attach($relation['brigade_id']);
        }

    }
}
