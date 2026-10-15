<x-layouts.app>
    {{-- Tekst en foto's zijn placeholders (dummy-foto's: Achterhoek Tour Rally) --}}
    <x-hero :image="asset('images/dummy/atr-2026_69.webp')"
            alt="Rode Porsche 356 Cabriolet op een lommerrijke laan"
            caption="Porsche 356 Cabriolet">
        <x-slot:title>Klassiekers horen op de weg.</x-slot:title>

        Historische auto's, met liefde gerestaureerd en bewaard.

        <x-slot:actions>
            <x-text-link :href="route('collectie')" arrow>Bekijk de collectie</x-text-link>
            <x-text-link :href="route('projecten')" muted>Projecten</x-text-link>
        </x-slot:actions>
    </x-hero>

    <x-home.intro />

    <x-home.collection />

    <x-home.project />
</x-layouts.app>
