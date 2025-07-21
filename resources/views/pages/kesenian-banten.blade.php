@extends('layouts.app')


@section('title')
    {{ $kesenian->judul }} - JAWARI
@endsection()

@section('activeLink', 'Sejarah')

@section('content')
    @php
        use Illuminate\Support\Str;

        $headerTitle = Str::before($kesenian->judul, ':');
    @endphp
    @livewire('components.header', [
        'title' => $headerTitle,
        'subtitle' => 'Tarian tak hanya gerak, tapi kisah yang dituturkan turun-temurun',
        'imgPath' => $kesenian->banner_image ? asset('storage/' . $kesenian->banner_image) : asset('assets/header-sejarah-tari.png'),
    ])
    @livewire('kesenian.content-kesenian', [
        'judul' => $kesenian->judul,
        'sub_judul' => $kesenian->sub_judul,
        'deskripsi' => $kesenian->deskripsi,
        'link_youtube' => $kesenian->link_youtube,
    ])
@endsection()
