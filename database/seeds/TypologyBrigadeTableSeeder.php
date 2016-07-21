<?php

use Illuminate\Database\Seeder;
use App\Brigade;

class TypologyBrigadeTableSeeder extends Seeder
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
        		'typology_id' => 1,
        		'brigade_id' =>  3
        	],
        	[
        		'typology_id' => 1,
        		'brigade_id' =>  6
        	],
        	[
        		'typology_id' => 1,
        		'brigade_id' =>  5
        	],
        	[
        		'typology_id' => 1,
        		'brigade_id' =>  4
        	],
        	[
        		'typology_id' => 1,
        		'brigade_id' =>  2
        	],
        	[
        		'typology_id' => 2,
        		'brigade_id' =>  7
        	],
        	[
        		'typology_id' => 2,
        		'brigade_id' =>  8
        	],
        	[
        		'typology_id' => 2,
        		'brigade_id' =>  2
        	],
        	[
        		'typology_id' => 3,
        		'brigade_id' =>  1
        	],
        	[
        		'typology_id' => 3,
        		'brigade_id' =>  2
        	],
        ];

        foreach($relations as $relation){
        	Brigade::find($relation['brigade_id'])->typologies()->attach($relation['typology_id']);
        }
    }
}
