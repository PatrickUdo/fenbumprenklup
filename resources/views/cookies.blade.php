@php
    $cookiebotId = config('site.cookiebot.id');
@endphp

<x-layouts.app title="Cookies">
    <section class="mx-auto max-w-7xl px-4 pt-20 pb-24 sm:px-8 sm:pt-28 sm:pb-32 lg:px-12 lg:pt-32">
        <h1 class="font-display text-5xl font-medium text-ivory sm:text-6xl lg:text-7xl">Cookies</h1>

        <p class="mt-8 max-w-2xl text-lg leading-relaxed text-pretty text-ivory/70">
            Hieronder ziet u welke cookies deze website gebruikt en waarvoor. Uw toestemming kunt u altijd aanpassen.
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
            <div class="cookie-declaration mt-16 max-w-3xl border-t border-ivory/10 pt-10 leading-relaxed text-ivory/70">
                <script id="CookieDeclaration" src="https://consent.cookiebot.com/{{ $cookiebotId }}/cd.js" type="text/javascript" async></script>
            </div>
        @endif
    </section>
</x-layouts.app>
