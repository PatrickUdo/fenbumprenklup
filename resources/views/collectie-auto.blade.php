@php
    use App\Support\Cars;

    $base = rtrim(config('app.url'), '/');
    $others = Cars::all()->where('slug', '!=', $car['slug']);

    $schema = [
        '@type' => 'Car',
        'name' => $car['name'],
        'brand' => ['@type' => 'Brand', 'name' => strtok($car['name'], ' ')],
        'vehicleModelDate' => (string) $car['year'],
        'bodyType' => $car['type'],
        'description' => $car['description'],
        'url' => $base.route('collectie.show', $car['slug'], absolute: false),
        'image' => array_map(fn (array $photo) => $base.'/'.$photo['src'], array_slice($car['gallery'], 0, 6)),
        'seller' => ['@id' => $base.'/#bedrijf'],
    ];
@endphp

<x-layouts.app :title="$car['title']"
               :description="$car['description']"
               :image="$car['og_image']"
               :breadcrumbs="[['Collectie', $base.route('collectie', absolute: false)], [$car['name'], $base.route('collectie.show', $car['slug'], absolute: false)]]"
               :schema="$schema">
    <article>
        <header class="mx-auto max-w-7xl px-4 pt-12 sm:px-8 sm:pt-16 lg:px-12">
            <x-text-link :href="route('collectie')" muted>Collectie</x-text-link>

            <p class="mt-10 text-sm tracking-[0.2em] text-brass uppercase">{{ $car['year'] }} · {{ $car['type'] }}</p>
            <h1 class="mt-3 max-w-4xl font-display text-5xl leading-[1.05] font-medium text-balance text-ivory sm:text-6xl lg:text-7xl">
                {{ $car['name'] }}
            </h1>
            <p class="mt-5 text-lg text-ivory/70">{{ $car['tagline'] }}</p>
        </header>

        <figure class="mx-auto mt-12 max-w-7xl px-4 sm:px-8 lg:px-12">
            <x-img :src="$car['cover']"
                   :alt="$car['name']"
                   sizes="(min-width: 1280px) 1184px, 100vw"
                   class="aspect-[4/3] w-full object-cover sm:aspect-[16/9]"
                   fetchpriority="high" />
        </figure>

        <div class="mx-auto grid max-w-7xl gap-16 px-4 py-20 sm:px-8 sm:py-24 lg:grid-cols-12 lg:gap-8 lg:px-12">
            {{-- Beschrijving --}}
            <div class="lg:col-span-7">
                <div class="space-y-5 text-lg leading-relaxed text-pretty text-ivory/75">
                    @foreach ($car['intro'] as $paragraph)
                        <p @class(['text-ivory/90 sm:text-xl' => $loop->first])>{{ $paragraph }}</p>
                    @endforeach
                </div>

                @foreach ($car['sections'] as $section)
                    <section class="mt-14">
                        <h2 class="font-display text-3xl font-medium text-balance text-ivory sm:text-4xl">{{ $section['heading'] }}</h2>

                        @foreach ($section['paragraphs'] ?? [] as $paragraph)
                            <p class="mt-5 text-lg leading-relaxed text-pretty text-ivory/75">{{ $paragraph }}</p>
                        @endforeach

                        @if (! empty($section['list']))
                            <ul class="mt-6 divide-y divide-ivory/10 border-y border-ivory/10">
                                @foreach ($section['list'] as [$label, $text])
                                    <li class="py-5">
                                        <p class="text-ivory">{{ $label }}</p>
                                        <p class="mt-1 leading-relaxed text-pretty text-ivory/70">{{ $text }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </section>
                @endforeach
            </div>

            {{-- Specificaties en contact --}}
            <aside class="lg:col-span-4 lg:col-start-9">
                <div class="lg:sticky lg:top-28">
                    <h2 class="font-display text-3xl font-medium text-ivory">Specificaties</h2>
                    <dl class="mt-6 divide-y divide-ivory/10 border-y border-ivory/10">
                        @foreach ($car['specs'] as $label => $value)
                            <div class="grid grid-cols-5 gap-4 py-3.5">
                                <dt class="col-span-2 text-sm text-ivory/55">{{ $label }}</dt>
                                <dd class="col-span-3 text-ivory/90">{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                    <p class="mt-4 text-sm leading-relaxed text-ivory/50">
                        Alle informatie is met zorg samengesteld maar vrijblijvend; zie onze
                        <a href="{{ route('disclaimer') }}" class="underline decoration-ivory/30 underline-offset-4 hover:text-ivory">disclaimer</a>.
                    </p>

                    <div class="mt-10 bg-night-800 p-6 sm:p-8">
                        <p class="font-display text-2xl text-ivory">Interesse in deze auto?</p>
                        <p class="mt-3 leading-relaxed text-ivory/70">Stel uw vraag of maak een afspraak om de auto te bezichtigen.</p>
                        <a href="{{ route('contact', ['auto' => $car['slug']]) }}#formulier"
                           class="group mt-6 inline-flex items-center gap-3 border border-ivory/30 px-6 py-3 text-base text-ivory transition-colors duration-300 hover:border-brass hover:bg-brass hover:text-night focus-visible:outline-1 focus-visible:outline-offset-4 focus-visible:outline-brass">
                            Neem contact op
                            <x-heroicon-o-arrow-long-right class="size-5 stroke-[1.25] transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true" />
                        </a>
                    </div>
                </div>
            </aside>
        </div>

        <section class="mx-auto max-w-7xl px-4 pb-24 sm:px-8 sm:pb-32 lg:px-12" aria-labelledby="fotos-title">
            <h2 id="fotos-title" class="font-display text-3xl font-medium text-ivory sm:text-4xl">Foto's</h2>
            <x-gallery :photos="$car['gallery']" class="mt-10" />
        </section>
    </article>

    <section class="border-t border-ivory/10 bg-night-800 py-24 sm:py-32" aria-labelledby="meer-title">
        <div class="mx-auto max-w-7xl px-4 sm:px-8 lg:px-12">
            <div class="flex flex-wrap items-end justify-between gap-6">
                <h2 id="meer-title" class="font-display text-4xl font-medium text-ivory sm:text-5xl">Meer uit de collectie</h2>
                <x-text-link :href="route('collectie')" arrow>Bekijk de collectie</x-text-link>
            </div>

            <ul class="mt-14 grid gap-x-8 gap-y-14 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($others as $other)
                    <li>
                        <x-car-card :car="$other" heading="h3" sizes="(min-width: 1024px) 25vw, (min-width: 640px) 50vw, 100vw" />
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</x-layouts.app>
