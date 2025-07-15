@extends('layouts.app')

@section('title', 'Galeri - JAWARI')
@section('activeLink', 'Galeri')

@section('content')
    @livewire('galeri.header')
    @livewire('galeri.content')
@endsection()
