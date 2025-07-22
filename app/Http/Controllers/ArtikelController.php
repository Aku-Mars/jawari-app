<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use GrahamCampbell\Markdown\Facades\Markdown;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Artikel::latest()->paginate(10);
        return view('pages.artikel', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Artikel::class);
        return view('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Artikel::class);
        $request->validate([
            'judul'        => 'required|string|max:100',
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
            'penulis'       => Auth::user()->name,
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
    public function show($judul)
    {
        $artikel = Artikel::all()->first(function ($item) use ($judul) {
            return Str::slug($item->judul) === $judul;
        });

        if (!$artikel) {
            abort(404);
        }

        $ip = request()->ip();
        $cacheKey = 'viewed_' . $artikel->id . '_' . $ip;

        if (!Cache::has($cacheKey)) {
            $artikel->increment('views');
            Cache::put($cacheKey, true, now()->addMinutes(15));
        }

        $latest = Artikel::latest()->take(5)->get();

        $artikel->deskripsi = Markdown::convertToHtml($artikel->deskripsi);

        return view('pages.detail-artikel', compact('artikel', 'latest'));
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
            'penulis'       => Auth::user()->name,
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
