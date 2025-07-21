<?php

namespace App\Http\Controllers;

use App\Models\Kesenian;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KesenianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kesenian = Kesenian::latest()->paginate(10);
        return view('kesenian.index', compact('kesenian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Kesenian::class);
        return view('kesenian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Kesenian::class);
        $request->validate([
            'judul'         => 'required|string|max:100',
            'sub_judul'     => 'required|string|max:100',
            'deskripsi'     => 'required|string',
            'banner_image'  => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link_youtube'  => 'nullable|url',
            'file_path'     => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:2048',
        ]);

        $bannerImage = $request->file('banner_image')->store('uploads/kesenian/banner', 'public');

        $filePath = null;
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('uploads/kesenian/file', 'public');
        }

        Kesenian::create([
            'user_id'           => Auth::id(),
            'judul'             => $request->judul,
            'sub_judul'         => $request->sub_judul,
            'deskripsi'         => $request->deskripsi,
            'banner_image'      => $bannerImage,
            'link_youtube'      => $request->link_youtube,
            'file_path'         => $filePath,
        ]);

        return redirect()->route('kesenian.index')->with('success', 'Kesenian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $sub_judul)
    {
        // Ambil data kesenian sesuai slug sub_judul
        $kesenian = Kesenian::get()->first(function ($item) use ($sub_judul) {
            return Str::slug($item->sub_judul) === $sub_judul;
        });

        if (!$kesenian) {
            abort(404, 'Kesenian tidak ditemukan');
        }

        $kesenian->deskripsi = Markdown::convertToHtml($kesenian->deskripsi)->getContent();

        return view('pages.kesenian-banten', compact('kesenian'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kesenian $kesenian)
    {
        $this->authorize('update', $kesenian);
        return view('kesenian.edit', compact('kesenian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kesenian $kesenian)
    {
        $this->authorize('update', $kesenian);
        $request->validate([
            'judul'         => 'required|string|max:100',
            'sub_judul'     => 'required|string|max:100',
            'deskripsi'     => 'required|string',
            'banner_image'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link_youtube'  => 'nullable|url',
            'file_path'     => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:2048',
        ]);

        $bannerImage = $kesenian->banner_image;
        if ($request->hasFile('banner_image')) {
            Storage::disk('public')->delete($kesenian->banner_image);
            $bannerImage = $request->file('banner_image')->store('uploads/kesenian/banner', 'public');
        }

        $filePath = $kesenian->file_path;
        if ($request->hasFile('file_path')) {
            if ($kesenian->file_path) {
                Storage::disk('public')->delete($kesenian->file_path);
            }
            $filePath = $request->file('file_path')->store('uploads/kesenian/file', 'public');
        }

        $kesenian->update([
            'judul'             => $request->judul,
            'sub_judul'         => $request->sub_judul,
            'deskripsi'         => $request->deskripsi,
            'banner_image'      => $bannerImage,
            'link_youtube'      => $request->link_youtube,
            'file_path'         => $filePath,
        ]);

        return redirect()->route('kesenian.index')->with('success', 'Kesenian berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kesenian $kesenian)
    {
        $this->authorize('delete', $kesenian);

        if ($kesenian->banner_image) {
            Storage::disk('public')->delete($kesenian->banner_image);
        }
        if ($kesenian->file_path) {
            Storage::disk('public')->delete($kesenian->file_path);
        }
        $kesenian->delete();
        return redirect()->route('kesenian.index')->with('success', 'Kesenian berhasil dihapus');
    }
}
