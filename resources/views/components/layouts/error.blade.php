@props([
    'code',
    'title',
    // Bij 503 (onderhoud) heeft een link naar home geen zin.
    'homeLink' => true,
])

{{-- Losstaande pagina zonder navbar en footer, zodat hij ook werkt als de rest van de site hapert --}}
<!DOCTYPE html>
<html lang="nl" class="bg-night">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#1a1815">
        <meta name="robots" content="noindex">

        <title>{{ $title }} – Fenbump Renklup</title>

        <x-favicons />

        @fonts
        @vite(['resources/css/app.css'])
    </head>
    <body class="flex min-h-dvh flex-col bg-night font-sans font-light text-ivory antialiased selection:bg-club-orange selection:text-night">
        <main class="flex flex-1 flex-col items-center justify-center px-6 py-16 text-center">
            <a href="{{ url('/') }}" class="focus-visible:outline-1 focus-visible:outline-offset-4 focus-visible:outline-brass">
                <img src="{{ asset('images/logo.png') }}" alt="Fenbump Renklup – home" width="608" height="328" class="h-20 w-auto sm:h-24">
            </a>

            <p class="mt-14 text-sm tracking-[0.3em] text-brass">{{ $code }}</p>

            <h1 class="mt-4 font-display text-5xl leading-[1.05] font-medium text-balance text-ivory sm:text-6xl">
                {{ $title }}
            </h1>

            <p class="mt-6 max-w-md text-lg leading-relaxed text-pretty text-ivory/70">
                {{ $slot }}
            </p>

            @if ($homeLink)
                <div class="mt-10">
                    <x-text-link :href="url('/')" arrow>Naar de homepage</x-text-link>
                </div>
            @endif
        </main>

        <footer class="pb-8 text-center text-xs text-ivory/55">
            Klassieke auto's, gerestaureerd en bewaard sinds 1962.
        </footer>
    </body>
</html>
