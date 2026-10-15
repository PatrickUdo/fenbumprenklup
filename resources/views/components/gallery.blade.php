@props([
    // Lijst van ['src' => pad binnen public/, 'alt' => beschrijving]
    'photos' => [],
])

<div {{ $attributes->class('grid grid-cols-2 gap-2 sm:gap-3 lg:grid-cols-3') }} data-gallery>
    @foreach ($photos as $index => $photo)
        <button type="button"
                class="group relative block overflow-hidden bg-night-700 focus-visible:outline-1 focus-visible:outline-offset-2 focus-visible:outline-brass"
                data-gallery-item
                data-src="{{ asset($photo['src']) }}"
                data-alt="{{ $photo['alt'] }}">
            <img src="{{ asset($photo['src']) }}"
                 alt="{{ $photo['alt'] }}"
                 class="aspect-[3/2] w-full object-cover transition duration-700 ease-out group-hover:scale-[1.03] group-hover:brightness-110"
                 loading="lazy">
            <span class="sr-only">Vergroot foto {{ $index + 1 }} van {{ count($photos) }}</span>
        </button>
    @endforeach
</div>

{{-- Lightbox; één per pagina volstaat, de JS koppelt alle galerijen eraan --}}
@once
    <dialog class="m-0 size-full max-h-none max-w-none bg-night p-0 text-ivory backdrop:bg-transparent open:flex open:flex-col"
            aria-label="Foto's"
            data-lightbox>
        <div class="flex items-center justify-between px-4 py-3 sm:px-8">
            <p class="text-sm text-ivory/55" data-lightbox-counter></p>
            <button type="button"
                    class="inline-flex size-11 items-center justify-center text-ivory/80 hover:text-ivory focus-visible:outline-1 focus-visible:outline-brass"
                    data-lightbox-close>
                <span class="sr-only">Sluiten</span>
                <x-heroicon-o-x-mark class="size-6 stroke-[1.25]" aria-hidden="true" />
            </button>
        </div>

        <figure class="flex min-h-0 flex-1 flex-col items-center justify-center gap-4 px-4 pb-24 sm:px-20 sm:pb-6">
            <img class="max-h-full min-h-0 max-w-full object-contain" alt="" data-lightbox-image>
            <figcaption class="text-sm text-ivory/70" data-lightbox-caption></figcaption>
        </figure>

        <button type="button"
                class="absolute bottom-6 left-4 inline-flex size-11 sm:top-1/2 sm:bottom-auto sm:-translate-y-1/2 items-center justify-center text-ivory/70 hover:text-ivory focus-visible:outline-1 focus-visible:outline-brass sm:left-6"
                data-lightbox-prev>
            <span class="sr-only">Vorige foto</span>
            <x-heroicon-o-chevron-left class="size-7 stroke-[1.25]" aria-hidden="true" />
        </button>
        <button type="button"
                class="absolute right-4 bottom-6 inline-flex size-11 sm:top-1/2 sm:bottom-auto sm:-translate-y-1/2 items-center justify-center text-ivory/70 hover:text-ivory focus-visible:outline-1 focus-visible:outline-brass sm:right-6"
                data-lightbox-next>
            <span class="sr-only">Volgende foto</span>
            <x-heroicon-o-chevron-right class="size-7 stroke-[1.25]" aria-hidden="true" />
        </button>
    </dialog>
@endonce
