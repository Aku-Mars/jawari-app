@extends('layouts.app')

@section('title')
    {{ $artikel->judul }} - JAWARI
@endsection

@section('activeLink', 'Artikel')

@section('content')
    <div class="container mx-auto px-4 md:px-6 lg:px-8 py-12 font-sans text-[#0F172A]">
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="w-full lg:w-1/2 space-y-6">
                <h1 class="text-2xl lg:text-4xl font-bold leading-snug font-display">
                    {{ $artikel->judul }}
                </h1>
                <div class="flex items-center text-sm text-gray-500 space-x-4">
                    <span>{{ $artikel->created_at->format('d M Y') }}</span>
                    <span>•</span>
                    <span>{{ $artikel->penulis }}</span>
                    <span>•</span>
                    <span><i class="fa fa-eye"></i> {{ $artikel->views }} dilihat</span>
                </div>

                @if ($artikel->link_youtube)
                    @php
                        preg_match(
                            '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\s&]+)/',
                            $artikel->link_youtube,
                            $matches,
                        );
                        $videoId = $matches[1] ?? null;
                    @endphp
                    <div class="relative pt-[56.25%] mb-6 rounded-2xl overflow-hidden shadow-lg m-6">
                        <iframe class="absolute top-0 left-0 w-full h-full"
                            src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                @elseif ($artikel->file_path)
                    <div class="relative w-full aspect-video rounded-xl overflow-hidden">
                        <img src="{{ asset('storage/' . $artikel->file_path) }}" alt="{{ $artikel->judul }}"
                            class="w-full h-full object-cover">
                    </div>
                @endif

                <article
                    class="prose prose-sm md:prose-base lg:prose-lg max-w-none text-gray-800 leading-loose
                prose-h2:font-diplay prose-h2:font-bold prose-h2:text-3xl prose-h2:my-3 prose-p:my-6 font-sans mb-8">
                    {!! $artikel->deskripsi !!}
                </article>
            </div>

            <div class="w-full lg:w-1/3 lg:ml-auto">
                @livewire('components.newest-article')
            </div>
        </div>
    </div>
@endsection
