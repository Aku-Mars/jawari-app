<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUserId = \App\Models\User::where('email', 'admin@serangkab.go.id')->first()->id;

        Galeri::create([
            'user_id' => $adminUserId,
            'file_path' => 'galeri-images/galeri_contoh_1.jpg', // Path relatif dari storage/app/public
            'deskripsi' => 'Foto pemandangan indah dari pegunungan yang diunggah dari lokal.',
            'status' => true,
        ]);

        Galeri::create([
            'user_id' => $adminUserId,
            'file_path' => 'galeri-images/galeri_contoh_2.png', // Path relatif dari storage/app/public
            'deskripsi' => 'Acara budaya lokal yang meriah, diunggah dari lokal.',
            'status' => true,
        ]);
    }
}
