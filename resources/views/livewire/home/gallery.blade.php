<section class="bg-white py-16 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-10">
            <h2 class="text-xl md:text-2xl font-semibold text-gray-900 mb-2">
                Galeri Budaya Banten <span class="text-red-700">—</span>
            </h2>
            <p class="text-gray-600">Mengabadikan jejak budaya lewat sorotan lensa</p>
        </div>

        <div class="grid gap-2">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                @foreach (['temp_article1.jpg', 'temp_article2.jpg', 'temp_article3.jpg'] as $image)
                    <div class="overflow-hidden rounded-md">
                        <img src="{{ asset('assets/temp/' . $image) }}" alt="Galeri Budaya"
                            class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                @foreach (['temp_article1.jpg', 'temp_article2.jpg', 'temp_article3.jpg', 'temp_article1.jpg'] as $image)
                    <div class="overflow-hidden rounded-md">
                        <img src="{{ asset('assets/temp/' . $image) }}" alt="Galeri Budaya"
                            class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                @foreach (['temp_article1.jpg', 'temp_article2.jpg', 'temp_article3.jpg'] as $image)
                    <div class="overflow-hidden rounded-md">
                        <img src="{{ asset('assets/temp/' . $image) }}" alt="Galeri Budaya"
                            class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="text-center mt-10">
            <livewire:components.button label="selengkapnya" href="#" size="md" variant="primary"
                class="py-3 px-8" />
        </div>
    </div>
</section>
