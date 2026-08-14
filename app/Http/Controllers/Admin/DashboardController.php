<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Fasilitas;
use App\Models\Jurusan;
use App\Models\Pendidik;
use App\Models\Pengumuman;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'jumlahPengumuman' => Pengumuman::count(),
            'jumlahAgenda' => Agenda::count(),
            'jumlahFasilitas' => Fasilitas::count(),
            'jumlahJurusan' => Jurusan::count(),
            'jumlahPendidik' => Pendidik::count(),
        ]);
    }
}
