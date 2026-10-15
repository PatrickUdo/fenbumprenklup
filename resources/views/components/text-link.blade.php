@props([
    'href',
    'arrow' => false,
    'muted' => false,
])

<a href="{{ $href }}"
   {{ $attributes->class([
       'group inline-flex items-center gap-3 text-base underline decoration-1 underline-offset-[0.45em] transition-colors duration-300',
       'focus-visible:outline-1 focus-visible:outline-offset-4 focus-visible:outline-brass',
       'text-ivory decoration-brass hover:text-brass' => ! $muted,
       'text-ivory/70 decoration-ivory/25 hover:text-ivory hover:decoration-ivory/60' => $muted,
   ]) }}>
    {{ $slot }}
    @if ($arrow)
        <x-heroicon-o-arrow-long-right class="size-5 stroke-[1.25] transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true" />
    @endif
</a>
