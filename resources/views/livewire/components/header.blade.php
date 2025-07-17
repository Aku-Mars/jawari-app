<div class="relative w-full h-[300px] md:h-[400px] lg:h-[500px] overflow-hidden">
    <img src="{{ asset($imgPath) }}" alt="{{ $title }}"
        class="absolute inset-0 w-full h-full object-cover object-center" />

    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <div class="relative h-full flex items-center px-6 md:px-12 lg:px-24 xl:px-40 pb-16 font-display">
        <div class="text-white max-w-xl">
            <h1 class="text-2xl sm:text-4xl md:text-5xl font-bold leading-tight mb-2">
                {{ $title }}
            </h1>
            <p class="text-sm md:text-lg">{{ $subtitle }}</p>
        </div>
    </div>
</div>
