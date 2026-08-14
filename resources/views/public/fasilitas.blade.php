@extends('layouts.app')

@section('title', 'Fasilitas')

@section('content')
<x-page-hero eyebrow="Sarana & Prasarana" title="Fasilitas Sekolah" subtitle="Fasilitas belajar yang menunjang praktik dan teori setiap program keahlian." />

<div class="mx-auto max-w-6xl px-5 py-16 sm:px-8">
    <div class="grid gap-6 md:grid-cols-3">
        @forelse ($fasilitas as $item)
            <div class="overflow-hidden rounded-3xl bg-paper shadow-soft">
                <img src="{{ $item->gambar ? Storage::url($item->gambar) : 'https://placehold.co/500x300/f3ece1/6b6358?text='.urlencode($item->nama) }}" class="h-44 w-full object-cover" alt="{{ $item->nama }}">
                <div class="p-5">
                    <h3 class="font-display text-lg font-semibold text-ink">{{ $item->nama }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-mute">{{ $item->deskripsi }}</p>
                </div>
            </div>
        @empty
            <p class="text-mute">Belum ada data fasilitas.</p>
        @endforelse
    </div>
</div>
@endsection
