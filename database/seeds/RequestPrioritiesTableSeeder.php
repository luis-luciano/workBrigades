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
                'color' => '#f34235',
            ],
            [
                'name' => 'Normal',
                'color' => '#f39c12',
            ],
            [
                'name' => 'Baja',
                'color' => '#009587',
            ],
        ];

        foreach ($requestPriorities as $requestPriority) {
            RequestPriority::create($requestPriority);
        }
    }
}
