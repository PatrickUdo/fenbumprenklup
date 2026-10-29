@php
    // Later uit Twill. Op datum van opname: 1–59 (eerste levering) met 60–68
    // (tweede levering) op hun plek ertussen.
    $order = [
        66, 67, ...range(1, 7), 68, 63, ...range(8, 18), 64, ...range(19, 25), 65, ...range(26, 34),
        62, ...range(35, 41), 60, ...range(42, 43), 61, ...range(44, 59),
    ];

    $photos = collect($order)
        ->map(fn (int $number) => [
            'src' => sprintf('images/projecten/%02d.webp', $number),
            'alt' => 'Projectfoto',
        ])
        ->all();
@endphp

<x-layouts.app title="Projecten">
    <section class="mx-auto max-w-7xl px-4 pt-20 pb-16 sm:px-8 sm:pt-28 lg:px-12 lg:pt-32">
        <h1 class="font-display text-5xl font-medium text-ivory sm:text-6xl lg:text-7xl">Projecten</h1>
    </section>

    <div class="mx-auto max-w-7xl px-4 pb-24 sm:px-8 sm:pb-32 lg:px-12">
        <x-gallery :photos="$photos" />
    </div>
</x-layouts.app>
