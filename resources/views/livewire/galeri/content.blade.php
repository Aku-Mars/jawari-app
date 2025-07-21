<div class="container mx-auto px-4 md:px-6 lg:px-8 py-12">
    <span class="text-sm text-gray-700 font-sans">Galeri</span>

    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mt-2 mb-8">
        Galeri Tari Tradisional Banten
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($galeri as $item)
            @if ($item->status)
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

    @if ($selectedGaleri)
        <div id="galeri-modal" class="fixed inset-0 bg-black bg-opacity-70 flex justify-center items-center z-50 p-4">
            <div class="bg-white p-4 max-w-3xl w-full rounded shadow relative" onclick="event.stopPropagation()">
                <button class="absolute top-2 right-2 text-gray-600 text-xl font-bold"
                    wire:click="closeModal">✕</button>
                @if (Str::endsWith($selectedGaleri->file_path, ['.mp4']))
                    <video controls class="w-full h-auto mb-4 rounded">
                        <source src="{{ asset('storage/' . $selectedGaleri->file_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <img src="{{ asset('storage/' . $selectedGaleri->file_path) }}" class="w-full h-auto mb-4 rounded"
                        alt="Detail Foto {{ $selectedGaleri->deskripsi ?? 'Galeri' }}" />
                @endif
                <p class="text-sm text-gray-600">{{ $selectedGaleri->created_at->translatedFormat('d F Y') }}</p>
                <p class="text-lg font-semibold mt-2">{{ $selectedGaleri->deskripsi }}</p>
            </div>
        </div>
    @endif

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

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            let galeriContentComponent = null;

            Livewire.hook('component.init', ({
                component,
                cleanup
            }) => {
                if (component.name === 'galeri.content') {
                    galeriContentComponent = component;

                    window.addEventListener('popstate', (event) => {
                        const currentPath = window.location.pathname;
                        const galeriPattern = /^\/galeri(\/(\d+))?$/;
                        const match = currentPath.match(galeriPattern);

                        if (galeriContentComponent && match) {
                            const id = match[2];
                            if (id) {
                                galeriContentComponent.call('showGaleri', id);
                            } else {
                                galeriContentComponent.call('closeModal');
                            }
                        }
                    }, {
                        once: true
                    });
                }
            });

            Livewire.on('update-url', (url) => {
                if (window.location.pathname + window.location.search !== url) {
                    history.pushState({}, '', url);
                }
            });

            Livewire.hook('message.processed', (message, component) => {
                const modal = document.getElementById('galeri-modal');
                if (modal) {
                    if (component.selectedGaleri) {
                        modal.style.display = 'flex';
                        if (!modal.dataset.listenerAdded) {
                            modal.addEventListener('click', function(event) {
                                if (event.target === modal) {
                                    component.call('closeModal');
                                }
                            });
                            document.addEventListener('keydown', function(event) {
                                if (event.key === 'Escape' && component.selectedGaleri) {
                                    component.call('closeModal');
                                }
                            });
                            modal.dataset.listenerAdded = 'true';
                        }
                    } else {
                        modal.style.display = 'none';
                        modal.dataset.listenerAdded = 'false';
                    }
                }
            });
        });
    </script>
@endpush
