<nav class="bg-white sticky top-0 z-50 shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center">
            <img src="{{ asset('jawari-logo.png') }}" alt="Jawari Logo" class="h-12 md:h-16 mr-2" />
        </div>

        <!-- Navigation Links -->
        <ul class="hidden md:flex space-x-8 items-center">
            <li>
                <a href="{{ route('home') }}" wire:click="setActiveLink('Beranda')"
                    class="hover:text-lowPrimary text-base {{ $activeLink == 'Beranda' ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'font-semibold' }}">
                    Beranda
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" wire:click="setActiveLink('Tentang Kami')"
                    class="hover:text-lowPrimary text-base {{ $activeLink == 'Tentang Kami' ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'font-semibold' }}">
                    Tentang Kami
                </a>
            </li>

            <li class="relative group">
                <button
                    class="flex items-center text-base font-semibold hover:text-lowPrimary {{ $activeLink == 'Kesenian Banten' ? 'text-primary font-bold border-b-2 border-primary pb-1' : '' }}">
                    <span>
                        Kesenian Banten
                    </span>
                    <svg id="dropdownIcon" xmlns="http://www.w3.org/2000/svg"
                        class=" h-4 w-4 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                {{-- <ul
                    class="absolute left-0 mt-9 w-60 bg-white border rounded-md shadow-lg opacity-0 scale-95 group-hover:opacity-100 group-hover:scale-100 transform transition-all duration-200 ease-out z-50">
                    <li>
                        <a href="{{ route('kesenian.show', ['slug' => 'sejarah-tari-banten']) }}"
                            class="block  my-4 px-4 py-2 hover:bg-gray-100 hover:text-lowPrimary {{ $activeLink == 'Sejarah Tari' ? 'text-primary font-bold  pb-1' : '' }}"
                            wire:click="setActiveLink('Sejarah Tari')">
                            Sejarah Tari Banten
                        </a>
                    </li>
                    <li>
                        <a href="#ringkang"
                            class="block  my-4 px-4 py-2 hover:bg-gray-100 hover:text-lowPrimary {{ $activeLink == 'Tari Ringkang Jawari' ? 'text-primary font-bold  pb-1' : '' }}"
                            wire:click="setActiveLink('Tari Ringkang Jawari')">
                            Tari Ringkang Jawari
                        </a>
                    </li>
                    <li>
                        <a href="#walijamaliha"
                            class="block  my-4 px-4 py-2 hover:bg-gray-100 hover:text-lowPrimary {{ $activeLink == 'Tari Walijamaliha' ? 'text-primary font-bold  pb-1' : '' }}"
                            wire:click="setActiveLink('Tari Walijamaliha')">
                            Tari Walijamaliha
                        </a>
                    </li>
                    <li>
                        <a href="#bentang"
                            class="block  my-4 px-4 py-2 hover:bg-gray-100 hover:text-lowPrimary {{ $activeLink == 'Tari Bentang Banten' ? 'text-primary font-bold  pb-1' : '' }}"
                            wire:click="setActiveLink('Tari Bentang Banten')">
                            Tari Bentang Banten
                        </a>
                    </li>
                </ul> --}}
                <ul
                    class="absolute left-0 mt-9 w-60 bg-white border rounded-md shadow-lg opacity-0 scale-95 group-hover:opacity-100 group-hover:scale-100 transform transition-all duration-200 ease-out z-50">
                    @foreach ($kesenianSlugList as $item)
                        <li>
                            <a href="{{ route('kesenian.show', ['sub_judul' => Str::slug($item->sub_judul)]) }}"
                                class="block my-4 px-4 py-2 hover:bg-gray-100 hover:text-lowPrimary {{ $activeLink == $item->sub_judul ? 'text-primary font-bold pb-1' : '' }}"
                                wire:click="setActiveLink('{{ $item->sub_judul }}')">
                                {{ $item->sub_judul }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </li>
            <li>
                <a href="{{ route('galeri.index') }}" wire:click="setActiveLink('Galeri')"
                    class="hover:text-lowPrimary text-base {{ $activeLink == 'Galeri' ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'font-semibold' }}">
                    Galeri
                </a>
            </li>
            <li>
                <a href="#artikel" wire:click.prevent="setActiveLink('Artikel')"
                    class="hover:text-lowPrimary text-base {{ $activeLink == 'Artikel' ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'font-semibold' }}">
                    Artikel
                </a>
            </li>
        </ul>

        <div class="md:hidden">
            <button id="hamburgerBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <div id="sidebar"
        class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50">
        <div class="p-4 border-b flex justify-between items-center">
            <img src="{{ asset('jawari-logo.png') }}" alt="Jawari Logo" class="h-10" />
            <button id="closeSidebar" class="text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <ul class="flex flex-col space-y-4 p-4">
            <li><a href="#" class="text-base font-semibold hover:text-primary">Beranda</a></li>
            <li><a href="#tentang" class="text-base font-semibold hover:text-primary">Tentang Kami</a></li>

            <li>
                <button id="toggleDropdownMobile"
                    class="text-base font-semibold hover:text-primary w-full text-left flex justify-between items-center">
                    Kesenian Banten
                    <svg id="dropdownIcon" xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul id="dropdownMobile"
                    class="mt-2 ml-2 space-y-2 hidden transform transition-all duration-300 ease-out origin-top">
                    @foreach ($kesenianSlugList as $item)
                        <li>
                            <a href="{{ route('kesenian.show', ['sub_judul' => Str::slug($item->sub_judul)]) }}"
                                class="block px-4 py-1 hover:text-primary"
                                wire:click="setActiveLink('{{ $item->sub_judul }}')">
                                {{ $item->sub_judul }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li><a href="#galeri" class="text-base font-semibold hover:text-primary">Galeri</a></li>
            <li><a href="#artikel" class="text-base font-semibold hover:text-primary">Artikel</a></li>
        </ul>
    </div>

    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 hidden z-40"></div>

    <script>
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const closeSidebar = document.getElementById('closeSidebar');
        const toggleDropdownMobile = document.getElementById('toggleDropdownMobile');
        const dropdownMobile = document.getElementById('dropdownMobile');

        hamburgerBtn.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        toggleDropdownMobile.addEventListener('click', () => {
            dropdownMobile.classList.toggle('hidden');
            dropdownMobile.classList.toggle('scale-y-100');
        });
    </script>
</nav>
