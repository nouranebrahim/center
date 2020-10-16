<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        //
        Permission::create(['name' => 'adminpermission']);
        Permission::create(['name' => 'studentpermission']);
       

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'student']);
        $role->givePermissionTo('studentpermission');
        
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('adminpermission');

    }
}
