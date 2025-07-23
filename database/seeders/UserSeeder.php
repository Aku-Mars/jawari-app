<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_super_admin = Role::create(['name' => 'Super Admin']);
        $role_admin = Role::create(['name' => 'Admin']);
        $role_staf_bidang = Role::create(['name' => 'Staf']);
        $role_admin_bidang = Role::create(['name' => 'Admin Bidang']);

        $super_admin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@serangkab.go.id',
            'password' => bcrypt('12345678'),
        ]);
        $super_admin->assignRole($role_super_admin);

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@serangkab.go.id',
            'password' => bcrypt('11111111'),
        ]);
        $admin->assignRole($role_admin);
    }
}
