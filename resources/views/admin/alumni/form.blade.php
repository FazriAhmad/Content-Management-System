@extends('layouts.admin')

@section('title', $alumniItem->exists ? 'Edit Alumni' : 'Tambah Alumni')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
<style>#pickMap { height: 320px; width: 100%; border-radius: .9rem; }</style>

<div class="max-w-2xl rounded-3xl bg-paper p-6 shadow-soft">
    <form method="POST" action="{{ $alumniItem->exists ? route('admin.alumni.update', $alumniItem) : route('admin.alumni.store') }}">
        @csrf
        @if ($alumniItem->exists) @method('PUT') @endif

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="label">Nama Lengkap</label>
                <input type="text" name="nama" class="input" value="{{ old('nama', $alumniItem->nama) }}" required>
            </div>
            <div>
                <label class="label">Tahun Lulus</label>
                <input type="number" name="tahun_lulus" class="input" value="{{ old('tahun_lulus', $alumniItem->tahun_lulus) }}" min="2000" max="{{ now()->year + 1 }}" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="label">Jurusan</label>
            <select name="jurusan_id" class="input">
                <option value="">- Tidak diketahui -</option>
                @foreach ($jurusanList as $j)
                    <option value="{{ $j->id }}" @selected(old('jurusan_id', $alumniItem->jurusan_id) == $j->id)>{{ $j->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="label">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="input" value="{{ old('pekerjaan', $alumniItem->pekerjaan) }}" placeholder="Contoh: Teknisi Jaringan">
            </div>
            <div>
                <label class="label">Perusahaan</label>
                <input type="text" name="perusahaan" class="input" value="{{ old('perusahaan', $alumniItem->perusahaan) }}">
            </div>
        </div>
        <div class="mb-4">
            <label class="label">Kota</label>
            <input type="text" name="kota" id="kotaInput" class="input" value="{{ old('kota', $alumniItem->kota) }}" required>
        </div>

        <div class="mb-4">
            <label class="label">Lokasi di Peta (klik untuk pilih titik)</label>
            <div id="pickMap"></div>
        </div>
        <div class="mb-5 grid grid-cols-2 gap-4">
            <div>
                <label class="label">Latitude</label>
                <input type="text" name="lat" id="latInput" class="input" value="{{ old('lat', $alumniItem->lat) }}" required>
            </div>
            <div>
                <label class="label">Longitude</label>
                <input type="text" name="lng" id="lngInput" class="input" value="{{ old('lng', $alumniItem->lng) }}" required>
            </div>
        </div>

        <button type="submit" class="btn-primary">Simpan</button>
        <a href="{{ route('admin.alumni.index') }}" class="btn-ghost">Batal</a>
    </form>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    const startLat = {{ old('lat', $alumniItem->lat) ?: -2.5 }};
    const startLng = {{ old('lng', $alumniItem->lng) ?: 118 }};
    const hasPoint = {{ old('lat', $alumniItem->lat) ? 'true' : 'false' }};

    const map = L.map('pickMap').setView([startLat, startLng], hasPoint ? 11 : 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors',
        maxZoom: 18,
    }).addTo(map);

    let marker = hasPoint ? L.marker([startLat, startLng]).addTo(map) : null;

    map.on('click', (e) => {
        const { lat, lng } = e.latlng;
        document.getElementById('latInput').value = lat.toFixed(7);
        document.getElementById('lngInput').value = lng.toFixed(7);
        if (marker) marker.setLatLng(e.latlng);
        else marker = L.marker(e.latlng).addTo(map);
    });
</script>
@endsection
