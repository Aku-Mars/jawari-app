<footer class="bg-secondaryBackground text-gray-900 py-10 px-4 shadow-inner">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Tentang Kami --}}
        <div>
            <h3 class="text-primary font-bold mb-3">Tentang Kami</h3>
            <p class="text-sm mb-7 text-contentTextDisplay">Universitas Sultan Ageng Tirtayasa</p>
            <p class="text-sm mb-4 text-contentTextDisplay">Dinas Kepemudaan, Olahraga dan Pariwisata</p>
            <p class="text-xs text-contentTextDisplay hover:text-gray-600">
                Copyright © 2025 - Dinas Komunikasi, Informatika, Persandian dan Statistik - Kabupaten Serang. All
                rights reserved.
            </p>
        </div>

        {{-- Kontak Kami --}}
        <div>
            <h3 class="text-primary font-bold mb-3">Kontak Kami</h3>
            <p class="text-sm mb-7 text-contentTextDisplay">Jl. Moh. Yusuf Martadilaga No. 58 Kel. Cipare Kec. Serang
                Kota Serang Banten 42117
            </p>
            <p class="text-sm mb-7 text-contentTextDisplay">(0254) 200010</p>
            <p class="text-sm text-contentTextDisplay">disporapar@serangkab.go.id</p>
        </div>

        {{-- Social Media --}}
        <div>
            <h3 class="text-primary font-bold mb-3">Social Media</h3>
            <div class="flex space-x-4">
                <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer"
                    class="text-black hover:text-gray-600">
                    <img src="{{ asset('assets/icons/Instagram.png') }}" alt="Instagram" class="w-8 h-8">
                </a>
                <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer"
                    class="text-black hover:text-gray-600">
                    <img src="{{ asset('assets/icons/Facebook.png') }}" alt="Facebook" class="w-8 h-8">
                </a>
                <a href="https://www.tiktok.com/" target="_blank" rel="noopener noreferrer"
                    class="text-black hover:text-gray-600">
                    <img src="{{ asset('assets/icons/TikTok.png') }}" alt="TikTok" class="w-8 h-8">
                </a>
            </div>
        </div>
    </div>
</footer>
