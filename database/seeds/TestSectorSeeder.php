<?php

use App\Sector;
use Illuminate\Database\Seeder;

class TestSectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
        DB::table('sectors')->delete();

		Sector::create(['number' => '001']);
		Sector::create(['number' => '002']);
		Sector::create(['number' => '003']);
		Sector::create(['number' => '004']);
		
    }
}
