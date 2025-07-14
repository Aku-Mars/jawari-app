@php
    $baseClass = 'inline-block font-semibold rounded-full transition duration-300 ease-in-out shadow-lg';
    $colorClass = match ($variant) {
        'primary' => 'bg-primary hover:bg-secondary text-white',
        'secondary' => 'bg-gray-800 hover:bg-gray-600 text-white',
        'danger' => 'bg-red-600 hover:bg-red-500 text-white',
        default => 'bg-gray-300 hover:bg-gray-200 text-gray-800',
    };
    $sizeClass = match ($size) {
        'sm' => 'px-3 py-1 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-5 py-3 text-lg',
        default => 'px-4 py-2 text-base',
    };
@endphp

<a href="{{ $href }}" class="{{ $baseClass }} {{ $colorClass }} {{ $sizeClass }} {{ $class }}">
    {{ $label }}</a>
