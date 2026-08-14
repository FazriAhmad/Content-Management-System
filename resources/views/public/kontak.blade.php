@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<x-page-hero eyebrow="Hubungi Kami" title="Kontak" subtitle="Silakan hubungi kami melalui informasi berikut." />

<div class="mx-auto max-w-5xl px-5 py-16 sm:px-8">
    <div class="grid gap-6 md:grid-cols-3">
        <div class="rounded-3xl bg-paper p-6 text-center shadow-soft">
            <span class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-teal/10 text-teal">
                <i class="fi fi-rr-marker text-2xl"></i>
            </span>
            <h3 class="mt-4 font-display font-semibold text-ink">Alamat</h3>
            <p class="mt-1 text-sm text-mute">Jl. Sakura Raya No. 7, Kota Harapan Baru 45678</p>
        </div>
        <div class="rounded-3xl bg-paper p-6 text-center shadow-soft">
            <span class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-teal/10 text-teal">
                <i class="fi fi-rr-phone-call text-2xl"></i>
            </span>
            <h3 class="mt-4 font-display font-semibold text-ink">Telepon</h3>
            <p class="mt-1 text-sm text-mute">(0271) 998-877</p>
        </div>
        <div class="rounded-3xl bg-paper p-6 text-center shadow-soft">
            <span class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-teal/10 text-teal">
                <i class="fi fi-rr-envelope text-2xl"></i>
            </span>
            <h3 class="mt-4 font-display font-semibold text-ink">Email</h3>
            <p class="mt-1 text-sm text-mute">info@sakuragakuen.sch.id</p>
        </div>
    </div>
</div>
@endsection
