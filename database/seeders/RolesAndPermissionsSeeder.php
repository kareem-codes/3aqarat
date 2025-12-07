<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $propertyPermissions = [
            'view_properties',
            'create_properties',
            'edit_properties',
            'delete_properties',
        ];

        $projectPermissions = [
            'view_projects',
            'create_projects',
            'edit_projects',
            'delete_projects',
        ];

        $agentPermissions = [
            'view_agents',
            'create_agents',
            'edit_agents',
            'delete_agents',
        ];

        $leadPermissions = [
            'view_leads',
            'create_leads',
            'edit_leads',
            'delete_leads',
        ];

        $userPermissions = [
            'view_users',
            'create_users',
            'edit_users',
            'delete_users',
        ];

        $rolePermissions = [
            'view_roles',
            'create_roles',
            'edit_roles',
            'delete_roles',
        ];

        $permissionPermissions = [
            'view_permissions',
            'create_permissions',
            'edit_permissions',
            'delete_permissions',
        ];

        $allPermissions = array_merge(
            $propertyPermissions,
            $projectPermissions,
            $agentPermissions,
            $leadPermissions,
            $userPermissions,
            $rolePermissions,
            $permissionPermissions
        );

        foreach ($allPermissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $superAdmin = Role::create(['name' => 'Super Admin']);
        $superAdmin->givePermissionTo(Permission::all());

        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo(array_merge(
            $propertyPermissions,
            $projectPermissions,
            $agentPermissions,
            $leadPermissions
        ));

        $propertyManager = Role::create(['name' => 'Property Manager']);
        $propertyManager->givePermissionTo(array_merge(
            $propertyPermissions,
            $leadPermissions,
            ['view_projects', 'view_agents']
        ));

        $agent = Role::create(['name' => 'Agent']);
        $agent->givePermissionTo([
            'view_properties',
            'view_projects',
            'view_agents',
            'view_leads',
            'edit_leads',
        ]);

        $viewer = Role::create(['name' => 'Viewer']);
        $viewer->givePermissionTo([
            'view_properties',
            'view_projects',
            'view_agents',
            'view_leads',
        ]);

        $this->command->info('Roles and permissions created successfully!');
    }
}
