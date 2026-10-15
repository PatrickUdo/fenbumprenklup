{{-- Placeholder-project (dummy-foto: Achterhoek Tour Rally); later uit Twill. --}}
<section class="bg-night-800 py-24 sm:py-32 lg:py-40" aria-labelledby="project-title">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-8 lg:grid-cols-12 lg:items-center lg:gap-8 lg:px-12">
        <img src="{{ asset('images/dummy/atr-2026_74.webp') }}"
             alt="Witte Porsche 356 Coupé in raceuitvoering op een bomenlaan"
             class="aspect-[4/3] w-full object-cover lg:col-span-7"
             loading="lazy">

        <div class="max-w-md lg:col-span-4 lg:col-start-9">
            <h2 id="project-title" class="font-display text-4xl font-medium text-ivory sm:text-5xl">In de werkplaats</h2>

            <h3 class="mt-8 text-lg font-normal text-ivory">Porsche 356 Coupé</h3>
            <p class="mt-1 text-sm text-brass">Lopend project</p>

            <p class="mt-5 leading-relaxed text-ivory/70">
                Een volledige restauratie: carrosserie, motor en interieur worden stap voor stap hersteld. Elke fase
                leggen we vast, van de eerste demontage tot de laatste proefrit.
            </p>

            <div class="mt-8">
                <x-text-link :href="route('projecten')" arrow>Alle projecten</x-text-link>
            </div>
        </div>
    </div>
</section>
