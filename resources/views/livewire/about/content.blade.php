<div class="container mx-auto px-4 md:px-6 lg:px-8 py-12 font-sans">
    <!-- Breadcrumb -->
    <nav class="text-sm text-gray-500 mb-8">
        <a href="/" class="hover:underline">Tentang Kami</a> &raquo;
        <span class="text-gray-700 font-semibold">Visi Misi</span>
    </nav>

    <!-- Flex Row untuk Konten dan Artikel Terbaru -->
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Konten Visi Misi -->
        <div class="w-full lg:w-2/3">
            <div class="prose prose-sm md:prose-base lg:prose-lg max-w-none text-gray-800">
                <h2 class="font-bold my-3 text-3xl">Visi</h2>
                <p>
                    Menjadi pusat informasi, edukasi, dan pelestarian tari tradisional Banten yang inklusif,
                    inspiratif, dan mampu menjembatani generasi masa kini dengan kekayaan budaya leluhur.
                </p>

                <h2 class="font-bold my-3 text-3xl">Misi</h2>
                <ol class="list-decimal pl-5 space-y-2">
                    <li>Melestarikan tari tradisional Banten melalui dokumentasi, pementasan, dan pendidikan budaya.
                    </li>
                    <li>Mengenalkan kekayaan gerak dan makna tarian Banten kepada masyarakat lokal, nasional dan
                        internasional.</li>
                    <li>Mendukung komunitas seni dan sanggar tari dalam pengembangan potensi dan regenerasi penari muda.
                    </li>
                    <li>Menyediakan akses informasi dan materi edukatif yang mudah dipahami oleh pelajar, wisatawan, dan
                        pemerhati budaya.</li>
                    <li>Menginspirasi generasi muda untuk mencintai, menjaga, dan meneruskan tradisi tari sebagai bagian
                        dari identitas daerah.</li>
                </ol>
            </div>
        </div>

        <!-- Artikel Terbaru -->
        <div class="w-full lg:w-1/3">
            @livewire('components.newest-article')
        </div>
    </div>
</div>
