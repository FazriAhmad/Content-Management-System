@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')
<x-page-hero eyebrow="Informasi" title="Pengumuman" subtitle="Informasi resmi dari sekolah untuk siswa, orang tua, dan masyarakat." />

<div class="mx-auto max-w-6xl px-5 py-16 sm:px-8">
    <div class="grid gap-4 md:grid-cols-2">
        @forelse ($pengumuman as $item)
            <a href="{{ route('pengumuman.show', $item) }}" class="block rounded-3xl border border-line bg-paper p-5 transition hover:-translate-y-0.5 hover:shadow-soft">
                <span class="text-xs text-mute">{{ $item->tanggal->translatedFormat('d F Y') }}</span>
                <h3 class="mt-2 font-display text-lg font-semibold text-ink">{{ $item->judul }}</h3>
                <p class="mt-1 text-sm text-mute">{{ Str::limit($item->isi, 140) }}</p>
            </a>
        @empty
            <p class="text-mute">Belum ada pengumuman.</p>
        @endforelse
    </div>
    <div class="mt-8">{{ $pengumuman->links() }}</div>
</div>
@endsection
