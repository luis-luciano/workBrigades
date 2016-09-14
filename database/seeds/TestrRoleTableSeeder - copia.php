<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class TestRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $roles = [
            [
                'role' => [
                    'name' => 'administrator',
                    'label' => 'Administrador',
                    'home' => '/',
                ],
                'permissions' => Permission::lists('name')->toArray(),
            ],
            [
                'role' => [
                    'name' => 'supervisor',
                    'label' => 'Supervisor',
                    'home' => '/',
                ],
                'permissions' => [
                    'index.requests',
                    'create.requests',
                    'edit.requests',
                    'update.requests',
                    'index.citizens',
                    
                ],
            ],
            [
                'role' => [
                    'name' => 'operator',
                    'label' => 'Operador',
                    'home' => '/',
                ],
                'permissions' => [
                    'index.requests',
                    'create.requests',
                    'store.requests',
                    'show.requests',
                    'edit.requests',
                    'update.requests',
                    'index.brigades',
                    'create.brigades',
                    'store.brigades',
                    'show.brigades',
                    'edit.brigades',
                    'update.brigades',
                    'destroy.brigades',
                    'config.requests',
                    'index.colonies',
                    'create.colonies',
                    'store.colonies',
                    'edit.colonies',
                    'update.colonies',
                    'destroy.colonies',
                    'config.colonies',
                    'index.citizens',
                    'create.citizens',
                    'store.citizens',
                    'show.citizens',
                    'edit.citizens',
                    'update.citizens',
                    'destroy.citizens',
                    'index.colony_scopes',
                    'create.colony_scopes',
                    'store.colony_scopes',
                    'show.colony_scopes',
                    'edit.colony_scopes',
                    'update.colony_scopes',
                    'destroy.colony_scopes',
                    'index.settlement_types',
                    'create.settlement_types',
                    'store.settlement_types',
                    'show.settlement_types',
                    'edit.settlement_types',
                    'update.settlement_types',
                    'destroy.settlement_types',
                    'index.sectors',
                    'create.sectors',
                    'store.sectors',
                    'show.sectors',
                    'edit.sectors',
                    'update.sectors',
                    'destroy.sectors',
                    'index.problem_types',
                    'create.problem_types',
                    'store.problem_types',
                    'edit.problem_types',
                    'update.problem_types',
                    'destroy.problem_types',
                    'configurations.options',
                ],
            ],
            [
                'role' => [
                    'name' => 'citizen',
                    'label' => 'Ciudadano',
                    'home' => '/',
                ],
                'permissions' => [
                    'index.requests',
                    'create.requests',
                    'store.requests',
                ],
            ]
        ];

        foreach ($roles as $role) {
            $newRole = Role::create($role['role']);
            foreach ($role['permissions'] as $permission) {
                $newRole->givePermissionTo(Permission::where('name', $permission)->first());
            }
            
        }
        //php artisan db:seed --class=TestPermissionsTableSeeder
        //php artisan db:seed --class=TestRoleTableSeeder




    }
}
