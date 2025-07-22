<section class="container mx-auto px-4 py-12">
    <span class="text-sm text-gray-700 font-sans">Artikel</span>
    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mt-2 mb-8 font-display">Artikel & Kegiatan Terkini</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($artikels as $artikel)
            <a href="{{ route('artikel.show', Str::slug($artikel->judul)) }}"
                class="bg-white rounded-lg shadow hover:shadow-md transition block">
                <img src="{{ $artikel->file_path ? asset('storage/' . $artikel->file_path) : asset('assets/article_placeholder.png') }}"
                    alt="{{ $artikel->judul }}" class="w-full h-48 object-cover rounded-t-lg">

                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2 line-clamp-2">{{ $artikel->judul }}</h3>
                    <p class="text-sm text-gray-500">
                        {{ $artikel->created_at?->format('d M Y') ?? '-' }}
                    </p>
                </div>
            </a>
        @empty
            <p>Tidak ada artikel yang ditemukan.</p>
        @endforelse
    </div>
    <div class="flex items-center justify-between flex-wrap gap-4 mt-10">
        <p class="text-sm text-gray-600">
            Menampilkan {{ $artikels->firstItem() }} - {{ $artikels->lastItem() }} dari total
            {{ $artikels->total() }} data
        </p>
        <div class="mt-6 bg-white text-gray-800">
            {{ $artikels->links('pagination::tailwind') }}
        </div>
    </div>
</section>
