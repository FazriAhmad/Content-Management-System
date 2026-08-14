@extends('layouts.app')

@section('title', $pengumuman->judul)

@section('content')
<x-page-hero eyebrow="Pengumuman" :title="$pengumuman->judul" />

<div class="mx-auto max-w-3xl px-5 py-16 sm:px-8">
    <a href="{{ route('pengumuman.index') }}" class="text-sm font-semibold text-teal hover:underline">&larr; Kembali ke pengumuman</a>
    <p class="mt-6 text-xs text-mute">{{ $pengumuman->tanggal->translatedFormat('d F Y') }}</p>
    <div class="mt-4 rounded-3xl bg-paper p-6 shadow-soft">
        <p class="whitespace-pre-line text-[15px] leading-relaxed text-ink">{{ $pengumuman->isi }}</p>
    </div>
</div>
@endsection
