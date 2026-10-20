@php
    $items = config('site.navigation');
@endphp

<header class="sticky top-0 z-40 border-b border-ivory/10 bg-night/85 backdrop-blur-md">
    <nav class="mx-auto flex max-w-7xl items-center justify-between gap-8 px-4 py-3 sm:px-8 lg:px-12" aria-label="Hoofdmenu">
        <a href="{{ route('home') }}" class="shrink-0 focus-visible:outline-1 focus-visible:outline-offset-8 focus-visible:outline-brass">
            <x-img src="images/logo.png" alt="Fenbump Renklup – home" sizes="104px" class="h-12 w-auto sm:h-14" />
        </a>

        <ul class="hidden items-center gap-8 md:flex lg:gap-12">
            @foreach ($items as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <li>
                    <a href="{{ route($item['route']) }}"
                       @if ($active) aria-current="page" @endif
                       @class([
                           'group relative inline-block py-2 text-[12px] font-normal uppercase tracking-[0.28em] transition-colors duration-300',
                           'focus-visible:outline-1 focus-visible:outline-offset-4 focus-visible:outline-brass',
                           'text-ivory' => $active,
                           'text-ivory/60 hover:text-ivory' => ! $active,
                       ])>
                        {{ $item['label'] }}
                        <span @class([
                            'absolute inset-x-0 -bottom-0.5 h-px origin-left bg-brass transition-transform duration-500 ease-out',
                            'scale-x-100' => $active,
                            'scale-x-0 group-hover:scale-x-100' => ! $active,
                        ]) aria-hidden="true"></span>
                    </a>
                </li>
            @endforeach
        </ul>

        <button type="button"
                class="inline-flex size-11 items-center justify-center text-ivory/80 hover:text-ivory focus-visible:outline-1 focus-visible:outline-brass md:hidden"
                aria-controls="mobile-menu"
                aria-expanded="false"
                data-menu-toggle>
            <span class="sr-only">Menu openen</span>
            <x-heroicon-o-bars-2 data-menu-icon="open" class="size-6 stroke-[1.25]" aria-hidden="true" />
            <x-heroicon-o-x-mark data-menu-icon="close" class="hidden size-6 stroke-[1.25]" aria-hidden="true" />
        </button>
    </nav>

    <div id="mobile-menu" class="hidden min-h-[calc(100dvh-4.6rem)] border-t border-ivory/10 md:hidden" data-menu>
        <ul class="flex flex-col gap-2 px-6 pt-10">
            @foreach ($items as $index => $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <li>
                    <a href="{{ route($item['route']) }}"
                       @if ($active) aria-current="page" @endif
                       @class([
                           'flex items-baseline gap-5 py-3 font-display text-4xl transition-colors',
                           'text-ivory' => $active,
                           'text-ivory/60 hover:text-ivory' => ! $active,
                       ])>
                        <span class="font-sans text-xs tracking-[0.2em] text-brass">{{ sprintf('%02d', $index + 1) }}</span>
                        <span @class(['italic' => $active])>{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</header>
