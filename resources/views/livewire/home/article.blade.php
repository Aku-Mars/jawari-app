<section class="bg-gray-200 py-16 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="md:w-1/2 text-center md:text-left">
            <h2 class="text-3xl md:text-4xl font-bold font-display text-gray-800 mb-2">
                Artikel Dan Kegiatan Terkini <span class="text-red-700">—</span>
            </h2>
            <p class="text-gray-700 mb-7 md:mb-4">
                Update seputar pertunjukan, pelatihan, dan aktivitas pelestarian tari tradisional Banten
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 cursor-pointer">
            @forelse ($articles as $article)
                <a href="{{ route('artikel.show', Str::slug($article->judul)) }}"
                    class="bg-white rounded-2xl shadow-sm overflow-hidden relative group">
                    <div class="relative w-full h-48 overflow-hidden">
                        <img src="{{ $article->file_path ? asset('storage/' . $article->file_path) : asset('assets/article_placeholder.png') }}"
                            alt="{{ $article->judul }}"
                            class="w-full h-full object-cover transform transition-transform duration-500 ease-in-out group-hover:scale-105" />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-500 ease-in-out">
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 text-sm mb-1">
                            {{ $article->judul }}
                        </h3>
                        <p class="text-xs text-gray-500">{{ $article->created_at->format('d M Y') }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500 col-span-3 flex justify-center">Belum ada artikel.</p>
            @endforelse
        </div>

        <div class="text-center mt-10">
            <livewire:components.button label="selengkapnya" href="{{ route('artikel.index') }}" size="md"
                variant="primary" class="py-3 px-8" />
        </div>
    </div>
</section>
