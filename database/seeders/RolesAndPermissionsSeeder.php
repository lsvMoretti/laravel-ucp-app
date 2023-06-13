<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Create Permissions
        $viewRegistrationPerm = Permission::create(['name' => 'view registrations']);

        // Create Roles and assign created permissions
        $supportRole = Role::create(['name' => 'support']);
        $supportRole->givePermissionTo($viewRegistrationPerm);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($viewRegistrationPerm);

        $seniorRole = Role::create(['name' => 'senior']);
        $seniorRole->givePermissionTo($viewRegistrationPerm);

        $leadRole = Role::create(['name' => 'lead']);
        $leadRole->givePermissionTo($viewRegistrationPerm);

        $managementRole = Role::create(['name' => 'management']);
        $managementRole->givePermissionTo($viewRegistrationPerm);
    }
}
