<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kesenian;

class KesenianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 kesenian items using the factory
        Kesenian::factory()->count(4)->create();
    }
}
