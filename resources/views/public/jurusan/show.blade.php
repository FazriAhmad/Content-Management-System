@extends('layouts.app')

@section('title', $jurusan->nama)

@section('content')
<x-page-hero eyebrow="Program Keahlian" :title="$jurusan->nama" />

<div class="mx-auto max-w-6xl px-5 py-16 sm:px-8">
    <a href="{{ route('jurusan.index') }}" class="text-sm font-semibold text-teal hover:underline">&larr; Kembali ke daftar jurusan</a>

    <div class="mt-6 overflow-hidden rounded-3xl shadow-lift">
        <img src="{{ $jurusan->gambar_sampul ? Storage::url($jurusan->gambar_sampul) : 'https://placehold.co/1200x400/0d4f4f/f8f4ec?text='.urlencode($jurusan->nama) }}" class="h-72 w-full object-cover sm:h-96" alt="{{ $jurusan->nama }}">
    </div>

    <div class="mt-8 max-w-3xl">
        @if ($jurusan->singkatan)
            <span class="rounded-full bg-teal/10 px-3 py-1 text-xs font-semibold text-teal">{{ $jurusan->singkatan }}</span>
        @endif
        <p class="mt-4 whitespace-pre-line text-[15px] leading-relaxed text-mute">{{ $jurusan->deskripsi }}</p>
    </div>

    @if ($jurusan->gambar->count())
        <h3 class="mt-12 font-display text-2xl font-semibold text-ink">Galeri</h3>
        <div class="mt-5 grid grid-cols-2 gap-4 sm:grid-cols-4">
            @foreach ($jurusan->gambar as $gambar)
                <img src="{{ Storage::url($gambar->gambar) }}" class="aspect-square w-full rounded-2xl object-cover shadow-soft" alt="Galeri {{ $jurusan->nama }}">
            @endforeach
        </div>
    @endif
</div>
@endsection
