<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a specific admin user for login
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // You can change 'password' to a more secure default
        ]);

        // Create 10 other random users
        User::factory(10)->create();

        // Call the other seeders
        $this->call([
            ArtikelSeeder::class,
            GaleriSeeder::class,
            KesenianSeeder::class,
        ]);
    }
}