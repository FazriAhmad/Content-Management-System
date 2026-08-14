@extends('layouts.admin')

@section('title', $agendaItem->exists ? 'Edit Agenda' : 'Tambah Agenda')

@section('content')
<div class="max-w-2xl rounded-3xl bg-paper p-6 shadow-soft">
    <form method="POST" action="{{ $agendaItem->exists ? route('admin.agenda.update', $agendaItem) : route('admin.agenda.store') }}">
        @csrf
        @if ($agendaItem->exists) @method('PUT') @endif

        <div class="mb-4">
            <label class="label">Judul</label>
            <input type="text" name="judul" class="input" value="{{ old('judul', $agendaItem->judul) }}" required>
        </div>
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="label">Tanggal</label>
                <input type="date" name="tanggal" class="input" value="{{ old('tanggal', optional($agendaItem->tanggal)->format('Y-m-d')) }}" required>
            </div>
            <div>
                <label class="label">Lokasi</label>
                <input type="text" name="lokasi" class="input" value="{{ old('lokasi', $agendaItem->lokasi) }}">
            </div>
        </div>
        <div class="mb-5">
            <label class="label">Deskripsi</label>
            <textarea name="deskripsi" rows="5" class="input" required>{{ old('deskripsi', $agendaItem->deskripsi) }}</textarea>
        </div>

        <button type="submit" class="btn-primary">Simpan</button>
        <a href="{{ route('admin.agenda.index') }}" class="btn-ghost">Batal</a>
    </form>
</div>
@endsection
