<section class="container mx-auto py-16 px-4 my-8 md:my-2">
    <div class="flex flex-col md:flex-row items-center md:items-center gap-12 md:gap-16">
        <div class="md:w-1/2 text-center md:text-left">
            <h2 class="text-3xl md:text-4xl font-bold font-display text-gray-800 mb-2">
                Eksplor Budaya Banten <span class="text-gray-500">—</span>
            </h2>
            <p class="text-lg text-gray-600 mb-6">
                Dari Banten, untuk budaya yang terus menari
            </p>
            <p class="text-base text-gray-700 leading-relaxed">
                Kami adalah platform digital yang berfokus pada pelestarian, dokumentasi, dan
                penyebarluasan informasi tentang tari tradisional Provinsi Banten.
                Melalui media ini, kami berupaya mengenalkan kekayaan budaya lokal kepada generasi
                muda, pendidik, dan masyarakat luas.
            </p>
        </div>

        <div class="relative w-[345px] h-[400px] mx-auto">
            <div class="bg-[#FBF0DB] rounded-2xl shadow w-full h-full flex items-center justify-center">
                <img src="{{ asset('assets/explore-section.png') }}" alt="Banten Culture Icons"
                    class="w-[320px] h-[320px] object-contain">
            </div>

            <livewire:components.button label="Sejarah Kesenian" href="#" size="md" variant="primary"
                class="py-3 px-8 absolute -bottom-3 -right-3" />
        </div>
</section>
