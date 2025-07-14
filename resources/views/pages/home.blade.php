@extends('layouts.app')

@section('title', 'Beranda - JAWARI')
@section('activeLink', 'Beranda')

@section('content')

    @livewire('home.header')

    <div class="border-t border-gray-300 my-24 mx-96"></div>

    @livewire('home.explore')

    <div class="border-t border-gray-300 my-24 mx-96"></div>

    @livewire('home.content')
    @livewire('home.article')
    @livewire('home.gallery')

@endsection
