<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') - {{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/3.0.0/uicons-brands/css/uicons-brands.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'ui-sans-serif', 'sans-serif'], display: ['Poppins', 'ui-sans-serif', 'sans-serif'] },
                    colors: {
                        teal: '#0d4f4f', 'teal-deep': '#083636',
                        gold: '#e8a317', 'gold-deep': '#c4840c',
                        cream: '#f3ece1', paper: '#f8f4ec',
                        ink: '#1c1915', mute: '#6b6358', line: '#e4d9c8',
                        terracotta: '#c45c3e',
                    },
                    boxShadow: {
                        soft: '0 14px 40px -18px rgb(13 79 79 / 0.28)',
                        lift: '0 24px 60px -20px rgb(28 25 21 / 0.28)',
                    },
                },
            },
        };
    </script>
    <style>
        body { background: #f8f4ec; color: #1c1915; }
        .btn-primary { display: inline-flex; align-items: center; justify-content: center; gap: .5rem; border-radius: 999px; background: #0d4f4f; color: #f8f4ec; padding: .7rem 1.25rem; font-size: .875rem; font-weight: 600; transition: filter .2s ease; }
        .btn-primary:hover { filter: brightness(1.08); }
        .btn-gold { display: inline-flex; align-items: center; justify-content: center; gap: .5rem; border-radius: 999px; background: #e8a317; color: #1c1915; padding: .7rem 1.25rem; font-size: .875rem; font-weight: 600; transition: filter .2s ease; }
        .btn-gold:hover { filter: brightness(1.05); }
        .btn-ghost { display: inline-flex; align-items: center; justify-content: center; gap: .5rem; border-radius: 999px; border: 1px solid #e4d9c8; background: transparent; color: #1c1915; padding: .65rem 1.15rem; font-size: .875rem; font-weight: 600; transition: background .2s ease; }
        .btn-ghost:hover { background: #f3ece1; }
    </style>
    @stack('styles')
</head>
<body class="font-sans">
    <header class="sticky top-0 z-50 bg-paper/95 shadow-soft backdrop-blur-md">
        <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-5 py-3.5 sm:px-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="grid h-11 w-11 place-items-center rounded-2xl bg-teal text-gold shadow-soft">
                    <i class="fi fi-rr-graduation-cap text-xl"></i>
                </span>
                <span class="leading-tight">
                    <span class="block font-display text-sm font-semibold text-ink">SMK Sakura Gakuen</span>
                    <span class="block text-[11px] text-mute">Semangat Membara, Karya Nyata</span>
                </span>
            </a>

            <nav class="hidden items-center gap-1 lg:flex">
                @foreach ([['home','Beranda'],['visi-misi','Visi & Misi'],['jurusan.index','Jurusan'],['pendidik.index','Pendidik'],['fasilitas.index','Fasilitas'],['pengumuman.index','Pengumuman'],['agenda.index','Agenda'],['kontak','Kontak']] as [$r, $label])
                    <a href="{{ route($r) }}" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->routeIs($r) || request()->routeIs($r.'.*') ? 'bg-teal text-paper' : 'text-ink/80 hover:bg-cream hover:text-ink' }}">{{ $label }}</a>
                @endforeach
            </nav>

            <div class="flex items-center gap-2">
                <button type="button" onclick="document.getElementById('mobileNav').classList.toggle('hidden')" class="grid h-10 w-10 place-items-center rounded-full bg-cream text-ink lg:hidden">
                    <i class="fi fi-rr-menu-burger"></i>
                </button>
            </div>
        </div>
        <div id="mobileNav" class="hidden border-t border-line/70 bg-paper lg:hidden">
            <div class="flex flex-col gap-1 px-5 py-4">
                @foreach ([['home','Beranda'],['visi-misi','Visi & Misi'],['jurusan.index','Jurusan'],['pendidik.index','Pendidik'],['fasilitas.index','Fasilitas'],['pengumuman.index','Pengumuman'],['agenda.index','Agenda'],['kontak','Kontak']] as [$r, $label])
                    <a href="{{ route($r) }}" class="rounded-xl px-3 py-2.5 text-sm font-medium {{ request()->routeIs($r) || request()->routeIs($r.'.*') ? 'bg-teal text-paper' : 'text-ink hover:bg-cream' }}">{{ $label }}</a>
                @endforeach
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-teal-deep text-paper">
        <div class="mx-auto grid max-w-6xl gap-10 px-5 py-16 sm:px-8 md:grid-cols-4">
            <div class="md:col-span-2">
                <div class="flex items-center gap-3">
                    <span class="grid h-11 w-11 place-items-center rounded-2xl bg-gold text-ink">
                        <i class="fi fi-rr-graduation-cap text-xl"></i>
                    </span>
                    <div>
                        <p class="font-display text-lg font-semibold">SMK Sakura Gakuen</p>
                        <p class="text-xs text-paper/70">Semangat Membara, Karya Nyata</p>
                    </div>
                </div>
                <p class="mt-4 max-w-md text-sm leading-relaxed text-paper/75">Mencetak lulusan yang siap kerja, siap usaha, dan siap kuliah.</p>
                <div class="mt-5 flex gap-2">
                    @foreach ([['fi-brands-facebook','Facebook'],['fi-brands-instagram','Instagram'],['fi-brands-youtube','YouTube']] as [$icon, $label])
                        <span title="{{ $label }}" class="grid h-10 w-10 place-items-center rounded-full bg-white/10 text-paper transition hover:bg-gold hover:text-ink">
                            <i class="fi {{ $icon }}"></i>
                        </span>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-gold">Jelajah</p>
                <ul class="mt-4 space-y-2 text-sm text-paper/80">
                    <li><a href="{{ route('visi-misi') }}" class="transition hover:text-gold">Visi & Misi</a></li>
                    <li><a href="{{ route('jurusan.index') }}" class="transition hover:text-gold">Program Keahlian</a></li>
                    <li><a href="{{ route('pendidik.index') }}" class="transition hover:text-gold">Pendidik</a></li>
                    <li><a href="{{ route('fasilitas.index') }}" class="transition hover:text-gold">Fasilitas</a></li>
                    <li><a href="{{ route('pengumuman.index') }}" class="transition hover:text-gold">Pengumuman</a></li>
                    <li><a href="{{ route('agenda.index') }}" class="transition hover:text-gold">Agenda</a></li>
                </ul>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-gold">Kontak</p>
                <ul class="mt-4 space-y-3 text-sm text-paper/80">
                    <li class="flex gap-2.5"><i class="fi fi-rr-marker mt-0.5 text-gold"></i><span>Jl. Sakura Raya No. 7, Kota Harapan Baru</span></li>
                    <li class="flex gap-2.5"><i class="fi fi-rr-phone-call mt-0.5 text-gold"></i><span>(0271) 998-877</span></li>
                    <li class="flex gap-2.5"><i class="fi fi-rr-envelope mt-0.5 text-gold"></i><span>info@sakuragakuen.sch.id</span></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white/10">
            <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-2 px-5 py-5 text-xs text-paper/60 sm:flex-row sm:px-8">
                <p>&copy; {{ date('Y') }} SMK Sakura Gakuen. Sekolah &amp; data pada situs ini seluruhnya fiktif.</p>
                <p>Akreditasi A</p>
            </div>
        </div>
    </footer>

    <script>
        // Portal admin sengaja tidak ditautkan di mana pun — buka dengan Ctrl+Shift+A.
        document.addEventListener('keydown', function (e) {
            if (e.ctrlKey && e.shiftKey && e.key.toLowerCase() === 'a') {
                e.preventDefault();
                window.location.href = '{{ route('login') }}';
            }
        });
    </script>
</body>
</html>
