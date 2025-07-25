<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;
use Illuminate\Support\Facades\File;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUserId = \App\Models\User::where('email', 'admin@serangkab.go.id')->first()->id;
        $gambarPath = storage_path('app/public/gambar');

        $deskripsi = [
            "Para penari menampilkan gerakan yang anggun dan penuh makna dalam Lomba Tari Klasik Walijamaliha.",
            "Ekspresi wajah seorang penari yang mendalami perannya di atas panggung.",
            "Detail kostum tradisional yang indah dan berwarna-warni dari salah satu peserta lomba.",
            "Suasana meriah di Alun-Alun Kabupaten Serang saat acara pembukaan.",
            "Juri sedang memberikan penilaian kepada salah satu grup tari yang tampil memukau.",
            "Antusiasme penonton yang memadati area pertunjukan untuk menyaksikan bakat-bakat muda.",
            "Gerakan kompak para penari yang menciptakan harmoni visual yang menakjubkan.",
            "Momen di belakang panggung, para peserta mempersiapkan diri sebelum tampil.",
            "Salah satu penari cilik dengan kostum lengkap, siap untuk menunjukkan kebolehannya.",
            "Keindahan dan kekayaan budaya Banten yang direpresentasikan melalui seni tari.",
            "Penampilan energik dari grup tari modern yang turut memeriahkan acara.",
            "Pemenang lomba berfoto bersama dengan para juri dan panitia.",
            "Wawancara dengan salah satu peserta mengenai persiapannya mengikuti lomba.",
            "Potret salah satu penari dengan riasan wajah khas yang menawan."
        ];

        if (File::isDirectory($gambarPath)) {
            $files = File::files($gambarPath);

            foreach ($files as $key => $file) {
                Galeri::create([
                    'user_id' => $adminUserId,
                    'file_path' => 'gambar/' . $file->getFilename(),
                    'deskripsi' => $deskripsi[$key] ?? 'Deskripsi untuk gambar ' . ($key + 1),
                    'status' => true,
                ]);
            }
        }
    }
}
