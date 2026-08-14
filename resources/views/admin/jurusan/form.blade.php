@extends('layouts.admin')

@section('title', $jurusanItem->exists ? 'Edit Jurusan' : 'Tambah Jurusan')

@section('content')
<div class="max-w-2xl rounded-3xl bg-paper p-6 shadow-soft">
    <form method="POST" action="{{ $jurusanItem->exists ? route('admin.jurusan.update', $jurusanItem) : route('admin.jurusan.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($jurusanItem->exists) @method('PUT') @endif

        <div class="mb-4 grid grid-cols-[1fr_120px] gap-4">
            <div>
                <label class="label">Nama Jurusan</label>
                <input type="text" name="nama" class="input" value="{{ old('nama', $jurusanItem->nama) }}" required>
            </div>
            <div>
                <label class="label">Singkatan</label>
                <input type="text" name="singkatan" class="input" value="{{ old('singkatan', $jurusanItem->singkatan) }}" placeholder="TKJ">
            </div>
        </div>
        <div class="mb-4">
            <label class="label">Deskripsi</label>
            <textarea name="deskripsi" rows="5" class="input" required>{{ old('deskripsi', $jurusanItem->deskripsi) }}</textarea>
        </div>
        <div class="mb-5">
            <label class="label">Gambar Sampul</label>
            @if ($jurusanItem->gambar_sampul)
                <img src="{{ Storage::url($jurusanItem->gambar_sampul) }}" class="mb-2 h-16 w-16 rounded-xl object-cover" alt="">
            @endif
            <input type="file" name="gambar_sampul" class="input" accept="image/*">
        </div>

        @if ($jurusanItem->exists && $jurusanItem->gambar->count())
            <div class="mb-5">
                <label class="label">Galeri Saat Ini</label>
                <div class="flex flex-wrap gap-3">
                    @foreach ($jurusanItem->gambar as $gambar)
                        <div class="relative">
                            <img src="{{ Storage::url($gambar->gambar) }}" class="h-16 w-16 rounded-xl object-cover" alt="">
                            <form action="{{ route('admin.jurusan.gambar.destroy', $gambar) }}" method="POST" class="absolute -right-1.5 -top-1.5" onsubmit="return confirm('Hapus gambar ini?')">
                                @csrf @method('DELETE')
                                <button class="grid h-5 w-5 place-items-center rounded-full bg-red-500 text-[10px] text-white" title="Hapus"><i class="fi fi-rr-cross-small"></i></button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="mb-5">
            <label class="label">Tambah Gambar Galeri</label>
            <input type="file" name="galeri[]" class="input" accept="image/*" multiple>
            <p class="mt-1 text-xs text-mute">Bisa pilih beberapa gambar sekaligus.</p>
        </div>

        <button type="submit" class="btn-primary">Simpan</button>
        <a href="{{ route('admin.jurusan.index') }}" class="btn-ghost">Batal</a>
    </form>
</div>
@endsection
