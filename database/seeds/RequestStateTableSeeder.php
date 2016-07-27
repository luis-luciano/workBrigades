<?php

use Illuminate\Database\Seeder;
use App\RequestState;
class RequestStateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$requestStates = [
            [
                'name' => 'in_process',
                'label' => 'En Proceso',
                'color' => '#2095f2',
            ],
            [
                'name' => 'in_process_with_answer',
                'label' => 'En Proceso con respuesta',
                'color' => '#009587',
            ],
            [
                'name' => 'concluded',
                'label' => 'Concluida',
                'color' => '#4bae4f',
            ],
            [
                'name' => 'expired',
                'label' => 'Vencida',
                'color' => '#f39c12',
            ],
            [
                'name' => 'unapproved',
                'label' => 'No Aprobada',
                'color' => '#f34235',
            ],
        ];
        
        foreach ($requestStates as $requestState) {
            RequestState::create($requestState);
        }
    }
}