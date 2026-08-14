@extends('layouts.app')

@section('title', 'Sebaran Alumni')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
<style>
    #alumniMap { height: 560px; width: 100%; }
    .leaflet-popup-content-wrapper { border-radius: 14px; }
</style>
@endpush

@section('content')
<x-page-hero eyebrow="Jejak Lulusan" title="Sebaran Alumni" subtitle="Peta persebaran lulusan SMK Sakura Gakuen di berbagai kota &mdash; menunjukkan ke mana para alumni berkarier." />

<div class="mx-auto max-w-6xl px-5 py-16 sm:px-8">
    <div class="overflow-hidden rounded-3xl border border-line shadow-soft">
        <div id="alumniMap"></div>
    </div>

    <h3 class="mt-12 font-display text-2xl font-semibold text-ink">Daftar Alumni ({{ $alumni->count() }})</h3>
    <div class="mt-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($alumni as $item)
            <div class="rounded-3xl border border-line bg-paper p-5">
                <p class="font-display font-semibold text-ink">{{ $item->nama }}</p>
                <p class="mt-1 text-xs text-mute">Lulus {{ $item->tahun_lulus }} &middot; {{ $item->jurusan?->singkatan ?? $item->jurusan?->nama ?? '-' }}</p>
                @if ($item->pekerjaan)
                    <p class="mt-2 text-sm text-ink">{{ $item->pekerjaan }}@if($item->perusahaan) &middot; {{ $item->perusahaan }} @endif</p>
                @endif
                <p class="mt-1 flex items-center gap-1.5 text-xs text-mute"><i class="fi fi-rr-marker"></i>{{ $item->kota }}</p>
            </div>
        @empty
            <p class="text-mute">Belum ada data alumni.</p>
        @endforelse
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    const points = @json($points);
    const map = L.map('alumniMap').setView([-2.5, 118], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors',
        maxZoom: 18,
    }).addTo(map);

    const markers = points.map((p) => {
        const marker = L.marker([p.lat, p.lng]).addTo(map);
        marker.bindPopup(
            '<b>' + p.nama + '</b><br>' +
            'Lulus ' + p.tahun_lulus + (p.jurusan ? ' &middot; ' + p.jurusan : '') + '<br>' +
            (p.pekerjaan ? p.pekerjaan + (p.perusahaan ? ' &middot; ' + p.perusahaan : '') + '<br>' : '') +
            p.kota
        );
        return marker;
    });

    if (markers.length) {
        const group = L.featureGroup(markers);
        map.fitBounds(group.getBounds().pad(0.3));
    }
</script>
@endsection
