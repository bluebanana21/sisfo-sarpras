<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $createPermission = Permission::create(['name' => 'create item']);
        $editPermission = Permission::create(['name' => 'edit item']);
        $deletePermission = Permission::create(['name' => 'delete item']);
        $requestPermission = Permission::create(['name' => 'request item']);

        $adminRole->givePermissionTo($createPermission);
        $adminRole->givePermissionTo($editPermission);
        $adminRole->givePermissionTo($deletePermission);

        $userRole->givePermissionTo($requestPermission);

    }
}
