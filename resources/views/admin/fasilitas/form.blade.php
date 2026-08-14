@extends('layouts.admin')

@section('title', $fasilitasItem->exists ? 'Edit Fasilitas' : 'Tambah Fasilitas')

@section('content')
<div class="max-w-2xl rounded-3xl bg-paper p-6 shadow-soft">
    <form method="POST" action="{{ $fasilitasItem->exists ? route('admin.fasilitas.update', $fasilitasItem) : route('admin.fasilitas.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($fasilitasItem->exists) @method('PUT') @endif

        <div class="mb-4">
            <label class="label">Nama</label>
            <input type="text" name="nama" class="input" value="{{ old('nama', $fasilitasItem->nama) }}" required>
        </div>
        <div class="mb-4">
            <label class="label">Deskripsi</label>
            <textarea name="deskripsi" rows="5" class="input" required>{{ old('deskripsi', $fasilitasItem->deskripsi) }}</textarea>
        </div>
        <div class="mb-5">
            <label class="label">Gambar</label>
            @if ($fasilitasItem->gambar)
                <img src="{{ Storage::url($fasilitasItem->gambar) }}" class="mb-2 h-16 w-16 rounded-xl object-cover" alt="">
            @endif
            <input type="file" name="gambar" class="input" accept="image/*">
        </div>

        <button type="submit" class="btn-primary">Simpan</button>
        <a href="{{ route('admin.fasilitas.index') }}" class="btn-ghost">Batal</a>
    </form>
</div>
@endsection
