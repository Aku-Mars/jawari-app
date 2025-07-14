@extends('layouts.app')

@section('content')
    <h1>Edit Artikel</h1>
    <form action="{{ route('artikel.update', $artikel) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $artikel->judul) }}">
            @error('judul')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $artikel->penulis) }}">
            @error('penulis')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="views">Views</label>
            <input type="number" name="views" id="views" value="{{ old('views', $artikel->views) }}">
            @error('views')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="file_path">File</label>
            <input type="file" name="file_path" id="file_path">
            @error('file_path')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="link_youtube">Link YouTube</label>
            <input type="url" name="link_youtube" id="link_youtube" value="{{ old('link_youtube', $artikel->link_youtube) }}">
            @error('link_youtube')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi">{{ old('deskripsi', $artikel->deskripsi) }}</textarea>
            @error('deskripsi')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection
