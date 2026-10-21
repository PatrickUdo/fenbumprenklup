@php
    $company = config('site.company');
    $lifetime = (int) config('session.lifetime');
    $sessionDuration = $lifetime % 60 === 0 ? ($lifetime / 60).' uur' : "{$lifetime} minuten";

    $link = 'text-ivory underline decoration-brass underline-offset-[0.3em] hover:text-brass';
@endphp

<x-layouts.app title="Privacyverklaring">
    <section class="mx-auto max-w-7xl px-4 pt-20 pb-24 sm:px-8 sm:pt-28 sm:pb-32 lg:px-12 lg:pt-32">
        <h1 class="font-display text-5xl font-medium text-ivory sm:text-6xl lg:text-7xl">Privacyverklaring</h1>
        <p class="mt-6 text-sm text-ivory/55">Laatst bijgewerkt: 21 oktober 2026</p>

        <div class="mt-12 max-w-3xl space-y-14 text-lg leading-relaxed text-pretty text-ivory/75">
            <section>
                <p>
                    {{ $company['legal_name'] }} gaat zorgvuldig om met uw persoonsgegevens. In deze privacyverklaring
                    leest u welke gegevens wij verwerken, waarom we dat doen, hoe lang we ze bewaren en welke rechten u
                    heeft. Wij houden ons daarbij aan de Algemene Verordening Gegevensbescherming (AVG).
                </p>
            </section>

            <section>
                <h2 class="font-display text-3xl font-medium text-ivory sm:text-4xl">Wie zijn wij?</h2>
                <p class="mt-5">
                    {{ $company['legal_name'] }} is verantwoordelijk voor de verwerking van persoonsgegevens zoals
                    beschreven in deze verklaring.
                </p>
                <address class="mt-6 text-base leading-relaxed text-ivory/60 not-italic">
                    {{ $company['legal_name'] }}<br>
                    {{ $company['visit']['street'] }}<br>
                    {{ $company['visit']['postcode'] }} {{ $company['visit']['city'] }}<br>
                    KvK {{ $company['kvk'] }}
                </address>
            </section>

            <section>
                <h2 class="font-display text-3xl font-medium text-ivory sm:text-4xl">Welke gegevens verwerken wij en waarom?</h2>

                <h3 class="mt-8 text-xl text-ivory">Contactformulier</h3>
                <p class="mt-3">
                    Als u het contactformulier invult, ontvangen wij uw naam, e-mailadres, telefoonnummer (als u dat
                    invult) en uw bericht. Wij gebruiken deze gegevens alleen om uw vraag te beantwoorden en, als u
                    daarom vraagt, een afspraak met u te maken. Het formulier stuurt uw bericht per e-mail naar ons; de
                    website zelf slaat uw bericht niet op.
                </p>
                <p class="mt-3 text-base text-ivory/60">
                    Grondslag: het nemen van stappen op uw verzoek voorafgaand aan een eventuele overeenkomst, of ons
                    gerechtvaardigd belang om uw vraag te beantwoorden.
                </p>

                <h3 class="mt-8 text-xl text-ivory">Bezoek aan de website</h3>
                <p class="mt-3">
                    Om de website goed en veilig te laten werken, slaan wij tijdens uw bezoek uw IP-adres en het type
                    browser tijdelijk op bij uw sessie. Wij gebruiken deze gegevens niet om u te volgen of een profiel
                    van u te maken. Welke cookies de website gebruikt, leest u in onze
                    <a href="{{ route('cookies') }}" class="{{ $link }}">cookieverklaring</a>.
                </p>
                <p class="mt-3 text-base text-ivory/60">
                    Grondslag: ons gerechtvaardigd belang om de website te laten werken en te beveiligen.
                </p>
            </section>

            <section>
                <h2 class="font-display text-3xl font-medium text-ivory sm:text-4xl">Hoe lang bewaren wij uw gegevens?</h2>
                <ul class="mt-5 list-disc space-y-2 pl-5 marker:text-brass">
                    <li><span class="text-ivory">Berichten via het contactformulier:</span> zolang nodig om uw vraag af te handelen, en uiterlijk twee jaar na het laatste contact.</li>
                    <li><span class="text-ivory">Sessiegegevens van de website:</span> {{ $sessionDuration }} na uw laatste bezoek.</li>
                </ul>
            </section>

            <section>
                <h2 class="font-display text-3xl font-medium text-ivory sm:text-4xl">Met wie delen wij uw gegevens?</h2>
                <p class="mt-5">
                    Wij verkopen uw gegevens niet en delen ze alleen met partijen die nodig zijn om de website en onze
                    e-mail te laten werken, of als de wet ons daartoe verplicht.
                </p>
                <p class="mt-5">
                    De website gebruikt geen analyse- of advertentiediensten en laadt geen lettertypen, video's of
                    kaarten van andere partijen.
                </p>
            </section>

            <section>
                <h2 class="font-display text-3xl font-medium text-ivory sm:text-4xl">Beveiliging</h2>
                <p class="mt-5">
                    Wij nemen passende maatregelen om uw gegevens te beschermen tegen verlies en onbevoegd gebruik. De
                    website gebruikt een beveiligde verbinding (https) en het contactformulier is beschermd tegen spam
                    en misbruik.
                </p>
            </section>

            <section>
                <h2 class="font-display text-3xl font-medium text-ivory sm:text-4xl">Uw rechten</h2>
                <p class="mt-5">U heeft het recht om:</p>
                <ul class="mt-4 list-disc space-y-2 pl-5 marker:text-brass">
                    <li>uw gegevens in te zien;</li>
                    <li>onjuiste gegevens te laten corrigeren;</li>
                    <li>uw gegevens te laten verwijderen, voor zover wij ze niet wettelijk moeten bewaren;</li>
                    <li>de verwerking van uw gegevens te laten beperken;</li>
                    <li>bezwaar te maken tegen de verwerking op basis van ons gerechtvaardigd belang;</li>
                    <li>uw gegevens in een gangbaar bestandsformaat te ontvangen.</li>
                </ul>
                <p class="mt-5">
                    Wilt u een van deze rechten gebruiken? Stuur ons dan een bericht via het
                    <a href="{{ route('contact') }}" class="{{ $link }}">contactformulier</a> of per post. Wij reageren
                    binnen een maand. Om zeker te weten dat het verzoek van u komt, kunnen wij u vragen om u te
                    identificeren.
                </p>
                <p class="mt-5">
                    Bent u niet tevreden over hoe wij met uw gegevens omgaan? Laat het ons weten, dan zoeken we samen
                    naar een oplossing. U kunt ook een klacht indienen bij de
                    <a href="https://autoriteitpersoonsgegevens.nl" class="{{ $link }}" rel="noopener">Autoriteit Persoonsgegevens</a>.
                </p>
            </section>

            <section>
                <h2 class="font-display text-3xl font-medium text-ivory sm:text-4xl">Wijzigingen</h2>
                <p class="mt-5">
                    Wij kunnen deze privacyverklaring aanpassen, bijvoorbeeld als de website verandert. De datum
                    bovenaan laat zien wanneer de verklaring voor het laatst is bijgewerkt.
                </p>
            </section>
        </div>
    </section>
</x-layouts.app>
