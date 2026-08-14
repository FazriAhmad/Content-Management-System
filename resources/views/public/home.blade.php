@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<section class="relative overflow-hidden bg-teal text-paper">
    <div class="absolute inset-0 bg-gradient-to-br from-teal-deep/90 via-teal/80 to-teal/55"></div>
    <div class="pointer-events-none absolute -left-24 top-20 h-72 w-72 rounded-full bg-gold/20 blur-3xl"></div>
    <div class="relative mx-auto flex min-h-[70vh] max-w-6xl flex-col justify-end px-5 pb-16 pt-24 sm:px-8 sm:pb-24">
        <p class="text-xs font-semibold uppercase tracking-[0.28em] text-gold">Sekolah Menengah Kejuruan &middot; Akreditasi A</p>
        <h1 class="mt-4 max-w-3xl font-display text-4xl font-semibold leading-[1.12] sm:text-6xl">SMK Sakura Gakuen</h1>
        <p class="mt-5 max-w-xl text-base leading-relaxed text-paper/85 sm:text-lg">Mencetak lulusan yang siap kerja, siap usaha, dan siap kuliah.</p>
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('jurusan.index') }}" class="btn-gold">Jelajahi Jurusan <i class="fi fi-rr-arrow-right"></i></a>
            <a href="{{ route('pengumuman.index') }}" class="btn-ghost !border-white/25 !text-paper hover:!bg-white/10">Pengumuman Terbaru</a>
        </div>
        <div class="mt-14 grid gap-3 sm:grid-cols-3">
            <div class="rounded-2xl border border-white/15 bg-white/8 px-5 py-4 backdrop-blur-sm">
                <p class="font-display text-3xl font-semibold text-gold">2005</p>
                <p class="mt-1 text-sm text-paper/75">Tahun berdiri</p>
            </div>
            <div class="rounded-2xl border border-white/15 bg-white/8 px-5 py-4 backdrop-blur-sm">
                <p class="font-display text-3xl font-semibold text-gold">{{ $jurusan->count() }}</p>
                <p class="mt-1 text-sm text-paper/75">Program keahlian</p>
            </div>
            <div class="rounded-2xl border border-white/15 bg-white/8 px-5 py-4 backdrop-blur-sm">
                <p class="font-display text-3xl font-semibold text-gold">40+</p>
                <p class="mt-1 text-sm text-paper/75">Pendidik profesional</p>
            </div>
        </div>
    </div>
</section>

