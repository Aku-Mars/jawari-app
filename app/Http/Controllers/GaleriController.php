<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::latest()->paginate(10);
        return view ('galeri.index', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_path'       => 'required|file|mimes:jpg,jpeg,png,mp4|max:2048',
            'deskripsi'       => 'required|string',
            'status'          => 'required|boolean',
        ]);

        $filePath = $request->file('file_path')->store('uploads/galeri', 'public');

        Galeri::create([
            'user_id'       => Auth::id(),
            'file_path'     => $filePath,
            'deskripsi'     => $request->deskripsi,
            'status'        => $request->status,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        return view('galeri.show', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        return view('galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'file_path'         => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:2048',
            'deskripsi'         => 'required|string',
            'status'            => 'required|boolean',
        ]);

        $filePath = $galeri->file_path;
        if ($request->hasFile('file_path')) {
            if ($galeri->file_path) {
                Storage::disk('public')->delete($galeri->file_path);
            }
            $filePath = $request->file('file_path')->store('uploads/galeri', 'public');
        }

        $galeri->update([
            'file_path'     => $filePath,
            'deskripsi'     => $request->deskripsi,
            'status'        => $request->status,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        $this->authorize('delete', $galeri);
        
        if ($galeri->file_path) {
            Storage::disk('public')->delete($galeri->file_path);
        }
        $galeri->delete();
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus');
    }
}