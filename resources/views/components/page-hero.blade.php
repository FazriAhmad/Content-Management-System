@props(['eyebrow', 'title', 'subtitle' => null])

<section class="relative overflow-hidden bg-teal text-paper">
    <div class="pointer-events-none absolute inset-0 opacity-30">
        <div class="absolute -left-20 -top-24 h-72 w-72 rounded-full bg-gold/30 blur-3xl"></div>
        <div class="absolute -bottom-24 right-0 h-80 w-80 rounded-full bg-teal-deep/80 blur-3xl"></div>
    </div>
    <div class="relative mx-auto max-w-6xl px-5 pb-16 pt-16 sm:px-8 sm:pb-20 sm:pt-20">
        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-gold">{{ $eyebrow }}</p>
        <h1 class="mt-3 max-w-3xl font-display text-4xl font-semibold leading-tight sm:text-5xl">{{ $title }}</h1>
        @if ($subtitle)
            <p class="mt-4 max-w-2xl text-base leading-relaxed text-paper/80">{{ $subtitle }}</p>
        @endif
    </div>
</section>
