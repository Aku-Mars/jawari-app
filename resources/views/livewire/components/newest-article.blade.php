<div class="bg-white border rounded-lg shadow-md p-4">
    <h2 class="text-lg font-semibold mb-4 font-display">Artikel Terbaru</h2>
    <ul class="space-y-4">
        @foreach ($articles as $article)
            <li class="flex gap-3">
                <img src="{{ $article->file_path ? asset('storage/' . $article->file_path) : asset('assets/article_placeholder.png') }}"
                    alt="{{ $article->judul }}" class="w-20 h-20 object-cover rounded">
                <div class="text-sm">
                    <h3 class="font-sans font-bold leading-snug line-clamp-2 my-3">{{ $article->judul }}</h3>
                    <p class="text-xs text-gray-500 mt-1">{{ $article->created_at->format('d M Y') }}</p>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="flex justify-center mt-8 mb-4">
        <livewire:components.button label="selengkapnya" href="{{ route('artikel.index') }}" size="sm"
            variant="primary" class="py-3 px-8" />
    </div>
</div>
