<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Admin - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: {
                fontFamily: { sans: ['Poppins', 'ui-sans-serif', 'sans-serif'], display: ['Poppins', 'ui-sans-serif', 'sans-serif'] },
                colors: { teal: '#0d4f4f', 'teal-deep': '#083636', gold: '#e8a317', cream: '#f3ece1', paper: '#f8f4ec', ink: '#1c1915', mute: '#6b6358', line: '#e4d9c8' },
                boxShadow: { lift: '0 24px 60px -20px rgb(28 25 21 / 0.28)' },
            } },
        };
    </script>
    <style>
        .btn-primary { display: inline-flex; align-items: center; justify-content: center; gap: .5rem; border-radius: 999px; background: #0d4f4f; color: #f8f4ec; padding: .7rem 1.25rem; font-size: .875rem; font-weight: 600; transition: filter .2s ease; width: 100%; }
        .btn-primary:hover { filter: brightness(1.08); }
        .input { width: 100%; border-radius: .9rem; border: 1px solid #e4d9c8; background: #fff; padding: .7rem .9rem; font-size: .9rem; color: #1c1915; outline: none; transition: border-color .2s ease, box-shadow .2s ease; }
        .input:focus { border-color: #0d4f4f; box-shadow: 0 0 0 4px rgb(13 79 79 / 0.12); }
    </style>
</head>
<body class="font-sans relative min-h-screen overflow-hidden bg-teal-deep">
    <div class="absolute inset-0 bg-gradient-to-br from-teal-deep via-teal/90 to-ink/70"></div>
    <div class="relative mx-auto flex min-h-screen max-w-md flex-col justify-center px-5 py-16">
        <form method="POST" action="{{ route('login.attempt') }}" class="rounded-[28px] bg-paper p-8 shadow-lift">
            @csrf
            <div class="mb-6 flex items-center gap-3">
                <span class="grid h-12 w-12 place-items-center rounded-2xl bg-teal text-gold">
                    <i class="fi fi-rr-lock text-xl"></i>
                </span>
                <div>
                    <p class="font-display text-lg font-semibold text-ink">Masuk Admin</p>
                    <p class="text-xs text-mute">SMK Sakura Gakuen</p>
                </div>
            </div>

            @if ($errors->any())
                <div class="mb-4 rounded-2xl bg-red-50 px-4 py-3 text-xs text-red-600">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <div class="space-y-4">
                <div>
                    <label class="mb-1.5 block text-xs font-semibold text-ink">Email</label>
                    <input type="email" name="email" class="input" value="{{ old('email') }}" required autofocus>
                </div>
                <div>
                    <label class="mb-1.5 block text-xs font-semibold text-ink">Kata sandi</label>
                    <input type="password" name="password" class="input" required>
                </div>
                <label class="flex items-center gap-2 text-xs text-mute">
                    <input type="checkbox" name="remember"> Ingat saya
                </label>
                <button type="submit" class="btn-primary">Masuk</button>
            </div>

            <p class="mt-5 rounded-2xl bg-cream px-4 py-3 text-xs leading-relaxed text-mute">
                Demo: <strong class="text-ink">admin@sim-sekolah.test</strong> / <strong class="text-ink">admin123</strong>
            </p>
            <a href="{{ route('home') }}" class="mt-4 block text-center text-sm font-semibold text-teal">&larr; Kembali ke situs</a>
        </form>
    </div>
</body>
</html>
