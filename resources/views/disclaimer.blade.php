@php
    $company = config('site.company');
    $link = 'text-ivory underline decoration-brass underline-offset-[0.3em] hover:text-brass';
@endphp

<x-layouts.app title="Disclaimer">
    <section class="mx-auto max-w-7xl px-4 pt-20 pb-24 sm:px-8 sm:pt-28 sm:pb-32 lg:px-12 lg:pt-32">
        <h1 class="font-display text-5xl font-medium text-ivory sm:text-6xl lg:text-7xl">Disclaimer</h1>
        <p class="mt-6 text-sm text-ivory/55">Laatst bijgewerkt: 21 oktober 2026</p>

        <div class="mt-12 max-w-3xl space-y-6 text-lg leading-relaxed text-pretty text-ivory/75">
            <p>
                Wij stellen de informatie op deze website met zorg samen. Toch kan het gebeuren dat informatie
                onvolledig, verouderd of onjuist is. Aan de inhoud van deze website kunnen daarom geen rechten worden
                ontleend.
            </p>
            <p>
                Dit geldt ook voor de auto's in onze collectie. Beschrijvingen, specificaties, kilometerstanden en
                foto's zijn bedoeld als indicatie en zijn geen vaststaande feiten. Het aanbod is vrijblijvend en kan
                zonder bericht veranderen. Wilt u zekerheid over een auto, neem dan
                <a href="{{ route('contact') }}" class="{{ $link }}">contact</a> met ons op.
            </p>
            <p>
                {{ $company['legal_name'] }} is niet aansprakelijk voor schade die ontstaat door het gebruik van deze
                website of van de informatie erop.
            </p>
            <p>
                De teksten en foto's op deze website zijn van {{ $company['legal_name'] }}. U mag ze niet zonder onze
                toestemming overnemen.
            </p>
        </div>
    </section>
</x-layouts.app>
