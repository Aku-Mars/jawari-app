@extends('layouts.app')

@section('content')
    <h1>Daftar Artikel</h1>
    <a href="{{ route('artikel.create') }}">Tambah Artikel</a>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <ul>
        @foreach($artikel as $item)
            <li>
                <a href="{{ route('artikel.show', $item) }}">{{ $item->judul }}</a>
                <a href="{{ route('artikel.edit', $item) }}">Edit</a>
                <form action="{{ route('artikel.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
