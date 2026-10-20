<x-layouts.app>
    <x-hero :image="asset('images/auto/jaguar/01.webp')"
            alt="Rode Jaguar E-Type V12 op een landweg in de winterzon"
            caption="Jaguar E-Type V12">
        <x-slot:title>Het behoud van mobiel erfgoed.</x-slot:title>

        Een klassieke auto is zoveel meer dan een vervoersmiddel.

        <x-slot:actions>
            <x-text-link :href="route('collectie')" arrow>Bekijk de collectie</x-text-link>
            <x-text-link :href="route('projecten')" muted>Projecten</x-text-link>
        </x-slot:actions>
    </x-hero>

    <x-home.intro />

    <x-home.collection />

    <x-home.project />
</x-layouts.app>
