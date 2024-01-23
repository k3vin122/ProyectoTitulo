<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list cintas']);
        Permission::create(['name' => 'view cintas']);
        Permission::create(['name' => 'create cintas']);
        Permission::create(['name' => 'update cintas']);
        Permission::create(['name' => 'delete cintas']);

        Permission::create(['name' => 'list empresas']);
        Permission::create(['name' => 'view empresas']);
        Permission::create(['name' => 'create empresas']);
        Permission::create(['name' => 'update empresas']);
        Permission::create(['name' => 'delete empresas']);

        Permission::create(['name' => 'list estadomovimientos']);
        Permission::create(['name' => 'view estadomovimientos']);
        Permission::create(['name' => 'create estadomovimientos']);
        Permission::create(['name' => 'update estadomovimientos']);
        Permission::create(['name' => 'delete estadomovimientos']);

        Permission::create(['name' => 'list estadorotulos']);
        Permission::create(['name' => 'view estadorotulos']);
        Permission::create(['name' => 'create estadorotulos']);
        Permission::create(['name' => 'update estadorotulos']);
        Permission::create(['name' => 'delete estadorotulos']);

        Permission::create(['name' => 'list estadosnrotulos']);
        Permission::create(['name' => 'view estadosnrotulos']);
        Permission::create(['name' => 'create estadosnrotulos']);
        Permission::create(['name' => 'update estadosnrotulos']);
        Permission::create(['name' => 'delete estadosnrotulos']);

        Permission::create(['name' => 'list ingresocintasnrotulos']);
        Permission::create(['name' => 'view ingresocintasnrotulos']);
        Permission::create(['name' => 'create ingresocintasnrotulos']);
        Permission::create(['name' => 'update ingresocintasnrotulos']);
        Permission::create(['name' => 'delete ingresocintasnrotulos']);

        Permission::create(['name' => 'list movimientos']);
        Permission::create(['name' => 'view movimientos']);
        Permission::create(['name' => 'create movimientos']);
        Permission::create(['name' => 'update movimientos']);
        Permission::create(['name' => 'delete movimientos']);

        Permission::create(['name' => 'list responsables']);
        Permission::create(['name' => 'view responsables']);
        Permission::create(['name' => 'create responsables']);
        Permission::create(['name' => 'update responsables']);
        Permission::create(['name' => 'delete responsables']);

        Permission::create(['name' => 'list rotulos']);
        Permission::create(['name' => 'view rotulos']);
        Permission::create(['name' => 'create rotulos']);
        Permission::create(['name' => 'update rotulos']);
        Permission::create(['name' => 'delete rotulos']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
