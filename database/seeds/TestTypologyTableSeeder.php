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
    }
}
