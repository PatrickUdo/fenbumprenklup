@php
    $items = config('site.navigation');
    $company = config('site.company');
@endphp

<footer class="border-t border-ivory/10 text-sm">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:grid-cols-2 sm:px-8 lg:grid-cols-12 lg:gap-8 lg:px-12 lg:py-20">
        <div class="sm:col-span-2 lg:col-span-4">
            <x-img src="images/logo.png" :alt="$company['name']" sizes="119px" class="h-16 w-auto" loading="lazy" />
            <p class="mt-6 max-w-64 leading-relaxed text-ivory/55">Klassieke auto's, gerestaureerd en bewaard sinds 1962.</p>
        </div>

        <div class="lg:col-span-3">
            <h2 class="text-ivory">Bezoekadres</h2>
            <address class="mt-3 leading-relaxed text-ivory/65 not-italic">
                {{ $company['visit']['street'] }}<br>
                {{ $company['visit']['postcode'] }} {{ $company['visit']['city'] }}
            </address>
        </div>

        <div class="lg:col-span-2">
            <h2 class="text-ivory">Openingstijden</h2>
            <p class="mt-3 leading-relaxed text-ivory/65">{{ $company['hours'] }}</p>
        </div>

        <div class="lg:col-span-3">
            <h2 class="text-ivory">Contact</h2>
            <p class="mt-3 leading-relaxed text-ivory/65">Een vraag of een afspraak maken?</p>
            <div class="mt-3">
                <x-text-link :href="route('contact')" arrow>Stuur een bericht</x-text-link>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-8 lg:px-12">
        <div class="flex flex-col gap-6 border-t border-ivory/10 py-8 md:flex-row md:items-center md:justify-between">
            <p class="flex flex-wrap gap-x-6 gap-y-1 text-xs text-ivory/55">
                <span>© {{ date('Y') }} {{ $company['legal_name'] }}</span>
                <span>KvK {{ $company['kvk'] }}</span>
                <span>Btw {{ $company['vat'] }}</span>
                <a href="{{ route('privacy') }}" class="underline decoration-ivory/25 underline-offset-4 transition-colors hover:text-ivory focus-visible:outline-1 focus-visible:outline-offset-4 focus-visible:outline-brass">Privacy</a>
                <a href="{{ route('cookies') }}" class="underline decoration-ivory/25 underline-offset-4 transition-colors hover:text-ivory focus-visible:outline-1 focus-visible:outline-offset-4 focus-visible:outline-brass">Cookies</a>
                @if (config('site.cookiebot.id'))
                    <button type="button" class="underline decoration-ivory/25 underline-offset-4 transition-colors hover:text-ivory focus-visible:outline-1 focus-visible:outline-offset-4 focus-visible:outline-brass" data-cookie-settings>
                        Cookie-instellingen
                    </button>
                @endif
            </p>

            <nav aria-label="Footermenu">
                <ul class="flex flex-wrap gap-x-8 gap-y-3">
                    @foreach ($items as $item)
                        <li>
                            <a href="{{ route($item['route']) }}" class="text-ivory/70 transition-colors hover:text-ivory focus-visible:outline-1 focus-visible:outline-offset-4 focus-visible:outline-brass">
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</footer>
