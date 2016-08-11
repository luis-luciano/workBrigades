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
                    'name' => 'Root',
                    'label' => 'Root',
                    'home' => '/',
                ],
                'permissions' => Permission::lists('name')->toArray(),
            ],
            [
                'role' => [
                    'name' => 'Administrator',
                    'label' => 'Administrator',
                    'home' => '/',
                ],
                'permissions' => [
                    'index.brigades',
                    'create.brigades',
                    'store.brigades',
                    'show.brigades',
                    'edit.brigades',
                    'update.brigades',
                    'destroy.brigades',
                    'index.capture_types',
                    'create.capture_types',
                    'store.capture_types',
                    'show.capture_types',
                    'edit.capture_types',
                    'update.capture_types',
                    'destroy.capture_types',
                    'index.citizens',
                    'create.citizens',
                    'store.citizens',
                    'show.citizens',
                    'edit.citizens',
                    'update.citizens',
                    'destroy.citizens',
                    'index.colonies',
                    'create.colonies',
                    'store.colonies',
                    'show.colonies',
                    'edit.colonies',
                    'update.colonies',
                    'destroy.colonies',
                    'index.colony_scopes',
                    'create.colony_scopes',
                    'store.colony_scopes',
                    'show.colony_scopes',
                    'edit.colony_scopes',
                    'update.colony_scopes',
                    'destroy.colony_scopes',
                    'index.permissions',
                    'index.problem_types',
                    'create.problem_types',
                    'store.problem_types',
                    'show.problem_types',
                    'edit.problem_types',
                    'update.problem_types',
                    'destroy.problem_types',
                    'index.request_priorities',
                    'create.request_priorities',
                    'store.request_priorities',
                    'show.request_priorities',
                    'edit.request_priorities',
                    'update.request_priorities',
                    'destroy.request_priorities',
                    'index.request_rejections',
                    'create.request_rejections',
                    'store.request_rejections',
                    'show.request_rejections',
                    'edit.request_rejections',
                    'update.request_rejections',
                    'destroy.request_rejections',
                    'index.request_states',
                    'create.request_states',
                    'store.request_states',
                    'show.request_states',
                    'edit.request_states',
                    'update.request_states',
                    'destroy.request_states',
                    'index.requests',
                    'create.requests',
                    'store.requests',
                    'show.requests',
                    'edit.requests',
                    'update.requests',
                    'destroy.requests',
                    'index.sectors',
                    'create.sectors',
                    'store.sectors',
                    'show.sectors',
                    'edit.sectors',
                    'update.sectors',
                    'destroy.sectors',
                    'index.settlement_types',
                    'create.settlement_types',
                    'store.settlement_types',
                    'show.settlement_types',
                    'edit.settlement_types',
                    'update.settlement_types',
                    'destroy.settlement_types',
                    'index.supervisions',
                    'create.supervisions',
                    'store.supervisions',
                    'show.supervisions',
                    'update.supervisions',
                    'index.typologies',
                    'create.typologies',
                    'store.typologies',
                    'show.typologies',
                    'edit.typologies',
                    'update.typologies',
                    'destroy.typologies',
                    'index.users',
                    'index.request_types',
                    'create.request_types',
                    'store.request_types',
                    'show.request_types',
                    'edit.request_types',
                    'update.request_types',
                    'destroy.request_types',
                ],
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
                ],
                'role' => [
                    'name' => 'usuario',
                    'label' => 'usuario',
                    'home' => '/',
                ],
                'permissions' => [
                    'create.requests',
                ],
            ],
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
