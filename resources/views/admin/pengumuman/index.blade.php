@extends('layouts.admin')

@section('title', 'Pengumuman')

@section('content')
<div class="mb-5 flex justify-end">
    <a href="{{ route('admin.pengumuman.create') }}" class="btn-primary"><i class="fi fi-rr-plus"></i>Tambah Pengumuman</a>
</div>

<div class="overflow-hidden rounded-3xl bg-paper shadow-soft">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-cream text-left text-xs font-semibold uppercase tracking-wide text-mute">
                <tr>
                    <th class="px-5 py-3">Judul</th>
                    <th class="px-5 py-3">Tanggal</th>
                    <th class="px-5 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-line">
                @forelse ($pengumuman as $item)
                    <tr>
                        <td class="px-5 py-3 font-medium text-ink">{{ $item->judul }}</td>
                        <td class="px-5 py-3 text-mute">{{ $item->tanggal->translatedFormat('d F Y') }}</td>
                        <td class="px-5 py-3 text-right">
                            <a href="{{ route('admin.pengumuman.edit', $item) }}" class="btn-ghost !py-1.5 !px-3"><i class="fi fi-rr-pencil"></i></a>
                            <form action="{{ route('admin.pengumuman.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pengumuman ini?')">
                                @csrf @method('DELETE')
                                <button class="btn-danger"><i class="fi fi-rr-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-5 py-8 text-center text-mute">Belum ada pengumuman.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-5">{{ $pengumuman->links() }}</div>
@endsection
