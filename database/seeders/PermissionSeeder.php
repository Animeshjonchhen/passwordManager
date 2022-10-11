<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permission

        // app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //create permission

        Permission::create(['name' => 'add category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);
        
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'add password']);
        Permission::create(['name' => 'view password']);
        Permission::create(['name' => 'edit password']);
        Permission::create(['name' => 'delete password']);
        

        //create roles and assign existing permissions

        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('add category');
        $role1->givePermissionTo('edit category');
        $role1->givePermissionTo('edit users');

        $role2 = Role::create(['name' => 'guest']);
        $role2->givePermissionTo('add password');
        $role2->givePermissionTo('view password');

        $role3 = Role::create(['name' => 'maintainer']);
        $role3->givePermissionTo('add password');
        $role3->givePermissionTo('view password');
        $role3->givePermissionTo('edit password');
        $role3->givePermissionTo('delete password');

        $role4 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule;

        // create demo users
         $user = \App\Models\User::factory()->create([
            'name' => 'Example admin',
            'email' => 'testadmin@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example guest',
            'email' => 'guest@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example user',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role4);
    }
}
