<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendidik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendidikController extends Controller
{
    public function index()
    {
        $pendidik = Pendidik::latest()->paginate(10);

        return view('admin.pendidik.index', compact('pendidik'));
    }

    public function create()
    {
        return view('admin.pendidik.form', ['pendidikItem' => new Pendidik]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nip' => 'required|string|max:32|unique:pendidik,nip',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pendidik', 'public');
        }

        Pendidik::create($data);

        return redirect()->route('admin.pendidik.index')->with('status', 'Data pendidik berhasil ditambahkan.');
    }

    public function edit(Pendidik $pendidik)
    {
        return view('admin.pendidik.form', ['pendidikItem' => $pendidik]);
    }

    public function update(Request $request, Pendidik $pendidik)
    {
        $data = $request->validate([
            'nip' => 'required|string|max:32|unique:pendidik,nip,'.$pendidik->id,
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($pendidik->foto) {
                Storage::disk('public')->delete($pendidik->foto);
            }
            $data['foto'] = $request->file('foto')->store('pendidik', 'public');
        }

        $pendidik->update($data);

        return redirect()->route('admin.pendidik.index')->with('status', 'Data pendidik berhasil diperbarui.');
    }

    public function destroy(Pendidik $pendidik)
    {
        if ($pendidik->foto) {
            Storage::disk('public')->delete($pendidik->foto);
        }
        $pendidik->delete();

        return back()->with('status', 'Data pendidik berhasil dihapus.');
    }
}
