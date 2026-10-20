<!DOCTYPE html>
<html lang="nl" class="bg-night">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#1a1815">
        <meta name="robots" content="noindex">
        <meta name="description" content="De nieuwe website van Fenbump Renklup is in de maak.">

        <title>Fenbump Renklup – Hier komt wat moois</title>

        <x-favicons />

        @fonts
        @vite(['resources/css/app.css'])
    </head>
    <body class="flex min-h-dvh flex-col bg-night font-sans font-light text-ivory antialiased selection:bg-club-orange selection:text-night">
        <main class="flex flex-1 flex-col items-center justify-center px-6 py-16 text-center">
            <x-img src="images/logo.png" alt="Fenbump Renklup" sizes="267px" class="h-28 w-auto sm:h-36" />

            <h1 class="mt-12 font-display text-5xl leading-[1.05] font-medium text-balance text-ivory sm:text-6xl lg:text-7xl">
                Hier komt wat moois.
            </h1>

            <p class="mt-6 max-w-md text-lg leading-relaxed text-pretty text-ivory/70">
                De nieuwe website van Fenbump Renklup is in de maak.
            </p>
        </main>

        <footer class="pb-8 text-center text-xs text-ivory/55">
            Klassieke auto's, gerestaureerd en bewaard sinds 1962.
        </footer>
    </body>
</html>
