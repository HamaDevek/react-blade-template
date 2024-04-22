<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Support Panel',
            'email' => 'demo@database.krd',
            'password' => bcrypt('demo@database.krd'),
        ]);
        $role = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        // get model has roles table
        $user->assignRole($role);

        $permission = Permission::create(
            [
                'name' => 'roles',
                'guard_name' => 'web',
            ]
        );
        $role->givePermissionTo($permission);

        $permission = Permission::create(
            [
                'name' => 'users',
                'guard_name' => 'web',
            ]
        );
        $role->givePermissionTo($permission);
    }
}
