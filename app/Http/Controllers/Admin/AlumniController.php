<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::with('jurusan')->latest('tahun_lulus')->paginate(10);

        return view('admin.alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('admin.alumni.form', [
            'alumniItem' => new Alumni,
            'jurusanList' => Jurusan::orderBy('nama')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        Alumni::create($data);

        return redirect()->route('admin.alumni.index')->with('status', 'Data alumni berhasil ditambahkan.');
    }

    public function edit(Alumni $alumnus)
    {
        return view('admin.alumni.form', [
            'alumniItem' => $alumnus,
            'jurusanList' => Jurusan::orderBy('nama')->get(),
        ]);
    }

    public function update(Request $request, Alumni $alumnus)
    {
        $data = $this->validated($request);
        $alumnus->update($data);

        return redirect()->route('admin.alumni.index')->with('status', 'Data alumni berhasil diperbarui.');
    }

    public function destroy(Alumni $alumnus)
    {
        $alumnus->delete();

        return back()->with('status', 'Data alumni berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer|min:2000|max:'.(now()->year + 1),
            'jurusan_id' => 'nullable|exists:jurusan,id',
            'pekerjaan' => 'nullable|string|max:255',
            'perusahaan' => 'nullable|string|max:255',
            'kota' => 'required|string|max:255',
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
        ]);
    }
}
