@extends('layouts.app')

@section('title', 'Pendidik')

@section('content')
<x-page-hero eyebrow="Sumber Daya Manusia" title="Tenaga Pendidik &amp; Kependidikan" subtitle="Guru dan staf profesional yang membimbing siswa menuju kompetensi terbaik." />

<div class="mx-auto max-w-6xl px-5 py-16 sm:px-8">
    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-4">
        @forelse ($pendidik as $item)
            <div class="overflow-hidden rounded-3xl bg-paper text-center shadow-soft">
                <img src="{{ $item->foto ? Storage::url($item->foto) : 'https://placehold.co/300x300/f3ece1/6b6358?text='.urlencode($item->nama) }}" class="h-48 w-full object-cover" alt="{{ $item->nama }}">
                <div class="p-4">
                    <h3 class="font-display text-base font-semibold text-ink">{{ $item->nama }}</h3>
                    <p class="mt-1 text-xs text-mute">{{ $item->jabatan }}</p>
                </div>
            </div>
        @empty
            <p class="text-mute">Belum ada data pendidik.</p>
        @endforelse
    </div>
</div>
@endsection
