@extends('layouts.admin')

@section('title', 'Alumni')

@section('content')
<div class="mb-5 flex justify-end">
    <a href="{{ route('admin.alumni.create') }}" class="btn-primary"><i class="fi fi-rr-plus"></i>Tambah Alumni</a>
</div>

<div class="overflow-hidden rounded-3xl bg-paper shadow-soft">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-cream text-left text-xs font-semibold uppercase tracking-wide text-mute">
                <tr>
                    <th class="px-5 py-3">Nama</th>
                    <th class="px-5 py-3">Lulus</th>
                    <th class="px-5 py-3">Jurusan</th>
                    <th class="px-5 py-3">Pekerjaan</th>
                    <th class="px-5 py-3">Kota</th>
                    <th class="px-5 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-line">
                @forelse ($alumni as $item)
                    <tr>
                        <td class="px-5 py-3 font-medium text-ink">{{ $item->nama }}</td>
                        <td class="px-5 py-3 text-mute">{{ $item->tahun_lulus }}</td>
                        <td class="px-5 py-3 text-mute">{{ $item->jurusan?->singkatan ?? $item->jurusan?->nama ?? '-' }}</td>
                        <td class="px-5 py-3 text-mute">{{ $item->pekerjaan ?: '-' }}</td>
                        <td class="px-5 py-3 text-mute">{{ $item->kota }}</td>
                        <td class="px-5 py-3 text-right">
                            <a href="{{ route('admin.alumni.edit', $item) }}" class="btn-ghost !py-1.5 !px-3"><i class="fi fi-rr-pencil"></i></a>
                            <form action="{{ route('admin.alumni.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data alumni ini?')">
                                @csrf @method('DELETE')
                                <button class="btn-danger"><i class="fi fi-rr-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-5 py-8 text-center text-mute">Belum ada data alumni.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-5">{{ $alumni->links() }}</div>
@endsection
