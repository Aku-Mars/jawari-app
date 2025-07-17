@extends('layouts.app')

@section('title', 'Visi-Misi - JAWARI')
@section('activeLink', 'Tentang Kami')

@section('content')
    @livewire('components.header', [
        'title' => 'Visi Misi',
        'subtitle' => 'Visi Misi Kesenian Banten',
        'imgPath' => asset('assets/visi-misi-header-image.jpg'),
    ])
    @livewire('about.content')

@endsection()
