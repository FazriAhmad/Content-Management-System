@extends('layouts.admin')

@section('title', $pengumuman->exists ? 'Edit Pengumuman' : 'Tambah Pengumuman')

@section('content')
<div class="max-w-2xl rounded-3xl bg-paper p-6 shadow-soft">
    <form method="POST" action="{{ $pengumuman->exists ? route('admin.pengumuman.update', $pengumuman) : route('admin.pengumuman.store') }}">
        @csrf
        @if ($pengumuman->exists) @method('PUT') @endif

        <div class="mb-4">
            <label class="label">Judul</label>
            <input type="text" name="judul" class="input" value="{{ old('judul', $pengumuman->judul) }}" required>
        </div>
        <div class="mb-4">
            <label class="label">Tanggal</label>
            <input type="date" name="tanggal" class="input" value="{{ old('tanggal', optional($pengumuman->tanggal)->format('Y-m-d')) }}" required>
        </div>
        <div class="mb-5">
            <label class="label">Isi</label>
            <textarea name="isi" rows="6" class="input" required>{{ old('isi', $pengumuman->isi) }}</textarea>
        </div>

        <button type="submit" class="btn-primary">Simpan</button>
        <a href="{{ route('admin.pengumuman.index') }}" class="btn-ghost">Batal</a>
    </form>
</div>
@endsection
