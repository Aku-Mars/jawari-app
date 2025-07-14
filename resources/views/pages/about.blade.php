@extends('layouts.app')

@section('title', 'Visi-Misi - JAWARI')
@section('activeLink', 'Tentang Kami')

@section('content')

    @livewire('about.header')
    @livewire('about.content')



@endsection()
