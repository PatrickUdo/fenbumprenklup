@php
    $cars = \App\Support\Cars::all()->values();
@endphp

<section class="py-24 sm:py-32 lg:py-40" aria-labelledby="collection-title">
    <div class="mx-auto max-w-7xl px-4 sm:px-8 lg:px-12">
        <div class="flex flex-wrap items-end justify-between gap-6">
            <h2 id="collection-title" class="font-display text-4xl font-medium text-ivory sm:text-5xl">Uit de collectie</h2>
            <x-text-link :href="route('collectie')" arrow>Bekijk de collectie</x-text-link>
        </div>

        <div class="mt-14 grid gap-12 lg:grid-cols-12 lg:gap-8" data-preview-list>
            <ul class="border-b border-ivory/10 lg:col-span-7">
                @foreach ($cars as $index => $car)
                    <li class="border-t border-ivory/10">
                        <a href="{{ $car['url'] }}"
                           class="group flex items-center gap-5 py-5 focus-visible:outline-1 focus-visible:outline-offset-4 focus-visible:outline-brass sm:py-6"
                           data-preview-item
                           data-src="{{ \App\Support\ResponsiveImage::url(\App\Support\ResponsiveImage::variantPath($car['cover'], 800)) }}"
                           data-alt="{{ $car['name'] }}"
                           @if ($index === 0) data-active @endif>
                            <x-img :src="$car['cover']" sizes="96px"
                                   class="aspect-[3/2] w-20 shrink-0 object-cover sm:w-24 lg:hidden"
                                   loading="lazy" />
                            <span class="flex-1 font-display text-2xl text-ivory/75 transition-colors duration-300 group-hover:text-ivory group-focus-visible:text-ivory lg:group-data-active:text-ivory sm:text-3xl lg:text-4xl">
                                {{ $car['name'] }}
                            </span>
                            <span class="hidden text-sm text-ivory/55 sm:block">{{ $car['year'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- Voorbeeldfoto: wisselt mee met de auto waar je overheen gaat --}}
            <div class="hidden lg:col-span-4 lg:col-start-9 lg:block">
                <div class="sticky top-28">
                    {{-- Geen srcset: het script wisselt src naar de 800w-versie van de gekozen auto --}}
                    <img src="{{ \App\Support\ResponsiveImage::url(\App\Support\ResponsiveImage::variantPath($cars[0]['cover'], 800)) }}"
                         alt="{{ $cars[0]['name'] }}"
                         class="aspect-[4/3] w-full object-cover transition-opacity duration-300"
                         loading="lazy"
                         data-preview-image>
                </div>
            </div>
        </div>
    </div>
</section>
