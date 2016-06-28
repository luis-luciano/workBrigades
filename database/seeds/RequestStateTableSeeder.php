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
                'colour' => '#f0ad4e',
            ],
            [
                'name' => 'in_process_with_answer',
                'label' => 'En Proceso con respuesta',
                'colour' => '#5cb85c',
            ],
            [
                'name' => 'concluded',
                'label' => 'Concluida',
                'colour' => '#5bbfde',
            ],
            [
                'name' => 'expired',
                'label' => 'Vencida',
                'colour' => '#d9524e',
            ],
            [
                'name' => 'unapproved',
                'label' => 'No Aprobada',
                'colour' => '#d9524e',
            ],
        ];
        
        foreach ($requestStates as $requestState) {
            RequestState::create($requestState);
        }
    }
}