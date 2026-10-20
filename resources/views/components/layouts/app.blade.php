<!DOCTYPE html>
<html lang="nl" class="bg-night">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#1a1815">

        <x-seo :title="$title ?? null" />

        <x-favicons />

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-night font-sans font-light text-ivory antialiased selection:bg-club-orange selection:text-night">
        <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-50 focus:bg-ivory focus:px-4 focus:py-2 focus:text-night">
            Naar de inhoud
        </a>

        <x-navbar />

        <main id="main">
            {{ $slot }}
        </main>

        <x-footer />
    </body>
</html>
