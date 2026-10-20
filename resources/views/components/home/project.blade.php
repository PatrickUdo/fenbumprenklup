<section class="bg-night-800 py-24 sm:py-32 lg:py-40" aria-labelledby="work-title">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-8 lg:grid-cols-12 lg:items-center lg:gap-8 lg:px-12">
        <img src="{{ asset('images/auto/jaguar/69.webp') }}"
             alt="Het V12-motorblok van de Jaguar E-Type"
             class="aspect-[4/3] w-full object-cover lg:col-span-7"
             loading="lazy">

        <div class="max-w-md lg:col-span-4 lg:col-start-9">
            <h2 id="work-title" class="font-display text-4xl font-medium text-ivory sm:text-5xl">Wat wij doen</h2>

            <p class="mt-6 leading-relaxed text-ivory/70">
                Van periodiek onderhoud en secure reparaties tot aan een volledige, historisch correcte restauratie:
                wij bieden de zorg die uw auto verdient. In onze werkplaats te Winterswijk combineren we traditioneel
                ambacht met de precisie van nu.
            </p>

            <div class="mt-8">
                <x-text-link :href="route('projecten')" arrow>Neem een kijkje in onze werkplaats</x-text-link>
            </div>
        </div>
    </div>
</section>
