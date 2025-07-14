@extends('layouts.app')

@section('content')
    <h1>Tambah Artikel</h1>
    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}">
            @error('judul')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" value="{{ old('penulis') }}">
            @error('penulis')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="views">Views</label>
            <input type="number" name="views" id="views" value="{{ old('views', 0) }}">
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
            <input type="url" name="link_youtube" id="link_youtube" value="{{ old('link_youtube') }}">
            @error('link_youtube')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection
