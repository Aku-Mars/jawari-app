<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Artikel::class);
        $artikel = Artikel::latest()->paginate(10);
        return view ('artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Artikel::class);
        return view ('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Artikel::class);
        $request->validate([
            'judul'        => 'required|string|max:100',
            'penulis'      => 'required|string|max:100',
            'views'        => 'required|integer|min:0',
            'file_path'    => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:2048',
            'link_youtube' => 'nullable|url',
            'deskripsi'    => 'required|string',
        ]);

        $filePath = null;
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('uploads/artikel', 'public');
        }

        Artikel::create([
            'user_id'       => Auth::id(),
            'judul'         => $request->judul,
            'penulis'       => $request->penulis,
            'views'         => $request->views,
            'file_path'     => $filePath,
            'link_youtube'  => $request->link_youtube,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        $this->authorize('view', $artikel);
        return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        $this->authorize('update', $artikel);
        return view('artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        $this->authorize('update', $artikel);
        $request->validate([
           'judul'          => 'required|string|max:100',
           'penulis'        => 'required|string|max:100',
           'views'          => 'required|integer|min:0',
           'file_path'      => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:2048',
           'link_youtube'   => 'nullable|url',
           'deskripsi'      => 'required|string',
        ]);

        $filePath = $artikel->file_path;
        if ($request->hasFile('file_path')) {
            if ($artikel->file_path) {
                Storage::disk('public')->delete($artikel->file_path);
            }
            $filePath = $request->file('file_path')->store('uploads/artikel', 'public');
        }

        $artikel->update([
            'judul'         => $request->judul,
            'penulis'       => $request->penulis,
            'views'         => $request->views,
            'file_path'     => $filePath,
            'link_youtube'  => $request->link_youtube,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy(Artikel $artikel)
    {
        $this->authorize('delete', $artikel);

        if ($artikel->file_path) {
            Storage::disk('public')->delete($artikel->file_path);
        }

        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus');
    }
}
