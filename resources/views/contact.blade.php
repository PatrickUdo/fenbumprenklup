@php
    $contactErrors = $errors->getBag('contact');
@endphp

<x-layouts.app title="Contact">
    <section class="mx-auto grid max-w-7xl gap-16 px-4 py-20 sm:px-8 sm:py-28 lg:grid-cols-12 lg:gap-8 lg:px-12 lg:py-32">
        {{-- Introductie --}}
        <div class="lg:col-span-4">
            <h1 class="font-display text-5xl font-medium text-ivory sm:text-6xl">Contact</h1>
            <p class="mt-6 max-w-sm text-lg leading-relaxed text-ivory/70">
                Een vraag over de collectie of een afspraak maken? Laat een bericht achter, dan nemen we contact met u op.
            </p>
        </div>

        {{-- Formulier --}}
        <div id="formulier" class="scroll-mt-28 lg:col-span-7 lg:col-start-6">
            @if (session('contact_sent'))
                <div class="border-t border-ivory/10 pt-10" role="status">
                    <h2 class="font-display text-3xl font-medium text-ivory sm:text-4xl">Bedankt voor uw bericht</h2>
                    <p class="mt-4 max-w-md text-lg leading-relaxed text-ivory/70">We nemen zo snel mogelijk contact met u op.</p>
                    <div class="mt-8">
                        <x-text-link :href="route('home')" arrow>Terug naar home</x-text-link>
                    </div>
                </div>
            @else
                <h2 class="sr-only">Contactformulier</h2>

                <form method="POST" action="{{ route('contact.store') }}" class="grid gap-x-8 gap-y-8 sm:grid-cols-2" novalidate>
                    @csrf

                    {{-- Honeypot tegen spam; mensen zien dit veld niet --}}
                    <div class="hidden" aria-hidden="true">
                        <label for="contact-website">Website</label>
                        <input type="text" id="contact-website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <x-form.field name="name" label="Naam" autocomplete="name" :errors="$contactErrors" />
                    <x-form.field name="email" label="E-mailadres" type="email" autocomplete="email" :errors="$contactErrors" />
                    <x-form.field name="phone" label="Telefoonnummer" type="tel" autocomplete="tel" :required="false" :errors="$contactErrors" class="sm:col-span-2" />
                    <x-form.field name="message" label="Bericht" textarea :errors="$contactErrors" class="sm:col-span-2" />

                    <div class="sm:col-span-2">
                        <button type="submit"
                                class="group inline-flex items-center gap-3 border border-ivory/30 px-6 py-3 text-base text-ivory transition-colors duration-300 hover:border-brass hover:bg-brass hover:text-night focus-visible:outline-1 focus-visible:outline-offset-4 focus-visible:outline-brass">
                            Versturen
                            <x-heroicon-o-arrow-long-right class="size-5 stroke-[1.25] transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true" />
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </section>
</x-layouts.app>
