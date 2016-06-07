<?php

use App\RequestPriority;
use Illuminate\Database\Seeder;

class RequestPrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requestPriorities = [
            [
                'name' => 'Alta',
                'color' => '#337ab7',
            ],
            [
                'name' => 'Normal',
                'color' => '#2da7cc',
            ],
            [
                'name' => 'Baja',
                'color' => '#94c8d8',
            ],
        ];

        foreach ($requestPriorities as $requestPriority) {
            RequestPriority::create($requestPriority);
        }
    }
}
