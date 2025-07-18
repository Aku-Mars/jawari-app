<div class="container mx-auto px-4 md:px-6 lg:px-8 py-12 font-sans">
    <nav class="text-sm text-gray-500 mb-8">
        <a href="/" class="hover:underline">Kesenian Banten</a> &raquo;
        <span class="text-gray-700 font-semibold">Sejarah Banten</span>
    </nav>

    <div class="flex flex-col lg:flex-row gap-8">
        <div class="w-full lg:w-1/2">
            <div
                class="prose prose-sm md:prose-base lg:prose-lg max-w-none text-gray-800 leading-loose
                prose-h2:font-display prose-h2:font-bold prose-h2:text-3xl prose-h2:my-3 prose-p:my-6">
                {!! $html !!}
            </div>
        </div>
        <div class="w-full lg:w-1/3 lg:ml-auto">
            @livewire('components.newest-article')
        </div>
    </div>
</div>
