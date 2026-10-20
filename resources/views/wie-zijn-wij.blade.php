<x-layouts.app title="Wie zijn wij">
    {{-- Wie wij zijn --}}
    <section class="mx-auto max-w-7xl px-4 pt-20 pb-16 sm:px-8 sm:pt-28 lg:px-12 lg:pt-32">
        <h1 class="font-display text-5xl font-medium text-ivory sm:text-6xl lg:text-7xl">Wie wij zijn</h1>

        <p class="mt-8 max-w-3xl font-display text-2xl leading-[1.35] text-pretty text-ivory/90 sm:text-3xl">
            Wij zijn een team van gepassioneerde vakmensen met een diepgewortelde liefde voor historische techniek.
        </p>

        <p class="mt-6 max-w-2xl text-lg leading-relaxed text-pretty text-ivory/70">
            Waar moderne auto's worden uitgelezen, vertrouwen wij op ons getrainde oog, ons gehoor en decennia aan
            specialistische kennis. Wij behandelen elke auto alsof het die van onszelf is: met het grootste respect,
            uiterste discretie en oog voor elk origineel detail.
        </p>
    </section>

    <figure class="mx-auto max-w-7xl px-4 sm:px-8 lg:px-12">
        <x-img src="images/auto/jaguar/44.webp"
               alt="Cognackleurige lederen bagageruimte van de Jaguar E-Type, gezien door de geopende achterklep"
               sizes="(min-width: 1280px) 1184px, 100vw"
               class="aspect-[4/3] w-full object-cover sm:aspect-[21/9]" />
        <figcaption class="mt-4 text-sm text-ivory/55">Jaguar E-Type V12</figcaption>
    </figure>

    {{-- Een gedeelde passie en persoonlijk contact --}}
    <section class="mx-auto grid max-w-7xl gap-12 px-4 py-24 sm:px-8 sm:py-32 lg:grid-cols-12 lg:items-center lg:gap-8 lg:px-12">
        <div class="lg:col-span-6">
            <h2 class="font-display text-4xl font-medium text-balance text-ivory sm:text-5xl">Een gedeelde passie en persoonlijk contact</h2>

            <div class="mt-6 max-w-xl space-y-5 text-lg leading-relaxed text-pretty text-ivory/70">
                <p>
                    Wij geloven dat het onderhouden of restaureren van een klassieker een gezamenlijk project is. Bij ons
                    bent u geen nummer, maar een partner in het proces. Wij nemen uitgebreid de tijd om naar uw wensen te
                    luisteren en houden van korte, transparante lijnen.
                </p>
                <p>
                    Gedurende de werkzaamheden betrekken we u nauw bij elke stap: u bent altijd welkom op afspraak in de
                    werkplaats om de voortgang met eigen ogen te bekijken onder het genot van een goede kop koffie. Die
                    persoonlijke band met onze cliënten is het fundament van ons werk.
                </p>
            </div>
        </div>

        <figure class="lg:col-span-5 lg:col-start-8">
            <x-img src="images/auto/talbot/33.webp"
                   alt="Interieur van de Talbot met bruin leder en houten dashboard"
                   sizes="(min-width: 1024px) 42vw, 100vw"
                   class="aspect-[4/5] w-full object-cover"
                   loading="lazy" />
            <figcaption class="mt-4 text-sm text-ivory/55">Talbot</figcaption>
        </figure>
    </section>

    {{-- Wat wij doen --}}
    <section class="bg-night-800 py-24 sm:py-32">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-8 lg:grid-cols-12 lg:items-center lg:gap-8 lg:px-12">
            <figure class="lg:col-span-6">
                <x-img src="images/auto/ferrari/48.webp"
                       alt="Motorruimte van de zilveren Ferrari"
                       sizes="(min-width: 1024px) 50vw, 100vw"
                       class="aspect-[4/3] w-full object-cover"
                       loading="lazy" />
                <figcaption class="mt-4 text-sm text-ivory/55">Ferrari</figcaption>
            </figure>

            <div class="lg:col-span-5 lg:col-start-8">
                <h2 class="font-display text-4xl font-medium text-ivory sm:text-5xl">Wat wij doen</h2>

                <p class="mt-6 max-w-xl text-lg leading-relaxed text-pretty text-ivory/70">
                    Van periodiek onderhoud en secure reparaties tot aan een volledige, historisch correcte restauratie:
                    wij bieden de zorg die uw auto verdient. In onze werkplaats te Winterswijk combineren we traditioneel
                    ambacht met de precisie van nu. Van secuur basisonderhoud tot de reconstructie van unieke mechanica,
                    wij streven naar mechanische perfectie.
                </p>

                <div class="mt-8">
                    <x-text-link :href="route('projecten')" arrow>Neem een kijkje in onze werkplaats</x-text-link>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
