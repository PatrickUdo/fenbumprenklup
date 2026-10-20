@props([
    // Pad binnen public/, bijv. images/auto/jaguar/01.webp
    'src',
    'alt' => '',
    // Hoe breed de foto op het scherm wordt; bepaalt welke versie uit srcset de browser kiest.
    'sizes' => '100vw',
])

@php
    use App\Support\ResponsiveImage;

    $size = ResponsiveImage::dimensions($src);
@endphp

<img src="{{ ResponsiveImage::url($src) }}"
     srcset="{{ ResponsiveImage::srcset($src) }}"
     sizes="{{ $sizes }}"
     alt="{{ $alt }}"
     @if ($size) width="{{ $size[0] }}" height="{{ $size[1] }}" @endif
     {{ $attributes->merge(['decoding' => 'async']) }}>
