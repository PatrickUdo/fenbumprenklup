@props([
    // Een auto uit App\Support\Cars
    'car',
    'sizes' => '(min-width: 1280px) 400px, (min-width: 640px) 50vw, 100vw',
    // Kopniveau, zodat de kaart zowel onder een h1 als onder een h2 past
    'heading' => 'h2',
])

<a href="{{ $car['url'] }}"
   {{ $attributes->class('group block focus-visible:outline-1 focus-visible:outline-offset-4 focus-visible:outline-brass') }}>
    <div class="overflow-hidden bg-night-700">
        <x-img :src="$car['cover']"
               :alt="$car['name']"
               :sizes="$sizes"
               class="aspect-[3/2] w-full object-cover transition duration-700 ease-out group-hover:scale-[1.03] group-hover:brightness-110"
               loading="lazy" />
    </div>

    <p class="mt-5 text-sm text-ivory/55">{{ $car['year'] }} · {{ $car['type'] }}</p>
    <{{ $heading }} class="mt-1 font-display text-2xl font-medium text-balance text-ivory transition-colors group-hover:text-brass sm:text-3xl">
        {{ $car['name'] }}
    </{{ $heading }}>
    <p class="mt-2 text-ivory/65">{{ $car['tagline'] }}</p>
</a>
