<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permissions
        Permission::firstOrCreate(['name' => 'create-user']);
        Permission::firstOrCreate(['name' => 'edit-user']);
        // ... add more user-related permissions

        Permission::firstOrCreate(['name' => 'create_bidding']);
        Permission::firstOrCreate(['name' => 'edit_bidding']);
        Permission::firstOrCreate(['name' => 'view_bidding']); // Or use Spatie's default 'view'
        Permission::firstOrCreate(['name' => 'delete_bidding']);

        // ... similarly add permissions for 'vendors' and 'contracts'

        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $procurementManagerRole = Role::firstOrCreate(['name' => 'procurement_manager']); // Add this line
        Role::firstOrCreate(['name' => 'purchase_manager']);
        Role::firstOrCreate(['name' => 'inventory_manager']);
        Role::firstOrCreate(['name' => 'staff']);

        // Assign permissions (your existing code should work now)
        $superAdminRole->givePermissionTo(Permission::all());

        // Example:
        $procurementManagerRole->givePermissionTo([
            'create_bidding', 'edit_bidding', 'view_bidding',
            // ... assign vendor and contract permissions
        ]);

        // ... assign permissions to other roles
    }
}
