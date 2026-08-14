@extends('layouts.app')

@section('title', 'Visi & Misi')

@section('content')
<x-page-hero eyebrow="Tentang Kami" title="Visi &amp; Misi" />

<div class="mx-auto max-w-3xl px-5 py-16 sm:px-8">
    <div class="rounded-3xl bg-paper p-6 shadow-soft">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-gold-deep">Visi</p>
        <p class="mt-3 text-[15px] leading-relaxed text-ink">Menjadi Sekolah Menengah Kejuruan unggulan yang menghasilkan lulusan kompeten, berkarakter, dan berdaya saing global di bidang teknologi dan manajemen.</p>
    </div>

    <div class="mt-6 rounded-3xl bg-paper p-6 shadow-soft">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-gold-deep">Misi</p>
        <ol class="mt-3 list-decimal space-y-2 pl-5 text-[15px] leading-relaxed text-ink">
            <li>Menyelenggarakan pendidikan kejuruan berbasis kompetensi dan dunia industri.</li>
            <li>Membentuk karakter peserta didik yang disiplin, jujur, dan bertanggung jawab.</li>
            <li>Menjalin kemitraan aktif dengan dunia usaha dan dunia industri (DUDI).</li>
            <li>Meningkatkan kompetensi tenaga pendidik secara berkelanjutan.</li>
            <li>Menyediakan fasilitas belajar yang relevan dengan perkembangan teknologi.</li>
        </ol>
    </div>
</div>
@endsection
