<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::latest('tanggal')->paginate(10);

        return view('admin.agenda.index', compact('agenda'));
    }

    public function create()
    {
        return view('admin.agenda.form', ['agendaItem' => new Agenda]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'lokasi' => 'nullable|string|max:255',
        ]);

        Agenda::create($data);

        return redirect()->route('admin.agenda.index')->with('status', 'Agenda berhasil ditambahkan.');
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.form', ['agendaItem' => $agenda]);
    }

    public function update(Request $request, Agenda $agenda)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $agenda->update($data);

        return redirect()->route('admin.agenda.index')->with('status', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return back()->with('status', 'Agenda berhasil dihapus.');
    }
}
