<div class="bg-white border rounded-lg shadow-md p-4">
    <h2 class="text-lg font-semibold mb-4 font-display">Artikel Terbaru</h2>
    <ul class="space-y-4">
        @foreach ($articles as $article)
            <li class="flex gap-3">
                <img src="{{ $article['thumbnail'] }}" alt="{{ $article['title'] }}"
                    class="w-16 h-16 object-cover rounded" />
                <div class="text-sm">
                    <h3 class="font-medium leading-snug line-clamp-2">{{ $article['title'] }}</h3>
                    <p class="text-xs text-gray-500 mt-1">{{ $article['date'] }}</p>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="flex justify-center mt-8 mb-4">
        <livewire:components.button label="selengkapnya" href="#" size="sm" variant="primary"
            class="py-3 px-8" />
    </div>
</div>
