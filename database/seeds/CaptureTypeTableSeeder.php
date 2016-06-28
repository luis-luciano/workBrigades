<?php

use App\CaptureType;
use Illuminate\Database\Seeder;

class CaptureTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('capture_types')->delete();

        $captureTypes = [
            [
                'name' => 'Atención En Oficina De Enlace',
                'color' => '#2da7cc',
            ],
            [
                'name' => 'Atención En Móvil',
                'color' => '#94c8d8',
            ],
        ];

        foreach ($captureTypes as $captureType) {
            CaptureType::create($captureType);
        }
    }
}