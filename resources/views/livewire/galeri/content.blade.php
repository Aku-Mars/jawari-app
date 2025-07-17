<div class="container mx-auto px-4 md:px-6 lg:px-8 py-12">
    <!-- Breadcrumb -->
    <span class="text-sm text-gray-700 font-sans">Galeri</span>

    <!-- Judul -->
    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mt-2 mb-8">
        Galeri Tari Tradisional Banten
    </h2>

    <!-- Grid Galeri -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($galeri as $item)
            @if ($item->status)
                {{-- wire:click is not functional or have a potential error, this will use implementation from controller instead --}}
                <div class="aspect-[4/3] overflow-hidden cursor-pointer mb-6"
                    wire:click="showGaleri('{{ $item->id }}')">
                    <div
                        class="relative group overflow-hidden rounded-md shadow hover:shadow-lg transition-shadow duration-300">
                        <img src="{{ $item->file_path ? asset('storage/' . $item->file_path) : asset('assets/article_placeholder.png') }}"
                            alt="Foto {{ $item->deskripsi ?? 'Galeri' }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300">
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Modal Preview -->
    {{-- TODO: ADD MODAL WHEN CLICKED THE GALLERY ITEMS --}}
    {{-- @if ($selectedGaleri)
        <div class="fixed inset-0 bg-black bg-opacity-70 flex justify-center items-center z-50">
            <div class="bg-white p-4 max-w-3xl w-full rounded shadow relative">
                <button class="absolute top-2 right-2 text-gray-600 text-xl font-bold"
                    wire:click="closeModal">✕</button>
                <img src="{{ asset('storage/' . $selectedGaleri->file_path) }}" class="w-full h-auto mb-4 rounded" />
                <p class="text-sm text-gray-600">{{ $selectedGaleri->created_at->translatedFormat('d F Y') }}</p>
                <p class="text-lg font-semibold mt-2">{{ $selectedGaleri->deskripsi }}</p>
            </div>
        </div>
    @endif --}}

    <!-- Pagination -->
    <div class="flex items-center justify-between flex-wrap gap-4 mt-10">
        <p class="text-sm text-gray-600">
            Menampilkan {{ $galeri->firstItem() }} - {{ $galeri->lastItem() }} dari total
            {{ $galeriCountWithPublic }} data
        </p>
        <div class="bg-white text-gray-800">
            {{ $galeri->links('pagination::tailwind') }}
        </div>
    </div>
</div>
