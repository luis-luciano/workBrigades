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
                    'index.brigades',
                    'index.capture_types',
                    'index.citizens',
                    'index.colonies',
                    'index.colony_scopes',
                    'index.problem_types',
                    'index.request_priorities',
                    'index.request_states',
                    'index.sectors',
                    'index.settlement_types',
                    'index.typologies',
                    'index.request_types',
                    'config.colonies',
                    'config.requests',
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
                    'config.requests',
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
