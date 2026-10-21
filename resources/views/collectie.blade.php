<x-layouts.app title="Collectie">
    <section class="mx-auto max-w-7xl px-4 pt-20 pb-16 sm:px-8 sm:pt-28 lg:px-12 lg:pt-32">
        <h1 class="font-display text-5xl font-medium text-ivory sm:text-6xl lg:text-7xl">Collectie</h1>
    </section>

    <div class="mx-auto max-w-7xl px-4 pb-24 sm:px-8 sm:pb-32 lg:px-12">
        <ul class="grid gap-x-8 gap-y-16 border-t border-ivory/10 pt-12 sm:grid-cols-2 sm:pt-16 lg:grid-cols-3">
            @foreach ($cars as $car)
                <li>
                    <x-car-card :car="$car" />
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts.app>
