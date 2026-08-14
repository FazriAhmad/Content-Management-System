@extends('layouts.admin')

@section('title', 'Pendidik')

@section('content')
<div class="mb-5 flex justify-end">
    <a href="{{ route('admin.pendidik.create') }}" class="btn-primary"><i class="fi fi-rr-plus"></i>Tambah Pendidik</a>
</div>

<div class="overflow-hidden rounded-3xl bg-paper shadow-soft">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-cream text-left text-xs font-semibold uppercase tracking-wide text-mute">
                <tr>
                    <th class="px-5 py-3">Foto</th>
                    <th class="px-5 py-3">NIP</th>
                    <th class="px-5 py-3">Nama</th>
                    <th class="px-5 py-3">Jabatan</th>
                    <th class="px-5 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-line">
                @forelse ($pendidik as $item)
                    <tr>
                        <td class="px-5 py-3">
                            @if ($item->foto)
                                <img src="{{ Storage::url($item->foto) }}" class="h-12 w-12 rounded-xl object-cover" alt="">
                            @else
                                <span class="text-xs text-mute">Tidak ada</span>
                            @endif
                        </td>
                        <td class="px-5 py-3 text-mute">{{ $item->nip }}</td>
                        <td class="px-5 py-3 font-medium text-ink">{{ $item->nama }}</td>
                        <td class="px-5 py-3 text-mute">{{ $item->jabatan }}</td>
                        <td class="px-5 py-3 text-right">
                            <a href="{{ route('admin.pendidik.edit', $item) }}" class="btn-ghost !py-1.5 !px-3"><i class="fi fi-rr-pencil"></i></a>
                            <form action="{{ route('admin.pendidik.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data pendidik ini?')">
                                @csrf @method('DELETE')
                                <button class="btn-danger"><i class="fi fi-rr-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-5 py-8 text-center text-mute">Belum ada data pendidik.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-5">{{ $pendidik->links() }}</div>
@endsection
