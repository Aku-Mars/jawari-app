@extends('layouts.app')

@section('title', 'Galeri - JAWARI')
@section('activeLink', 'Galeri')

@section('content')
    @livewire('components.header', [
        'title' => 'Galeri',
        'subtitle' => 'Mengabadikan budaya lewat sorotan lensa',
        'imgPath' => asset('assets/header-gallery.png'),
    ])
    @livewire('galeri.content', ['selectedGaleri' => $selectedGaleri ?? null])
@endsection
