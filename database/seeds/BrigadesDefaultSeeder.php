<?php

use Illuminate\Database\Seeder;
use App\Sector;

class BrigadesDefaultSeeder extends Seeder
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
                'typology_id' => 1,
            ],
            [
                'sector_id' => 2,
                'brigade_id' => 6,
                'typology_id' => 1
            ],
            [
                'sector_id' => 3,
                'brigade_id' => 5,
                'typology_id' => 1
            ],
            [
                'sector_id' => 4,
                'brigade_id' => 4,
                'typology_id' => 1
            ],
            [
                'sector_id' => 1,
                'brigade_id' => 7,
                'typology_id' => 2
            ],
            [
                'sector_id' => 2,
                'brigade_id' => 7,
                'typology_id' => 2
            ],
            [
                'sector_id' => 3,
                'brigade_id' => 7,
                'typology_id' => 2
            ],
            [
                'sector_id' => 4,
                'brigade_id' => 7,
                'typology_id' => 2
            ],
            [
                'sector_id' => 1,
                'brigade_id' => 1,
                'typology_id' => 3
            ],
            [
                'sector_id' => 2,
                'brigade_id' => 1,
                'typology_id' => 3
            ],
            [
                'sector_id' => 3,
                'brigade_id' => 1,
                'typology_id' => 3
            ],
            [
                'sector_id' => 4,
                'brigade_id' => 1,
                'typology_id' => 3
            ]
        ];
        foreach($relations as $relation){
            Sector::find($relation['sector_id'])->brigadesByTypology()->attach($relation['brigade_id'],['typology_id' => $relation['typology_id']]);
        }
    }
}
