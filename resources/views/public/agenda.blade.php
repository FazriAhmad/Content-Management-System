@extends('layouts.app')

@section('title', 'Agenda')

@section('content')
<x-page-hero eyebrow="Kegiatan" title="Agenda Sekolah" subtitle="Jadwal kegiatan dan acara yang diselenggarakan sekolah." />

<div class="mx-auto max-w-4xl px-5 py-16 sm:px-8">
    <div class="space-y-3">
        @forelse ($agenda as $item)
            <div class="flex gap-4 rounded-2xl border border-line bg-paper p-4">
                <div class="grid h-[68px] w-[68px] shrink-0 place-items-center rounded-2xl bg-teal text-paper">
                    <span class="font-display text-2xl font-semibold leading-none">{{ $item->tanggal->format('d') }}</span>
                    <span class="mt-1 text-[10px] font-bold tracking-wider">{{ strtoupper($item->tanggal->translatedFormat('M')) }}</span>
                </div>
                <div>
                    <p class="font-display font-semibold text-ink">{{ $item->judul }}</p>
                    <p class="mt-1 text-sm text-mute">{{ $item->deskripsi }}</p>
                    @if ($item->lokasi)
                        <p class="mt-1 flex items-center gap-1.5 text-xs text-mute"><i class="fi fi-rr-marker"></i> {{ $item->lokasi }}</p>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-mute">Belum ada agenda.</p>
        @endforelse
    </div>
    <div class="mt-8">{{ $agenda->links() }}</div>
</div>
@endsection
