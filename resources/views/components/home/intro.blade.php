@php
    // Placeholder-tekst en -foto's (dummy: Achterhoek Tour Rally); later beheerbaar via Twill.
    $photos = [
        ['src' => 'images/dummy/atr-2026_67.webp', 'alt' => 'Bordeauxrode Porsche 356 Coupé met startnummer 236'],
        ['src' => 'images/dummy/atr-2026_38.webp', 'alt' => 'Oranje Porsche 911 Targa op een landweg'],
        ['src' => 'images/dummy/atr-2026_39.webp', 'alt' => 'Vooroorlogse raceauto met open cockpit'],
        ['src' => 'images/dummy/atr-2026_24.webp', 'alt' => 'Groene Porsche 911 met rallyverlichting'],
        ['src' => 'images/dummy/atr-2026_20.webp', 'alt' => 'Blauwe rallyauto met zwarte motorkap op een bomenlaan'],
        ['src' => 'images/dummy/atr-2026_37.webp', 'alt' => 'Zilveren Porsche 550 Spyder'],
    ];
@endphp

<section class="bg-night-800 py-24 sm:py-32 lg:py-40" aria-labelledby="intro-title">
    <div class="mx-auto max-w-7xl px-4 sm:px-8 lg:px-12">
        <h2 id="intro-title" class="sr-only">Over Fenbump Renklup</h2>

        <p class="max-w-4xl font-display text-3xl leading-[1.18] font-medium text-pretty text-ivory sm:text-4xl lg:text-5xl">
            Sinds 1962 verzamelen, restaureren en rijden we klassieke auto's. Niet om ze achter glas te zetten,
            maar om ze op de weg te houden.
        </p>

        <div class="mt-10">
            <x-text-link :href="route('wie-zijn-wij')" arrow>Over Fenbump Renklup</x-text-link>
        </div>

        <x-gallery :photos="$photos" class="mt-20 sm:mt-24" />
    </div>
</section>
