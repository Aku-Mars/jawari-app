@extends('layouts.app')

@section('title', 'Sejarah Tari - JAWARI')
@section('activeLink', 'Sejarah')

@section('content')
    @livewire('components.header', [
        'title' => 'Sejarah Tari',
        'subtitle' => 'Tarian tak hanya gerak, tapi kisah yang dituturkan turun-temurun',
        'imgPath' => asset('assets/header-sejarah-tari.png'),
    ])
    @livewire('kesenian.content-sejarah', ['html' => $html, 'slug' => $slug])
@endsection()