<section class="mx-auto max-w-6xl px-5 py-20 sm:px-8">
    <div class="grid items-center gap-10 lg:grid-cols-2">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-gold-deep">Tentang Kami</p>
            <h2 class="mt-3 font-display text-3xl font-semibold text-ink sm:text-4xl">Sekolah kejuruan yang merawat karakter dan kompetensi.</h2>
            <p class="mt-4 text-[15px] leading-relaxed text-mute">Sejak 2005, SMK Sakura Gakuen menumbuhkan lulusan yang siap kerja, siap wirausaha, dan siap studi lanjut. Pembelajaran berbasis proyek, kemitraan industri, serta pembinaan karakter menjadi tulang punggung setiap program keahlian.</p>
            <a href="{{ route('visi-misi') }}" class="btn-primary mt-6">Baca Visi & Misi <i class="fi fi-rr-arrow-right"></i></a>
        </div>
        <div class="relative">
            <div class="flex h-[380px] w-full items-center justify-center rounded-3xl bg-cream shadow-lift">
                <i class="fi fi-rr-graduation-cap text-8xl text-teal/30"></i>
            </div>
            <div class="absolute -bottom-5 -left-2 rounded-2xl bg-gold px-5 py-4 text-ink shadow-soft sm:left-6">
                <p class="font-display text-2xl font-semibold">Akreditasi A</p>
                <p class="text-xs font-medium">BAN-S/M &middot; NPSN 00112233</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-cream py-20">
    <div class="mx-auto max-w-6xl px-5 sm:px-8">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-gold-deep">Program Unggulan</p>
                <h2 class="mt-2 font-display text-3xl font-semibold text-ink">Jurusan yang paling diminati</h2>
            </div>
            <a href="{{ route('jurusan.index') }}" class="text-sm font-semibold text-teal hover:underline">Lihat semua jurusan &rarr;</a>
        </div>
        <div class="mt-10 grid gap-6 md:grid-cols-3">
            @foreach ($jurusan->take(3) as $item)
                <a href="{{ route('jurusan.show', $item) }}" class="group overflow-hidden rounded-3xl bg-paper shadow-soft block">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $item->gambar_sampul ? Storage::url($item->gambar_sampul) : 'https://placehold.co/500x300/0d4f4f/f8f4ec?text='.urlencode($item->singkatan ?: $item->nama) }}" alt="{{ $item->nama }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        @if ($item->singkatan)
                            <span class="absolute left-4 top-4 rounded-full bg-gold px-3 py-1 text-xs font-bold text-ink">{{ $item->singkatan }}</span>
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="font-display text-xl font-semibold text-ink">{{ $item->nama }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-mute">{{ Str::limit($item->deskripsi, 120) }}</p>
                        <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-teal">Detail jurusan <i class="fi fi-rr-arrow-right text-xs"></i></span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="mx-auto grid max-w-6xl gap-10 px-5 py-20 sm:px-8 lg:grid-cols-5">
    <div class="lg:col-span-3">
        <div class="flex items-end justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-gold-deep">Pengumuman</p>
                <h2 class="mt-2 font-display text-3xl font-semibold text-ink">Yang perlu Anda ketahui</h2>
            </div>
            <a href="{{ route('pengumuman.index') }}" class="hidden text-sm font-semibold text-teal hover:underline sm:inline">Semua &rarr;</a>
        </div>
        <div class="mt-8 space-y-4">
            @forelse ($pengumuman as $item)
                <a href="{{ route('pengumuman.show', $item) }}" class="block rounded-3xl border border-line bg-paper p-5 transition hover:-translate-y-0.5 hover:shadow-soft">
                    <div class="flex flex-wrap items-center gap-2 text-xs">
                        <span class="text-mute">{{ $item->tanggal->translatedFormat('d F Y') }}</span>
                    </div>
                    <h3 class="mt-2 font-display text-lg font-semibold text-ink">{{ $item->judul }}</h3>
                    <p class="mt-1 text-sm text-mute">{{ Str::limit($item->isi, 120) }}</p>
                </a>
            @empty
                <p class="rounded-2xl bg-cream p-5 text-sm text-mute">Belum ada pengumuman.</p>
            @endforelse
        </div>
    </div>
    <div class="lg:col-span-2">
        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-gold-deep">Agenda</p>
        <h2 class="mt-2 font-display text-3xl font-semibold text-ink">Kegiatan mendatang</h2>
        <div class="mt-8 space-y-3">
            @forelse ($agenda as $item)
                <div class="flex gap-4 rounded-2xl border border-line bg-paper p-4">
                    <div class="grid h-[68px] w-[68px] shrink-0 place-items-center rounded-2xl bg-teal text-paper">
                        <span class="font-display text-2xl font-semibold leading-none">{{ $item->tanggal->format('d') }}</span>
                        <span class="mt-1 text-[10px] font-bold tracking-wider">{{ strtoupper($item->tanggal->translatedFormat('M')) }}</span>
                    </div>
                    <div>
                        <p class="font-semibold text-ink">{{ $item->judul }}</p>
                        @if ($item->lokasi)
                            <p class="mt-1 flex items-center gap-1.5 text-xs text-mute"><i class="fi fi-rr-marker"></i> {{ $item->lokasi }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <p class="rounded-2xl bg-cream p-5 text-sm text-mute">Belum ada agenda mendatang.</p>
            @endforelse
        </div>
        <a href="{{ route('agenda.index') }}" class="btn-ghost mt-5 w-full">Lihat agenda lengkap</a>
    </div>
</section>
@endsection
