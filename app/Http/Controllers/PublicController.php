<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Alumni;
use App\Models\Fasilitas;
use App\Models\Jurusan;
use App\Models\Pendidik;
use App\Models\Pengumuman;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.home', [
            'pengumuman' => Pengumuman::latest('tanggal')->take(3)->get(),
            'agenda' => Agenda::where('tanggal', '>=', now())->orderBy('tanggal')->take(3)->get(),
            'jurusan' => Jurusan::take(6)->get(),
        ]);
    }

    public function pengumuman()
    {
        return view('public.pengumuman.index', [
            'pengumuman' => Pengumuman::latest('tanggal')->paginate(9),
        ]);
    }

    public function pengumumanShow(Pengumuman $pengumuman)
    {
        return view('public.pengumuman.show', compact('pengumuman'));
    }

    public function agenda()
    {
        return view('public.agenda', [
            'agenda' => Agenda::orderBy('tanggal', 'desc')->paginate(9),
        ]);
    }

    public function fasilitas()
    {
        return view('public.fasilitas', [
            'fasilitas' => Fasilitas::latest()->get(),
        ]);
    }

    public function jurusan()
    {
        return view('public.jurusan.index', [
            'jurusan' => Jurusan::latest()->get(),
        ]);
    }

    public function jurusanShow(Jurusan $jurusan)
    {
        $jurusan->load('gambar');

        return view('public.jurusan.show', compact('jurusan'));
    }

    public function pendidik()
    {
        return view('public.pendidik', [
            'pendidik' => Pendidik::orderBy('nama')->get(),
        ]);
    }

    public function visiMisi()
    {
        return view('public.visi-misi');
    }

    public function kontak()
    {
        return view('public.kontak');
    }

    public function alumni()
    {
        $alumni = Alumni::with('jurusan')->orderBy('tahun_lulus', 'desc')->get();

        return view('public.alumni.index', [
            'alumni' => $alumni,
            'points' => $alumni->map(fn ($a) => [
                'nama' => $a->nama,
                'tahun_lulus' => $a->tahun_lulus,
                'jurusan' => $a->jurusan?->singkatan ?? $a->jurusan?->nama,
                'pekerjaan' => $a->pekerjaan,
                'perusahaan' => $a->perusahaan,
                'kota' => $a->kota,
                'lat' => (float) $a->lat,
                'lng' => (float) $a->lng,
            ]),
        ]);
    }
}
