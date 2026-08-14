@extends('layouts.admin')

@section('title', $pendidikItem->exists ? 'Edit Pendidik' : 'Tambah Pendidik')

@section('content')
<div class="max-w-2xl rounded-3xl bg-paper p-6 shadow-soft">
    <form method="POST" action="{{ $pendidikItem->exists ? route('admin.pendidik.update', $pendidikItem) : route('admin.pendidik.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($pendidikItem->exists) @method('PUT') @endif

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="label">NIP</label>
                <input type="text" name="nip" class="input" value="{{ old('nip', $pendidikItem->nip) }}" required>
            </div>
            <div>
                <label class="label">Jabatan</label>
                <input type="text" name="jabatan" class="input" value="{{ old('jabatan', $pendidikItem->jabatan) }}" required placeholder="Contoh: Guru Produktif">
            </div>
        </div>
        <div class="mb-4">
            <label class="label">Nama Lengkap</label>
            <input type="text" name="nama" class="input" value="{{ old('nama', $pendidikItem->nama) }}" required>
        </div>
        <div class="mb-5">
            <label class="label">Foto</label>
            @if ($pendidikItem->foto)
                <img src="{{ Storage::url($pendidikItem->foto) }}" class="mb-2 h-16 w-16 rounded-xl object-cover" alt="">
            @endif
            <input type="file" name="foto" class="input" accept="image/*">
        </div>

        <button type="submit" class="btn-primary">Simpan</button>
        <a href="{{ route('admin.pendidik.index') }}" class="btn-ghost">Batal</a>
    </form>
</div>
@endsection
