@extends('layouts.app')

@section('content')
    <h1>{{ $artikel->judul }}</h1>
    <p>Penulis: {{ $artikel->penulis }}</p>
    <p>Views: {{ $artikel->views }}</p>
    <p>{{ $artikel->deskripsi }}</p>
    @if($artikel->file_path)
        <p>File: <a href="{{ asset('storage/' . $artikel->file_path) }}" target="_blank">Lihat File</a></p>
    @endif
    @if($artikel->link_youtube)
        <p>Link YouTube: <a href="{{ $artikel->link_youtube }}" target="_blank">{{ $artikel->link_youtube }}</a></p>
    @endif
    <a href="{{ route('artikel.index') }}">Kembali ke Daftar Artikel</a>
@endsection
