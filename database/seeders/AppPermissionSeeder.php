<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AppPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $default_user_value = [
            'email_verified_at' => now(),
            'password' => 'password',
            'remember_token' => Str::random(10),
        ];

        $superAdminUser = User::create(array_merge([
            'name' => 'Reno Nugraha',
            'email' => 'reno@rn.com',
        ], $default_user_value));

        $superAdminRole              = Role::create(['name' => User::SUPERADMIN_ROLE]);
        $adminRole                   = Role::create(['name' => User::ADMIN_ROLE]);
        $readerRole                  = Role::create(['name' => User::READER_ROLE]);

        $authorities = config('permission.authorities');

        $listPermission       = [];
        $superAdminPermission = [];

        foreach ($authorities as $label => $permissions) {
            foreach ($permissions as $permission) {
                $listPermission[] = [
                    'name'       => $permission,
                    'guard_name' => 'web',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                $superAdminPermission[] = $permission;
            }
        }

        Permission::insert($listPermission);
        $superAdminRole->syncPermissions($superAdminPermission);
        $superAdminUser->syncRoles(User::SUPERADMIN_ROLE);
    }
}
