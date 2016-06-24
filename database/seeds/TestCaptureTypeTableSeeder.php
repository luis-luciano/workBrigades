<?php

use App\CaptureType;
use Illuminate\Database\Seeder;

class TestCaptureTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('capture_types')->delete();

		CaptureType::create(['name' => 'ESCRITORIO']);
		CaptureType::create(['name' => 'MOVIL']);
		CaptureType::create(['name' => 'VENTANILLA']);
		CaptureType::create(['name' => 'ATENCION PRESENCIAL']);
    }
}