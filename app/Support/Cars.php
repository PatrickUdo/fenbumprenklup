<?php

namespace App\Support;

use Illuminate\Support\Collection;

/**
 * De auto's uit config/collectie.php, aangevuld met paden en URL's.
 */
class Cars
{
    /** @return Collection<int, array<string, mixed>> */
    public static function all(): Collection
    {
        return collect(config('collectie.cars'))->map(fn (array $car) => self::enrich($car));
    }

    /** @return array<string, mixed>|null */
    public static function find(string $slug): ?array
    {
        return self::all()->firstWhere('slug', $slug);
    }

    /** @return array<string, mixed> */
    private static function enrich(array $car): array
    {
        $photos = array_map(fn (string $number) => [
            'src' => "images/auto/{$car['slug']}/{$number}.webp",
            'alt' => $car['name'],
        ], $car['photos']);

        return [
            ...$car,
            'title' => "{$car['name']} ({$car['year']})",
            'url' => route('collectie.show', $car['slug']),
            'cover' => $photos[0]['src'],
            'gallery' => $photos,
            'og_image' => "images/og/{$car['slug']}.jpg",
        ];
    }
}
