@extends('layouts.app')

@section('title', 'Jurusan')

@section('content')
<x-page-hero eyebrow="Program Keahlian" title="Jurusan di SMK Sakura Gakuen" subtitle="Pilih program keahlian yang sesuai dengan minat dan bakatmu." />

<div class="mx-auto max-w-6xl px-5 py-16 sm:px-8">
    <div class="grid gap-6 md:grid-cols-3">
        @forelse ($jurusan as $item)
            <a href="{{ route('jurusan.show', $item) }}" class="group overflow-hidden rounded-3xl bg-paper shadow-soft block">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $item->gambar_sampul ? Storage::url($item->gambar_sampul) : 'https://placehold.co/500x300/0d4f4f/f8f4ec?text='.urlencode($item->singkatan ?: $item->nama) }}" alt="{{ $item->nama }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    @if ($item->singkatan)
                        <span class="absolute left-4 top-4 rounded-full bg-gold px-3 py-1 text-xs font-bold text-ink">{{ $item->singkatan }}</span>
                    @endif
                </div>
                <div class="p-5">
                    <h3 class="font-display text-xl font-semibold text-ink">{{ $item->nama }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-mute">{{ Str::limit($item->deskripsi, 110) }}</p>
                    <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-teal">Detail jurusan <i class="fi fi-rr-arrow-right text-xs"></i></span>
                </div>
            </a>
        @empty
            <p class="text-mute">Belum ada data jurusan.</p>
        @endforelse
    </div>
</div>
@endsection
