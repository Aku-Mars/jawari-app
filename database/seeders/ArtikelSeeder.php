<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artikel;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUserId = \App\Models\User::where('email', 'admin@serangkab.go.id')->first()->id;

        Artikel::create([
            'user_id' => $adminUserId,
            'judul' => 'Contoh Artikel Pertama',
            'penulis' => 'Admin Jawari',
            'views' => 100,
            'file_path' => null,
            'link_youtube' => null,
            'deskripsi' => 'Ini adalah deskripsi untuk contoh artikel pertama. Anda bisa mengganti ini dengan konten artikel yang lebih panjang.',
        ]);

        Artikel::create([
            'user_id' => $adminUserId,
            'judul' => 'Contoh Artikel Kedua',
            'penulis' => 'Admin Jawari',
            'views' => 50,
            'file_path' => null,
            'link_youtube' => 'https://www.youtube.com/watch?v=example2',
            'deskripsi' => 'Ini adalah deskripsi untuk contoh artikel kedua. Anda bisa menambahkan lebih banyak artikel dengan pola yang sama.',
        ]);
    }
}
