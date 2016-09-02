<?php

use App\Permission;
use Illuminate\Database\Seeder;

class TestPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultActions = collect([
        	'index' => 'See All', 
        	'create' => 'Create', 
        	'store' => 'Store', 
        	'show' => 'View', 
        	'edit' => 'Edit',
        	'update' => 'Update', 
        	'destroy' => 'Delete']);

        $entitiesTables = collect([
            'brigades',
			'capture_types',
			'citizens',
			'colonies',
			'colony_scopes',
			'permissions',
			'problem_types',
			'request_priorities',
			'request_rejections',
			'request_states',
			'requests',
			'roles',
			'sectors',
			'settlement_types',
			'supervisions',
			'typologies',
			'users',
            'request_types',
        ]);

        foreach ($entitiesTables as $entity) {
            foreach ($defaultActions as $action => $actionDescription) {
                Permission::create([
                    'label' => $actionDescription.' '.studly_case($entity),
                    'name' => $action.'.'.$entity,
                ]);
            }
        }

        Permission::create([
                    'label' => 'Configurar Colonies',
                    'name' => 'config.colonies'
                ]);
        Permission::create([
                    'label' => 'Configurar Requests',
                    'name' => 'config.requests',
                ]);
    }
}
