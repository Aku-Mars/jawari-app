@extends('layouts.app')

@section('title')
    "Artikel - JAWARI"
@endsection()

@section('activeLink', 'Artikel')
@section('content')
    @livewire('components.header', [
        'title' => 'Artikel',
        'subtitle' => 'Berita dan informasi terkini seputar budaya Banten',
        'imgPath' => asset('assets/header-artikel.png'),
    ])
    @livewire('artikel.content-artikel')

@endsection()
