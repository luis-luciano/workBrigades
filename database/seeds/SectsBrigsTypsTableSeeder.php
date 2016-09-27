<?php

use Illuminate\Database\Seeder;
use App\Sector;
use App\Brigade;

class SectsBrigsTypsTableSeeder extends Seeder
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
                'brigade_id' => 2,
                'typology_id' => 1,
            ],
            [
                'sector_id' => 2,
                'brigade_id' => 2,
                'typology_id' => 1
            ],
            [
                'sector_id' => 3,
                'brigade_id' => 2,
                'typology_id' => 1
            ],
            [
                'sector_id' => 4,
                'brigade_id' => 2,
                'typology_id' => 1
            ],
            [
                'sector_id' => 1,
                'brigade_id' => 8,
                'typology_id' => 2
            ],
            [
                'sector_id' => 2,
                'brigade_id' => 8,
                'typology_id' => 2
            ],
            [
                'sector_id' => 3,
                'brigade_id' => 8,
                'typology_id' => 2
            ],
            [
                'sector_id' => 4,
                'brigade_id' => 8,
                'typology_id' => 2
            ],
			[
                'sector_id' => 1,
                'brigade_id' => 2,
                'typology_id' => 2
            ],
            [
                'sector_id' => 2,
                'brigade_id' => 2,
                'typology_id' => 2
            ],
            [
                'sector_id' => 3,
                'brigade_id' => 2,
                'typology_id' => 2
            ],
            [
                'sector_id' => 4,
                'brigade_id' => 2,
                'typology_id' => 2
            ]

        ];
        foreach($relations as $relation){
            Sector::find($relation['sector_id'])->brigades()->attach($relation['brigade_id'],['typology_id' => $relation['typology_id']]);
        }
    }
}

    
