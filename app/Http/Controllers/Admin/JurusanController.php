<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\JurusanGambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::latest()->paginate(10);

        return view('admin.jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('admin.jurusan.form', ['jurusanItem' => new Jurusan]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'singkatan' => 'nullable|string|max:32',
            'deskripsi' => 'required|string',
            'gambar_sampul' => 'nullable|image|max:2048',
            'galeri.*' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar_sampul')) {
            $data['gambar_sampul'] = $request->file('gambar_sampul')->store('jurusan', 'public');
        }

        $jurusan = Jurusan::create(collect($data)->except('galeri')->all());

        foreach ($request->file('galeri', []) as $file) {
            $jurusan->gambar()->create(['gambar' => $file->store('jurusan/galeri', 'public')]);
        }

        return redirect()->route('admin.jurusan.index')->with('status', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Jurusan $jurusan)
    {
        $jurusan->load('gambar');

        return view('admin.jurusan.form', ['jurusanItem' => $jurusan]);
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'singkatan' => 'nullable|string|max:32',
            'deskripsi' => 'required|string',
            'gambar_sampul' => 'nullable|image|max:2048',
            'galeri.*' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar_sampul')) {
            if ($jurusan->gambar_sampul) {
                Storage::disk('public')->delete($jurusan->gambar_sampul);
            }
            $data['gambar_sampul'] = $request->file('gambar_sampul')->store('jurusan', 'public');
        }

        $jurusan->update(collect($data)->except('galeri')->all());

        foreach ($request->file('galeri', []) as $file) {
            $jurusan->gambar()->create(['gambar' => $file->store('jurusan/galeri', 'public')]);
        }

        return redirect()->route('admin.jurusan.index')->with('status', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        if ($jurusan->gambar_sampul) {
            Storage::disk('public')->delete($jurusan->gambar_sampul);
        }
        foreach ($jurusan->gambar as $gambar) {
            Storage::disk('public')->delete($gambar->gambar);
        }
        $jurusan->delete();

        return back()->with('status', 'Jurusan berhasil dihapus.');
    }

    public function destroyGambar(JurusanGambar $gambar)
    {
        Storage::disk('public')->delete($gambar->gambar);
        $jurusanId = $gambar->jurusan_id;
        $gambar->delete();

        return redirect()->route('admin.jurusan.edit', $jurusanId)->with('status', 'Gambar galeri dihapus.');
    }
}
