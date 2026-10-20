@php
    // Later uit Twill. Een auto zonder foto's verschijnt als lege plek ("Binnenkort").
    $car = fn (string $slug, string $name, string $type, array $photos) => [
        'slug' => $slug,
        'name' => $name,
        'type' => $type,
        'photos' => array_map(fn (string $number) => [
            'src' => "images/auto/{$slug}/{$number}.webp",
            'alt' => $name,
        ], $photos),
    ];

    $cars = [
        $car('jaguar', 'Jaguar E-Type V12', 'Coupé', ['01', '03', '21', '16', '23', '42', '44', '67', '69']),
        $car('ferrari', 'Ferrari', 'Coupé', ['07', '08', '03', '13', '48', '62']),
        $car('talbot', 'Talbot', 'Cabriolet', ['01', '04', '05', '08', '33', '37']),
        ['slug' => null, 'name' => 'Binnenkort', 'type' => null, 'photos' => []],
        ['slug' => null, 'name' => 'Binnenkort', 'type' => null, 'photos' => []],
    ];
@endphp

<x-layouts.app title="Collectie">
    <section class="mx-auto max-w-7xl px-4 pt-20 pb-16 sm:px-8 sm:pt-28 lg:px-12 lg:pt-32">
        <h1 class="font-display text-5xl font-medium text-ivory sm:text-6xl lg:text-7xl">Collectie</h1>
    </section>

    <div class="mx-auto max-w-7xl px-4 pb-24 sm:px-8 sm:pb-32 lg:px-12">
        @foreach ($cars as $car)
            <section @if ($car['slug']) id="{{ $car['slug'] }}" @endif
                     class="grid scroll-mt-24 gap-8 border-t border-ivory/10 py-12 sm:py-16 lg:grid-cols-12 lg:gap-8"
                     aria-labelledby="car-{{ $loop->index }}">
                <div class="lg:col-span-3">
                    <h2 id="car-{{ $loop->index }}" class="font-display text-3xl font-medium text-balance text-ivory sm:text-4xl">
                        {{ $car['name'] }}
                    </h2>
                    @if ($car['type'])
                        <p class="mt-3 text-sm text-ivory/55">{{ $car['type'] }}</p>
                    @endif
                </div>

                @if ($car['photos'])
                    <x-gallery :photos="$car['photos']" class="lg:col-span-9" />
                @else
                    <div class="flex aspect-[3/1] items-center justify-center border border-dashed border-ivory/15 lg:col-span-9">
                        <p class="text-sm text-ivory/45">Deze auto volgt binnenkort.</p>
                    </div>
                @endif
            </section>
        @endforeach
    </div>
</x-layouts.app>
