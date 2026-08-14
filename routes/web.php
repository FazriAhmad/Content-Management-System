<?php

use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\PendidikController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/pengumuman', [PublicController::class, 'pengumuman'])->name('pengumuman.index');
Route::get('/pengumuman/{pengumuman}', [PublicController::class, 'pengumumanShow'])->name('pengumuman.show');
Route::get('/agenda', [PublicController::class, 'agenda'])->name('agenda.index');
Route::get('/fasilitas', [PublicController::class, 'fasilitas'])->name('fasilitas.index');
Route::get('/jurusan', [PublicController::class, 'jurusan'])->name('jurusan.index');
Route::get('/jurusan/{jurusan}', [PublicController::class, 'jurusanShow'])->name('jurusan.show');
Route::get('/pendidik', [PublicController::class, 'pendidik'])->name('pendidik.index');
Route::get('/visi-misi', [PublicController::class, 'visiMisi'])->name('visi-misi');
Route::get('/kontak', [PublicController::class, 'kontak'])->name('kontak');

// Auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin (session-auth gated)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('pengumuman', PengumumanController::class)->except('show');
    Route::resource('agenda', AgendaController::class)->except('show');
    Route::resource('fasilitas', FasilitasController::class)->except('show');
    Route::resource('jurusan', JurusanController::class)->except('show');
    Route::delete('jurusan-gambar/{gambar}', [JurusanController::class, 'destroyGambar'])->name('jurusan.gambar.destroy');
    Route::resource('pendidik', PendidikController::class)->except('show');
});
