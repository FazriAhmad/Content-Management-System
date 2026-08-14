@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
    @foreach ([
        ['Pengumuman', $jumlahPengumuman, 'fi-rr-megaphone'],
        ['Agenda', $jumlahAgenda, 'fi-rr-calendar'],
        ['Jurusan', $jumlahJurusan, 'fi-rr-graduation-cap'],
        ['Pendidik', $jumlahPendidik, 'fi-rr-users'],
        ['Fasilitas', $jumlahFasilitas, 'fi-rr-building'],
    ] as [$label, $count, $icon])
        <div class="rounded-3xl bg-paper p-5 shadow-soft">
            <span class="grid h-10 w-10 place-items-center rounded-2xl bg-teal/10 text-teal">
                <i class="fi {{ $icon }}"></i>
            </span>
            <p class="mt-3 text-xs font-semibold uppercase tracking-wide text-mute">{{ $label }}</p>
            <p class="mt-1 font-display text-3xl font-semibold text-ink">{{ $count }}</p>
        </div>
    @endforeach
</div>
@endsection
