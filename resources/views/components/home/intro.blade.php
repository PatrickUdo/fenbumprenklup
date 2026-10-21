@php
    $photos = [
        ['src' => 'images/auto/jaguar/21.webp', 'alt' => 'Jaguar E-Type V12 van voren'],
        ['src' => 'images/auto/ferrari/62.webp', 'alt' => 'Houten stuur met Ferrari-embleem'],
        ['src' => 'images/auto/talbot/01.webp', 'alt' => 'Talbot Sports Tourer van achteren'],
        ['src' => 'images/auto/jaguar/67.webp', 'alt' => 'V12-motor van de Jaguar E-Type'],
        ['src' => 'images/auto/ferrari/08.webp', 'alt' => 'Zilveren Ferrari op een landweg'],
        ['src' => 'images/auto/talbot/37.webp', 'alt' => 'Klokken in het houten dashboard van de Talbot'],
    ];
@endphp

<section class="bg-night-800 py-24 sm:py-32 lg:py-40" aria-labelledby="intro-title">
    <div class="mx-auto max-w-7xl px-4 sm:px-8 lg:px-12">
        <h2 id="intro-title" class="sr-only">Over Fenbump Renklup</h2>

        <p class="max-w-4xl font-display text-3xl leading-[1.18] font-medium text-pretty text-ivory sm:text-4xl lg:text-5xl">
            Het is een tastbaar stuk historie, een technisch kunstwerk en pure emotie op wielen.
        </p>

        <p class="mt-8 max-w-2xl text-lg leading-relaxed text-pretty text-ivory/70">
            Bij Fenbump Renklup begrijpen we die passie als geen ander. Wij hebben ons toegelegd op het in stand
            houden, verfijnen en perfectioneren van uw klassieker, zodat de ziel van de auto behouden blijft voor
            de toekomst.
        </p>

        <div class="mt-10">
            <x-text-link :href="route('wie-zijn-wij')" arrow>Over Fenbump Renklup</x-text-link>
        </div>

        <x-gallery :photos="$photos" class="mt-20 sm:mt-24" />
    </div>
</section>
