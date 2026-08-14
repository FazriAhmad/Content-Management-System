<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Admin {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: {
                fontFamily: { sans: ['Poppins', 'ui-sans-serif', 'sans-serif'], display: ['Poppins', 'ui-sans-serif', 'sans-serif'] },
                colors: { teal: '#0d4f4f', 'teal-deep': '#083636', gold: '#e8a317', 'gold-deep': '#c4840c', cream: '#f3ece1', paper: '#f8f4ec', ink: '#1c1915', mute: '#6b6358', line: '#e4d9c8' },
                boxShadow: { soft: '0 14px 40px -18px rgb(13 79 79 / 0.28)' },
            } },
        };
    </script>
    <style>
        body { background: #f3ece1; color: #1c1915; }
        .btn-primary { display: inline-flex; align-items: center; justify-content: center; gap: .5rem; border-radius: 999px; background: #0d4f4f; color: #f8f4ec; padding: .65rem 1.15rem; font-size: .875rem; font-weight: 600; transition: filter .2s ease; }
        .btn-primary:hover { filter: brightness(1.08); }
        .btn-ghost { display: inline-flex; align-items: center; justify-content: center; gap: .5rem; border-radius: 999px; border: 1px solid #e4d9c8; background: transparent; color: #1c1915; padding: .6rem 1.1rem; font-size: .875rem; font-weight: 600; transition: background .2s ease; }
        .btn-ghost:hover { background: #f3ece1; }
        .btn-danger { display: inline-flex; align-items: center; justify-content: center; gap: .4rem; border-radius: 999px; border: 1px solid #fecaca; color: #dc2626; padding: .45rem .75rem; font-size: .8rem; font-weight: 600; }
        .btn-danger:hover { background: #fef2f2; }
        .input { width: 100%; border-radius: .9rem; border: 1px solid #e4d9c8; background: #fff; padding: .65rem .9rem; font-size: .9rem; color: #1c1915; outline: none; transition: border-color .2s ease, box-shadow .2s ease; }
        .input:focus { border-color: #0d4f4f; box-shadow: 0 0 0 4px rgb(13 79 79 / 0.12); }
        .label { display: block; margin-bottom: .35rem; font-size: .8rem; font-weight: 600; color: #1c1915; }
    </style>
</head>
<body class="font-sans min-h-screen bg-cream lg:grid lg:grid-cols-[260px_1fr]">
    <aside class="hidden flex-col bg-teal-deep text-paper lg:flex">
        <div class="border-b border-white/10 px-5 py-5">
            <p class="font-display text-base font-semibold">Panel Admin</p>
            <p class="text-xs text-paper/60">SMK Sakura Gakuen</p>
        </div>
        <nav class="flex flex-1 flex-col gap-1 p-3">
            @foreach ([
                ['admin.dashboard', 'fi-rr-apps', 'Dashboard'],
                ['admin.pengumuman.index', 'fi-rr-megaphone', 'Pengumuman'],
                ['admin.agenda.index', 'fi-rr-calendar', 'Agenda'],
                ['admin.jurusan.index', 'fi-rr-graduation-cap', 'Jurusan'],
                ['admin.pendidik.index', 'fi-rr-users', 'Pendidik'],
                ['admin.fasilitas.index', 'fi-rr-building', 'Fasilitas'],
            ] as [$route, $icon, $label])
                @php $active = request()->routeIs($route) || request()->routeIs(str($route)->before('.index').'.*'); @endphp
                <a href="{{ route($route) }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition {{ $active ? 'bg-gold text-ink' : 'text-paper/80 hover:bg-white/10 hover:text-paper' }}">
                    <i class="fi {{ $icon }}"></i>{{ $label }}
                </a>
            @endforeach
        </nav>
        <div class="border-t border-white/10 p-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-paper/80 transition hover:bg-white/10">
                    <i class="fi fi-rr-sign-out-alt"></i>Keluar
                </button>
            </form>
        </div>
    </aside>

    <div class="min-w-0">
        <header class="sticky top-0 z-30 flex items-center justify-between border-b border-line bg-paper/90 px-4 py-3 backdrop-blur-md lg:px-8">
            <p class="font-display text-lg font-semibold text-ink">@yield('title', 'Dashboard')</p>
            <div class="flex items-center gap-4">
                <span class="hidden text-sm text-mute sm:inline">{{ auth()->user()->name }}</span>
                <a href="{{ route('home') }}" class="text-sm font-semibold text-teal hover:underline">Lihat situs &rarr;</a>
            </div>
        </header>

        <div class="px-4 py-6 lg:px-8 lg:py-8">
            @if (session('status'))
                <div class="mb-5 rounded-2xl bg-teal/10 px-4 py-3 text-sm text-teal">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="mb-5 rounded-2xl bg-red-50 px-4 py-3 text-sm text-red-600">
                    <ul class="list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>
</html>
