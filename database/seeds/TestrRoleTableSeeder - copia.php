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
                    'name' => 'admin',
                    'label' => 'Administrator',
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
                    'edit.requests',
                    'update.requests',
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
