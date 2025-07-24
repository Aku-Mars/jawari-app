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
        $adminUserId = \App\Models\User::where('email', 'admin@serangkab.go.id')->first()->id;

        Kesenian::create([
            'user_id' => $adminUserId,
            'judul' => 'Sejarah Tari',
            'sub_judul' => 'Sejarah Tari Tradisional Banten',
            'deskripsi' => 'Provinsi Banten tak hanya kaya akan destinasi alam dan religi, tetapi juga memiliki warisan budaya yang sangat menarik untuk dijelajahi—salah satunya adalah seni tari tradisionalnya. Tarian-tarian ini sudah ada sejak zaman Kesultanan Banten dan menjadi bagian penting dari kehidupan masyarakat, baik dalam kegiatan adat, upacara spiritual, hingga pertunjukan hiburan rakyat. Melalui tari, masyarakat Banten mengekspresikan rasa syukur, nasihat hidup, hingga cerita-cerita turun-temurun.

Setiap gerakan dalam tari tradisional Banten bukan hanya indah dipandang, tetapi juga sarat makna. Misalnya, Tari Topeng menampilkan tokoh-tokoh legenda dengan ekspresi yang kuat melalui topeng kayu berwarna. Tari Walijamaliha, sebaliknya, bergerak lebih lembut dan mendalam, karena berasal dari tradisi keagamaan yang mengajarkan nilai spiritual dan ketenangan batin. Tak kalah unik, Tari Bendrong Lesung menggunakan alat tumbuk padi (lesung) sebagai alat musik iringan, menampilkan semangat gotong royong masyarakat desa.

Sebagai wisatawan, menyaksikan tarian ini secara langsung memberi pengalaman yang berbeda. Anda tidak hanya menonton sebuah pertunjukan, tetapi ikut merasakan suasana budaya yang hidup. Banyak sanggar seni di Banten yang terbuka untuk pengunjung, bahkan beberapa menyediakan sesi pelatihan singkat bagi wisatawan yang ingin belajar langsung gerakan dasar tarian tradisional.

Tarian-tarian ini biasanya dipertunjukkan dalam festival daerah, acara penyambutan tamu, atau pada perayaan adat dan keagamaan. Saat berkunjung ke Banten, sempatkan waktu untuk menyaksikan penampilan seni tradisional ini—baik di kota Serang, Pandeglang, maupun kawasan wisata budaya lainnya. Ini adalah kesempatan langka untuk melihat langsung bagaimana nilai-nilai lokal dijaga melalui seni yang penuh harmoni.

Melalui pelestarian seni tari, masyarakat Banten menunjukkan bahwa budaya bukanlah sesuatu yang statis, tapi tumbuh bersama zaman. Bagi Anda yang ingin mengenal Banten lebih dalam, tarian tradisionalnya adalah gerbang yang memukau—sebuah cara untuk memahami jiwa masyarakat lokal tanpa perlu banyak kata. Sebab di sini, budaya benar-benar bisa berbicara lewat gerakan.',
            'banner_image' => null,
            'link_youtube' => null,
        ]);

        Kesenian::create([
            'user_id' => $adminUserId,
            'judul' => 'Tari Ringkang Jawari',
            'sub_judul' => 'Tari Ringkang Jawari: Jejak Lembut Tradisi Islami dari Banten',
            'deskripsi' => 'Tari Jawari adalah tarian tradisional yang berakar dari budaya Islam dan kental dengan nuansa religius. Kata “Jawari” berasal dari bahasa Arab “jawāriyy” (جَوَارِيّ), yang berarti "para gadis muda" atau "pelayan perempuan" di istana. Namun, dalam konteks budaya Banten, istilah ini merujuk pada gadis-gadis muda yang menari dengan anggun sebagai bentuk penghormatan atau ekspresi seni dalam kegiatan keagamaan.

Tari ini berkembang seiring penyebaran agama Islam di tanah Banten, khususnya melalui peran para ulama dan pesantren. Tari Jawari kerap ditampilkan dalam kegiatan maulid Nabi, perayaan hari besar Islam, dan kegiatan tradisional masyarakat yang bernuansa religius.

Makna dan Filosofi :
Tari Jawari menggambarkan kesopanan, kelembutan, dan keanggunan perempuan Muslimah. Gerakannya yang lembut dan tertutup mencerminkan akhlak mulia, ketundukan kepada Tuhan, serta rasa syukur.
Tarian ini juga mencerminkan keseimbangan antara seni dan spiritualitas, serta menunjukkan bahwa ekspresi seni bisa dilakukan tanpa melanggar norma agama dan kesopanan.

Iringan Musik :
Tari Jawari diiringi oleh musik rebana dan syair-syair islami, seperti pujian kepada Nabi Muhammad SAW, zikir, atau syair bernuansa dakwah. Alat musik yang digunakan biasanya:
Terbang (rebana besar)
Marawis
Kadang disertai vokal atau lantunan qasidah
Iringan musik ini memperkuat suasana khusyuk, sakral, dan syahdu dari penampilan tariannya.

Busana Penari :
Penari Jawari mengenakan busana yang tertutup dan sopan, biasanya berupa:
Baju kurung panjang
Sarung/kain batik
Kerudung atau selendang
Warna-warna yang digunakan umumnya lembut dan elegan, seperti putih, ungu, merah marun, atau hijau tua.
Kostum ini memperkuat citra keanggunan dan kesantunan wanita muslimah.

Formasi & Jumlah Penari :
Tari Jawari biasanya ditarikan oleh 3 sampai 5 penari perempuan, dengan formasi simetris. Gerakannya bersifat:
Lemah gemulai
Dominan pada gerakan tangan dan kaki yang teratur
Minim lompatan atau hentakan keras, karena lebih mengedepankan keharmonisan dan kekhusyukan

Fungsi & Konteks Pentas :
Tari Jawari bukan sekadar hiburan, tapi punya fungsi sosial dan religius:
Sebagai bentuk penghormatan pada acara keagamaan
Sebagai sarana dakwah dan penyebaran nilai-nilai Islam
Penegas bahwa seni dan agama bisa saling mengisi

Ciri Khas Tari Jawari:
Kental nuansa keislaman dan adat Banten
Busana sopan dan gerakan lembut
Musik bernuansa qasidah atau zikir
Fokus pada kesantunan dan ekspresi batin',
            'banner_image' => 'gambar/galeri-12.webp', 
            'link_youtube' => 'https://youtu.be/gPvLCVv0gl4',
        ]);

        Kesenian::create([
            'user_id' => $adminUserId,
            'judul' => 'Tari Walijamaliha',
            'sub_judul' => 'Tari Walijamaliha: Gerak Lembut dalam Cahaya Spiritual',
            'deskripsi' => 'Tari Walijamaliha adalah salah satu tari tradisional khas Banten yang sarat makna religius dan filosofi hidup. Tarian ini berasal dari daerah Lebak, Banten Selatan, dan berkembang di kalangan masyarakat yang memadukan budaya lokal dengan nilai-nilai Islam. Nama “Walijamaliha” sendiri diyakini berasal dari kata-kata Arab: wali, jamal, dan ilahiyah, yang jika diartikan bebas menggambarkan seorang kekasih Tuhan yang memancarkan keindahan dan keluhuran spiritual.

Tari ini ditarikan secara berkelompok oleh para perempuan dengan gerakan yang lembut, anggun, dan penuh kehati-hatian. Gerakannya tidak eksplosif, tetapi justru menyiratkan keheningan batin, kesabaran, dan kerendahan hati. Penari biasanya mengenakan busana panjang berwarna putih atau lembut dengan kerudung, mencerminkan kesucian dan keteduhan jiwa. Musik pengiringnya pun bersifat tenang dan mendayu, sering kali menggunakan rebana dan lantunan syair bernada puji-pujian atau zikir.

Tari Walijamaliha tidak sekadar pertunjukan estetika, melainkan menjadi bagian dari ekspresi keagamaan dan bentuk dakwah yang halus. Ia biasa ditampilkan dalam acara keagamaan, peringatan hari besar Islam, pengajian budaya, hingga sambutan tamu kehormatan di wilayah Lebak dan sekitarnya. Di balik setiap gerakan, terdapat ajakan untuk mengingat Tuhan, menghargai sesama, dan menjaga nilai-nilai kesederhanaan hidup.

Tarian ini menjadi bukti bahwa di Banten, seni dan spiritualitas berjalan beriringan. Walau disampaikan dalam bentuk tari, maknanya sangat dalam dan menyentuh kalbu. Tari Walijamaliha adalah cermin kelembutan perempuan Banten yang menari bukan hanya untuk dilihat, tapi untuk dirasakan maknanya.',
            'banner_image' => 'gambar/gambar-1.webp', 
            'link_youtube' => 'https://youtu.be/ZZYYgzEFADM',
        ]);

        Kesenian::create([
            'user_id' => $adminUserId,
            'judul' => 'Tari Bentang Banten',
            'sub_judul' => 'Tari Bentang Banten: Harmoni dalam Gerak dan Warisan Kain',
            'deskripsi' => 'Tari Bentang Banten adalah tarian tradisional kreasi modern dari Provinsi Banten, yang diciptakan oleh pasangan Beni Kusnandar dan Wiwin Purwinarti dari Sanggar Wanda Banten. Nama "Bentang" merujuk pada kain tradisional Banten, sekaligus simbol kehidupan sehari-hari dan kesejahteraan masyarakat setempat

Asal dan Filosofi
Tarian ini menggambarkan harmoni antara manusia, alam, dan Sang Pencipta, melambangkan pentingnya keseimbangan dalam kehidupan.
Bentang awalnya digunakan dalam upacara adat, permohonan keberkahan, dan penyambutan tamu penting di komunitas setempat

Gerakan dan Irama
Diawali dengan gerakan lambat yang menggambarkan ketenangan, berlanjut ke tempo yang lebih semarak—menciptakan narasi visual yang dinamis.
Gerakan tangan dan kaki yang bervariasi melambangkan kerja sama, kompak, dan aliran kehidupan manusia seperti air mengalir bantenlife.com.
Sering disebut: “flowing like water,” menandakan keindahan dan keselarasan dalam gerak

Kostum dan Properti
Penari mengenakan kain tradisional Banten berwarna cerah, selendang, dan aksesoris kepala khas daerah.
Pemilihan warna merepresentasikan keberagaman alam dan spiritualitas masyarakat Banten, serta menunjukkan keceriaan dan keharmonisan.

Fungsi dan Peran Sosial
Ditampilkan dalam acara budaya seperti penyambutan tamu agung, festival daerah, serta perayaan hari jadi kota dan upacara tradisional.
Misi utamanya adalah menguatkan identitas budaya, mengajarkan nilai kerja sama, penghormatan, dan keselarasan masyarakat Banten.',
            'banner_image' => 'gambar/galeri-8.webp', 
            'link_youtube' => 'https://youtu.be/0-5-MNmR8Uk',
        ]);

    }
}
