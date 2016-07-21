<?php

use Illuminate\Database\Seeder;
use App\RequestType;
class RequestTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$requestTypes = [
            [
                'name' => 'Invitación',
                'color' => '#5714A9',
            ],
            [
                'name' => 'Petición',
                'color' => '#180CC6',
            ],
            [
                'name' => 'Queja',
                'color' => '#0B58B0',
            ],
            [
                'name' => 'Correspondencia Interna',
                'color' => '#09A8C4',
            ],
            [
                'name' => 'Reportes Internos',
                'color' => '#0BD76A',
            ],
            [
                'name' => 'Dep. De Gobierno',
                'color' => '#C4D20A',
            ],
            [
                'name' => 'Correspondencia General',
                'color' => '#BE770C',
            ],
            [
                'name' => 'Agradecimiento',
                'color' => '#C64007',
            ],
            [
                'name' => 'Reporte ciudadano por aplicación móvil',
                'color' => '#BE067A',
            ],
        ];

        foreach ($requestTypes as $requestType) {
            RequestType::create($requestType);
        }
    }
}