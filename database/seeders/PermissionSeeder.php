<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'permission_create',
            'permission_edit',
            'permission_show',
            'permission_delete',
            'permission_access',

            'role_create',
            'role_edit',
            'role_show',
            'role_delete',
            'role_access',

            'user_create',
            'user_edit',
            'user_show',
            'user_delete',
            'user_access',

            'category_create',
            'category_edit',
            'category_show',
            'category_delete',
            'category_access',

            'post_create',
            'post_edit',
            'post_show',
            'post_delete',
            'post_access',

            'payment_create',
            'payment_edit',
            'payment_show',
            'payment_delete',
            'payment_access',

            'report_access',
            'transaction_access',
            'user_management_access',
        ];

        foreach ($permissions as $permission)   {
            Permission::create([
                'name' => $permission
            ]);
        }

        // assign all permissions to Admin role
        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo(Permission::all());

        // Assistant role
        $assistant = Role::create(['name' => 'Assistant']);
        $assistantPermissions = [
            'post_create',
            'post_edit',
            'post_show',
            'post_delete',
            'post_access',

            'report_access',
            'transaction_access',
        ];

        foreach ($assistantPermissions as $permission)   {
            $assistant->givePermissionTo($permission);
        }

    }
}
