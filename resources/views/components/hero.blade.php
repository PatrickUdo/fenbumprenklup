@props([
    'image',
    'alt' => '',
    'caption' => null,
])

<section class="relative isolate overflow-hidden lg:flex lg:min-h-[calc(100svh-4.6rem)] lg:items-end">
    {{-- Tot lg staat de foto als blok boven de tekst; daarboven schuift hij naar rechts, naast de tekst --}}
    <div class="relative aspect-[4/3] sm:aspect-[16/10] lg:absolute lg:inset-0 lg:left-[30%] lg:-z-20 lg:aspect-auto">
        <img src="{{ $image }}"
             alt="{{ $alt }}"
             class="size-full object-cover object-[50%_45%]"
             fetchpriority="high">
        <div class="absolute inset-x-0 -bottom-px h-2/3 bg-gradient-to-t from-night from-[2px] to-transparent lg:hidden" aria-hidden="true"></div>
        <div class="absolute inset-y-0 left-0 hidden w-1/2 bg-gradient-to-r from-night to-transparent lg:block" aria-hidden="true"></div>
    </div>

    <div class="absolute inset-0 -z-10 hidden bg-night/15 lg:block" aria-hidden="true"></div>
    <div class="absolute inset-x-0 bottom-0 -z-10 hidden h-1/3 bg-gradient-to-t from-night to-transparent lg:block" aria-hidden="true"></div>

    <div class="relative mx-auto -mt-16 w-full max-w-7xl px-4 pb-16 sm:-mt-24 sm:px-8 sm:pb-20 lg:mt-0 lg:flex lg:items-end lg:justify-between lg:gap-12 lg:px-12 lg:pt-32 lg:pb-20">
        <div class="max-w-xl">
            <h1 class="font-display text-5xl leading-[1.04] font-medium tracking-[-0.01em] text-balance text-ivory sm:text-6xl lg:text-7xl">
                {{ $title }}
            </h1>

            @if ($slot->isNotEmpty())
                <p class="mt-6 max-w-md text-lg leading-relaxed text-pretty text-ivory/75">
                    {{ $slot }}
                </p>
            @endif

            @isset($actions)
                <div class="mt-10 flex flex-wrap items-center gap-x-10 gap-y-4">
                    {{ $actions }}
                </div>
            @endisset
        </div>

        @if ($caption)
            <p class="mt-10 text-sm text-ivory/55 lg:mt-0 lg:text-right">{{ $caption }}</p>
        @endif
    </div>
</section>
