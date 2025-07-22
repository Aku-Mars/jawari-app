<div class="container mx-auto px-4 md:px-6 lg:px-8 py-12 font-sans">
    <nav class="text-sm text-gray-500 mb-8">
        <a href="{{ url('/') }}" class="hover:underline">Kesenian Banten</a> &raquo;
        <span class="text-gray-700 font-semibold">{{ $judul }}</span>
    </nav>

    <div class="flex flex-col lg:flex-row gap-8">
        <div class="w-full lg:w-1/2">
            <h2 class="font-bold font-display text-3xl">{{ $judul }}</h2>

            @if ($link_youtube)
                @php
                    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\s&]+)/', $link_youtube, $matches);
                    $videoId = $matches[1] ?? null;
                @endphp

                @if ($videoId)
                    <div class="relative pt-[56.25%] mb-6 rounded-2xl overflow-hidden shadow-lg m-6">
                        <iframe class="absolute top-0 left-0 w-full h-full"
                            src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                @endif
            @endif

            <div
                class="prose prose-sm md:prose-base lg:prose-lg max-w-none text-gray-800 leading-loose
                prose-h2:font-diplay prose-h2:font-bold prose-h2:text-3xl prose-h2:my-3 prose-p:my-6">
                {!! $deskripsi !!}
            </div>
        </div>
        <div class="w-full lg:w-1/3 lg:ml-auto">
            @livewire('components.newest-article')
        </div>
    </div>
</div>
