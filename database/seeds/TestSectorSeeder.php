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

		Sector::create(['number' => 1]);
		Sector::create(['number' => 2]);
		Sector::create(['number' => 3]);
		Sector::create(['number' => 4]);
    }
}
