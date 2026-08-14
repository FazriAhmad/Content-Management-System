@extends('layouts.admin')

@section('title', 'Jurusan')

@section('content')
<div class="mb-5 flex justify-end">
    <a href="{{ route('admin.jurusan.create') }}" class="btn-primary"><i class="fi fi-rr-plus"></i>Tambah Jurusan</a>
</div>

<div class="overflow-hidden rounded-3xl bg-paper shadow-soft">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-cream text-left text-xs font-semibold uppercase tracking-wide text-mute">
                <tr>
                    <th class="px-5 py-3">Sampul</th>
                    <th class="px-5 py-3">Nama</th>
                    <th class="px-5 py-3">Singkatan</th>
                    <th class="px-5 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-line">
                @forelse ($jurusan as $item)
                    <tr>
                        <td class="px-5 py-3">
                            @if ($item->gambar_sampul)
                                <img src="{{ Storage::url($item->gambar_sampul) }}" class="h-12 w-12 rounded-xl object-cover" alt="">
                            @else
                                <span class="text-xs text-mute">Tidak ada</span>
                            @endif
                        </td>
                        <td class="px-5 py-3 font-medium text-ink">{{ $item->nama }}</td>
                        <td class="px-5 py-3 text-mute">{{ $item->singkatan ?: '-' }}</td>
                        <td class="px-5 py-3 text-right">
                            <a href="{{ route('admin.jurusan.edit', $item) }}" class="btn-ghost !py-1.5 !px-3"><i class="fi fi-rr-pencil"></i></a>
                            <form action="{{ route('admin.jurusan.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus jurusan ini beserta galerinya?')">
                                @csrf @method('DELETE')
                                <button class="btn-danger"><i class="fi fi-rr-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-5 py-8 text-center text-mute">Belum ada jurusan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-5">{{ $jurusan->links() }}</div>
@endsection
