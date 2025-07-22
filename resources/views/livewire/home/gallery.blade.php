<section class="bg-white py-16 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-10">
            <h2 class="text-xl md:text-2xl font-semibold text-gray-900 mb-2">
                Galeri Budaya Banten <span class="text-red-700">—</span>
            </h2>
            <p class="text-gray-600">Mengabadikan jejak budaya lewat sorotan lensa</p>
        </div>

        @php
            $chunks = $galeri->chunk(3);
        @endphp

        <div class="grid gap-2">
            @foreach ($chunks as $chunk)
                @php
                    $columnCount = $loop->iteration === 2 ? 4 : 3;
                    $gridCols = $columnCount === 4 ? 'sm:grid-cols-4 grid-cols-2' : 'sm:grid-cols-3 grid-cols-1';
                @endphp

                <div class="grid {{ $gridCols }} gap-2">
                    @foreach ($chunk as $item)
                        <div class="overflow-hidden rounded-md">
                            <img src="{{ asset('storage/' . $item->file_path) }}"
                                alt="{{ $item->deskripsi ?? 'Galeri Budaya' }}"
                                class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <livewire:components.button label="selengkapnya" href="{{ route('galeri.index') }}" size="md"
                variant="primary" class="py-3 px-8" />
        </div>
    </div>
</section>
