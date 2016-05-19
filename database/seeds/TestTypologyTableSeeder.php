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

		Typology::create(array('id'=> 1, 'name' => 'AGUA',	));
		Typology::create(array('id'=> 2, 'name' => 'DRENAJE',	));
		Typology::create(array('id'=> 3, 'name' => 'BACHEO',	));
		Typology::create(array('id'=> 4, 'name' => 'CULTURA DEL AGUA',	));
		Typology::create(array('id'=> 5, 'name' => 'AREA COMERCIAL',	));
    }
}
