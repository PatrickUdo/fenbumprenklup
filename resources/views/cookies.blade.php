@php
    $company = config('site.company');
    $cookiebotId = config('site.cookiebot.id');

    // Namen en bewaartermijnen uit de configuratie, zodat deze pagina klopt als die verandert.
    $lifetime = (int) config('session.lifetime');
    $duration = $lifetime % 60 === 0 ? ($lifetime / 60).' uur' : "{$lifetime} minuten";

    $cookies = [
        [
            'name' => config('session.cookie'),
            'purpose' => 'Onthoudt uw bezoek tijdens het gebruik van de website, zodat bijvoorbeeld het contactformulier foutmeldingen en uw ingevulde gegevens kan tonen.',
            'duration' => $duration,
        ],
        [
            'name' => 'XSRF-TOKEN',
            'purpose' => 'Beveiligt het contactformulier tegen misbruik door andere websites.',
            'duration' => $duration,
        ],
        [
            'name' => 'coming_soon_preview',
            'purpose' => 'Alleen voor wie een previewlink van ons heeft gekregen: onthoudt dat u de website mag bekijken voordat deze openbaar is.',
            'duration' => 'Maximaal 400 dagen',
        ],
    ];
@endphp

<x-layouts.app title="Cookies">
    <section class="mx-auto max-w-7xl px-4 pt-20 pb-24 sm:px-8 sm:pt-28 sm:pb-32 lg:px-12 lg:pt-32">
        <h1 class="font-display text-5xl font-medium text-ivory sm:text-6xl lg:text-7xl">Cookieverklaring</h1>
        <p class="mt-6 text-sm text-ivory/55">Laatst bijgewerkt: 21 oktober 2026</p>

        <div class="mt-12 max-w-3xl space-y-14 text-lg leading-relaxed text-pretty text-ivory/75">
            <section>
                <h2 class="font-display text-3xl font-medium text-ivory sm:text-4xl">Wat zijn cookies?</h2>
                <p class="mt-5">
                    Cookies zijn kleine tekstbestanden die een website op uw computer, tablet of telefoon opslaat. Ze
                    zorgen er bijvoorbeeld voor dat een website onthoudt wat u eerder heeft gedaan of ingevuld.
                </p>
            </section>

            <section>
                <h2 class="font-display text-3xl font-medium text-ivory sm:text-4xl">Welke cookies gebruiken wij?</h2>
                <p class="mt-5">
                    Deze website gebruikt alleen <strong class="font-normal text-ivory">functionele cookies</strong>: cookies die nodig zijn om
                    de website goed en veilig te laten werken. Wij gebruiken geen cookies om uw surfgedrag te volgen,
                    geen analytische cookies en geen advertentie- of social-mediacookies. Er worden ook geen cookies van
                    andere partijen geplaatst{{ $cookiebotId ? ', behalve de cookie waarmee Cookiebot uw cookievoorkeur onthoudt' : '' }}.
                </p>

                <div class="mt-8 overflow-x-auto">
                    <table class="w-full min-w-[36rem] border-y border-ivory/10 text-left text-base">
                        <thead>
                            <tr class="border-b border-ivory/10 text-sm text-ivory/55">
                                <th scope="col" class="py-3 pr-6 font-normal">Cookie</th>
                                <th scope="col" class="py-3 pr-6 font-normal">Doel</th>
                                <th scope="col" class="py-3 font-normal whitespace-nowrap">Bewaartermijn</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-ivory/10">
                            @foreach ($cookies as $cookie)
                                <tr class="align-top">
                                    <td class="py-4 pr-6 font-mono text-sm text-ivory">{{ $cookie['name'] }}</td>
                                    <td class="py-4 pr-6 text-ivory/75">{{ $cookie['purpose'] }}</td>
                                    <td class="py-4 whitespace-nowrap text-ivory/75">{{ $cookie['duration'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <p class="mt-6 text-base text-ivory/60">
                    Medewerkers die inloggen in het beheer van de website krijgen daarnaast een cookie die hen ingelogd
                    houdt. Voor bezoekers van de website geldt dit niet.
                </p>
            </section>

            <section>
                <h2 class="font-display text-3xl font-medium text-ivory sm:text-4xl">Toestemming</h2>
                <p class="mt-5">
                    Voor functionele cookies is volgens de Telecommunicatiewet geen toestemming nodig. Daarom vragen wij
                    u niet om cookies te accepteren. Gaan wij in de toekomst andere cookies gebruiken, dan vragen wij
                    daar eerst uw toestemming voor en passen wij deze verklaring aan.
                </p>

                @if ($cookiebotId)
                    <div class="mt-8">
                        <button type="button"
                                class="group inline-flex items-center gap-3 border border-ivory/30 px-6 py-3 text-base text-ivory transition-colors duration-300 hover:border-brass hover:bg-brass hover:text-night focus-visible:outline-1 focus-visible:outline-offset-4 focus-visible:outline-brass"
                                data-cookie-settings>
                            Cookie-instellingen aanpassen
                        </button>
                    </div>

                    {{-- Overzicht van alle cookies, door Cookiebot bijgehouden --}}
                    <div class="cookie-declaration mt-10 border-t border-ivory/10 pt-8 text-base">
                        <script id="CookieDeclaration" src="https://consent.cookiebot.com/{{ $cookiebotId }}/cd.js" type="text/javascript" async></script>
                    </div>
                @endif
            </section>

            <section>
                <h2 class="font-display text-3xl font-medium text-ivory sm:text-4xl">Cookies verwijderen of blokkeren</h2>
                <p class="mt-5">
                    U kunt cookies altijd zelf verwijderen of blokkeren via de instellingen van uw browser. Kijk
                    hiervoor in de help van uw browser, bijvoorbeeld Chrome, Safari, Firefox of Edge. Houd er rekening
                    mee dat het contactformulier dan mogelijk niet meer werkt.
                </p>
            </section>

            <section>
                <h2 class="font-display text-3xl font-medium text-ivory sm:text-4xl">Vragen</h2>
                <p class="mt-5">
                    Heeft u vragen over deze cookieverklaring? Neem dan contact met ons op via het
                    <a href="{{ route('contact') }}" class="text-ivory underline decoration-brass underline-offset-[0.3em] hover:text-brass">contactformulier</a>.
                </p>
                <address class="mt-6 text-base leading-relaxed text-ivory/60 not-italic">
                    {{ $company['legal_name'] }}<br>
                    {{ $company['visit']['street'] }}, {{ $company['visit']['postcode'] }} {{ $company['visit']['city'] }}<br>
                    KvK {{ $company['kvk'] }}
                </address>
            </section>
        </div>
    </section>
</x-layouts.app>
