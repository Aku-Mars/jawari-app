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
            'judul' => 'Wisatawan Antusias Ikuti Workshop Tari Tradisional di Desa Wisata Cikolelet',
            'penulis' => 'Admin',
            'views' => 10,
            'file_path' => 'gambar/tari.jpg',
            'link_youtube' => null,
            'deskripsi' => 'Tari Walijamaliha adalah salah satu tari tradisional khas Banten yang sarat makna religius dan filosofi hidup. Tarian ini berasal dari daerah Lebak, Banten Selatan, dan berkembang di kalangan masyarakat yang memadukan budaya lokal dengan nilai-nilai Islam. Nama “Walijamaliha” sendiri diyakini berasal dari kata-kata Arab: wali, jamal, dan ilahiyah, yang jika diartikan bebas menggambarkan seorang kekasih Tuhan yang memancarkan keindahan dan keluhuran spiritual.

Tari ini ditarikan secara berkelompok oleh para perempuan dengan gerakan yang lembut, anggun, dan penuh kehati-hatian. Gerakannya tidak eksplosif, tetapi justru menyiratkan keheningan batin, kesabaran, dan kerendahan hati. Penari biasanya mengenakan busana panjang berwarna putih atau lembut dengan kerudung, mencerminkan kesucian dan keteduhan jiwa. Musik pengiringnya pun bersifat tenang dan mendayu, sering kali menggunakan rebana dan lantunan syair bernada puji-pujian atau zikir.

Tari Walijamaliha tidak sekadar pertunjukan estetika, melainkan menjadi bagian dari ekspresi keagamaan dan bentuk dakwah yang halus. Ia biasa ditampilkan dalam acara keagamaan, peringatan hari besar Islam, pengajian budaya, hingga sambutan tamu kehormatan di wilayah Lebak dan sekitarnya. Di balik setiap gerakan, terdapat ajakan untuk mengingat Tuhan, menghargai sesama, dan menjaga nilai-nilai kesederhanaan hidup.

Tarian ini menjadi bukti bahwa di Banten, seni dan spiritualitas berjalan beriringan. Walau disampaikan dalam bentuk tari, maknanya sangat dalam dan menyentuh kalbu. Tari Walijamaliha adalah cermin kelembutan perempuan Banten yang menari bukan hanya untuk dilihat, tapi untuk dirasakan maknanya.',
        ]);

        Artikel::create([
            'user_id' => $adminUserId,
            'judul' => 'Tarian Kreasi Baru dari Banten yang Terinspirasi dari Semangat Kepahlawanan',
            'penulis' => 'Admin',
            'views' => 50,
            'file_path' => 'gambar/kreasi.jpg',
            'link_youtube' => null,
            'deskripsi' => 'Tarian ini merupakan hasil inovasi seni yang menggambarkan semangat kepahlawanan masyarakat Banten dalam balutan gerakan tari yang dinamis dan ekspresif. Para penari tampil memukau dengan kostum tradisional berwarna cerah, membawa alat musik tradisional seperti bedug besar yang menjadi simbol kekuatan dan keberanian. Pertunjukan ini diselenggarakan di atas panggung modern yang dilengkapi pencahayaan warna-warni, menambah suasana megah dan penuh energi.

Melalui koreografi yang kuat dan penuh makna, tarian ini berhasil memvisualisasikan perjuangan, semangat gotong royong, serta nilai-nilai budaya yang diwariskan dari generasi ke generasi. Setiap gerakan disusun dengan ritme yang menghentak, seolah menjadi metafora dari perlawanan terhadap penjajahan dan upaya mempertahankan identitas budaya. Keterlibatan penari laki-laki dan perempuan secara bersamaan juga menunjukkan semangat kesetaraan dan kolaborasi dalam membangun kekuatan bersama.

Tarian ini tidak hanya menjadi hiburan, tetapi juga menjadi sarana edukasi budaya bagi generasi muda. Inovasi seperti ini penting dalam menjaga eksistensi seni tradisional agar tetap relevan di tengah perkembangan zaman. Dengan menggabungkan unsur modern dan tradisional, tarian kreasi baru ini mampu menarik perhatian penonton lintas usia dan menjadi representasi dari semangat budaya Banten yang terus berkembang.',
        ]);


    }
}
