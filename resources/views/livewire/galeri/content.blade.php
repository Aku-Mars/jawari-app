<div class="container mx-auto px-4 md:px-6 lg:px-8 py-12">
    <!-- Breadcrumb -->
    <span class="text-sm text-gray-700 font-sans">Galeri</span>

    <!-- Judul -->
    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mt-2 mb-8">
        Galeri Tari Tradisional Banten
    </h2>

    <!-- Grid Galeri -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
        @foreach ($galeri as $item)
            <div class="overflow-hidden rounded-md shadow hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('storage/galeri/' . $item->foto) }}" alt="Foto {{ $item->judul }}"
                    class="w-full h-48 object-cover" />
            </div>
        @endforeach
    </div>

    <div class="flex items-center justify-between flex-wrap gap-4">
        <p class="text-sm text-gray-600">
            Menampilkan {{ $galeri->firstItem() }} - {{ $galeri->lastItem() }} dari total {{ $galeri->total() }} data
        </p>
        <div>
            {{ $galeri->links('pagination::tailwind') }}
        </div>
    </div>
</div>
