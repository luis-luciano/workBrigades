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
                'color' => '#f0ad4e',
            ],
            [
                'name' => 'in_process_with_answer',
                'label' => 'En Proceso con respuesta',
                'color' => '#5cb85c',
            ],
            [
                'name' => 'concluded',
                'label' => 'Concluida',
                'color' => '#5bbfde',
            ],
            [
                'name' => 'expired',
                'label' => 'Vencida',
                'color' => '#d9524e',
            ],
            [
                'name' => 'unapproved',
                'label' => 'No Aprobada',
                'color' => '#d9524e',
            ],
        ];
        
        foreach ($requestStates as $requestState) {
            RequestState::create($requestState);
        }
    }
}