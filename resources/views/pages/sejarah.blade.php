@extends('layouts.app')

@section('title', 'Sejarah Tari - JAWARI')
@section('activeLink', 'Sejarah')

@section('content')
    @livewire('components.header', [
        'title' => '',
        'subtitle' => '',
        'imgPath' => asset(),
    ])
    @
@endsection()
