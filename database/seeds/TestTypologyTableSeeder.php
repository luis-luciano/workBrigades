<?php

use App\Typology;
use Illuminate\Database\Seeder;

class TestTypologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typologies')->delete();

		Typology::create(['name' => 'AGUA']);
		Typology::create(['name' => 'DRENAJE']);
		Typology::create(['name' => 'BACHEO']);
		Typology::create(['name' => 'CULTURA DEL AGUA']);
		Typology::create(['name' => 'AREA COMERCIAL']);
        Typology::create(['name' => 'REZAGO']);

        $relations=[
            [    //     Agua
                'supervision_id' => 2,
                'typology_id' => 1,
            ],
            [
                'supervision_id' => 3,
                'typology_id' => 1,
            ],
            

            //  Drenaje
            [
                'supervision_id' => 2,
                'typology_id' => 2, 
            ],
            [
                'supervision_id' => 4,
                'typology_id' => 2, 
            ],
            

            //  Bacheo
            [
                'supervision_id' => 2,
                'typology_id' => 3,
            ],
            [
                'supervision_id' => 3,
                'typology_id' => 3,
            ],
            
            
            //  Area Comercial
            [
                'supervision_id' => 6,
                'typology_id' => 5,
            ],

            //  Rezago
            [
                'supervision_id' => 7,
                'typology_id' => 6,
            ]
        ];

        foreach ($relations as $relation) {
            Typology::find($relation['typology_id'])->supervisions()->attach($relation['supervision_id']);
        }
    }
}