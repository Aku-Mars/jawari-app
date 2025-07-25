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
            'views' => 35,
            'file_path' => 'gambar/galeri-1.webp',
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
            'views' => 14,
            'file_path' => 'gambar/galeri-5.webp',
            'link_youtube' => null,
            'deskripsi' => 'Tarian ini merupakan hasil inovasi seni yang menggambarkan semangat kepahlawanan masyarakat Banten dalam balutan gerakan tari yang dinamis dan ekspresif. Para penari tampil memukau dengan kostum tradisional berwarna cerah, membawa alat musik tradisional seperti bedug besar yang menjadi simbol kekuatan dan keberanian. Pertunjukan ini diselenggarakan di atas panggung modern yang dilengkapi pencahayaan warna-warni, menambah suasana megah dan penuh energi.

Melalui koreografi yang kuat dan penuh makna, tarian ini berhasil memvisualisasikan perjuangan, semangat gotong royong, serta nilai-nilai budaya yang diwariskan dari generasi ke generasi. Setiap gerakan disusun dengan ritme yang menghentak, seolah menjadi metafora dari perlawanan terhadap penjajahan dan upaya mempertahankan identitas budaya. Keterlibatan penari laki-laki dan perempuan secara bersamaan juga menunjukkan semangat kesetaraan dan kolaborasi dalam membangun kekuatan bersama.

Tarian ini tidak hanya menjadi hiburan, tetapi juga menjadi sarana edukasi budaya bagi generasi muda. Inovasi seperti ini penting dalam menjaga eksistensi seni tradisional agar tetap relevan di tengah perkembangan zaman. Dengan menggabungkan unsur modern dan tradisional, tarian kreasi baru ini mampu menarik perhatian penonton lintas usia dan menjadi representasi dari semangat budaya Banten yang terus berkembang.',
        ]);

        Artikel::create([
            'user_id' => $adminUserId,
            'judul' => 'Pesona Tarian Tradisional dalam Balutan Nuansa Elegan',
            'penulis' => 'Admin',
            'views' => 34,
            'file_path' => 'gambar/galeri-2.webp',
            'link_youtube' => null,
            'deskripsi' => 'Dalam suasana yang penuh kemegahan dan keanggunan, sekelompok penari wanita tampil memukau membawakan tarian tradisional di tengah acara perayaan formal yang digelar dalam tenda berhias nuansa putih, biru, dan merah muda. Para penari mengenakan busana adat yang anggun dengan balutan kain batik bercorak khas dan atasan berwarna putih serta biru lembut, lengkap dengan selendang dan hiasan kepala yang menambah kemewahan penampilan mereka. Sorotan lampu kristal dari chandelier serta hiasan bunga warna-warni di berbagai sudut ruangan memperkuat kesan elegan dan sakral dari pertunjukan budaya ini.

Seorang penari pria berdiri gagah di depan mereka, mengenakan pakaian tradisional yang mencolok dengan warna biru cerah dan sentuhan warna pelangi di ujung bawah kain, menunjukkan peran pentingnya dalam tarian tersebut. Kehadiran penyanyi dan pembawa acara di samping panggung menambah kesan formal dan terorganisir, menunjukkan bahwa pertunjukan ini bukan hanya hiburan, tetapi juga bentuk penghormatan terhadap warisan budaya. Momen ini menjadi simbol indahnya perpaduan antara adat istiadat dan tata acara modern yang tertata rapi dan memikat.',
        ]);

        Artikel::create([
            'user_id' => $adminUserId,
            'judul' => 'Keanggunan Penari Banten dalam Acara Peresmian',
            'penulis' => 'Admin',
            'views' => 62,
            'file_path' => 'gambar/galeri-11.webp',
            'link_youtube' => null,
            'deskripsi' => 'Tentu, berikut adalah deskripsi untuk gambar tersebut dalam dua paragraf beserta judulnya.

Keanggunan Penari Banten dalam Acara Peresmian
Enam orang penari perempuan tampil memukau dalam balutan busana adat yang seragam dan menawan. Mereka mengenakan atasan berwarna hitam yang dipadukan dengan kain bawahan panjang berwarna ungu cerah bermotif khas, serta hiasan kepala berwarna keemasan yang megah. Kalung dan aksesori keemasan yang mereka kenakan semakin menambah kesan anggun pada penampilan mereka. Dengan senyum dan pose yang tertata rapi, para penari ini menjadi pusat perhatian, menampilkan kekayaan seni dan budaya khas Banten di atas panggung.

Kehadiran para penari ini adalah untuk memeriahkan acara peresmian Pusat Layanan Usaha Terpadu (PLUT) yang diselenggarakan oleh Dinas Pekerjaan Umum dan Penataan Ruang (DPUPR) Provinsi Banten, sebagaimana terlihat pada latar belakang panggung. Acara formal pemerintah ini menjadi lebih hidup dan berkesan dengan adanya sentuhan pertunjukan seni tradisional. Ini menunjukkan perpaduan antara program pembangunan pemerintah untuk kemajuan masyarakat dengan pelestarian dan apresiasi terhadap budaya lokal yang adiluhung.',
        ]);

        
        Artikel::create([
            'user_id' => $adminUserId,
            'judul' => 'Pesona Tari Tradisional di Panggung Munas IV LEPPAMI HMI',
            'penulis' => 'Admin',
            'views' => 41,
            'file_path' => 'gambar/galeri-9.webp',
            'link_youtube' => null,
            'deskripsi' => 'Lima orang penari perempuan mempersembahkan sebuah tarian dengan gerak yang anggun dan serempak di atas panggung beralas karpet merah. Mereka mengenakan busana tradisional yang indah, memadukan atasan berwarna hijau, kain batik bercorak klasik, serta luaran dan selendang putih yang menjuntai. Mahkota berwarna keemasan yang menghiasi kepala mereka semakin menyempurnakan penampilan yang penuh pesona. Dengan gestur tangan menyembah yang penuh hormat, para penari ini berhasil menciptakan suasana yang khidmat sekaligus memukau.

Pertunjukan tarian ini merupakan bagian dari rangkaian acara Musyawarah Nasional (Munas) IV Badan Koordinasi Nasional (Bakornas) LEPPAMI PB HMI. Acara yang diselenggarakan di Pandeglang ini mengusung tema besar "Forest Experience: Karang Mountain" dengan fokus pada komitmen menjaga biodiversitas dan pariwisata. Kehadiran tarian tradisional ini tidak hanya menjadi hiburan pembuka yang artistik, tetapi juga sebagai simbol penyambutan yang hangat dan representasi kekayaan budaya lokal yang patut dilestarikan, sejalan dengan semangat acara tersebut.',
        ]);
    }
}
