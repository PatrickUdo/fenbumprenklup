<?php

namespace App\Support;

/**
 * Kleinere versies van een afbeelding voor srcset. De versies maak je met
 * `php artisan images:variants` (ImageMagick, lokaal in DDEV) en worden
 * meegecommit: naast foto.webp staan dan foto-240w.webp, foto-480w.webp, ...
 */
class ResponsiveImage
{
    /** Breedtes in pixels; alleen breedtes kleiner dan het origineel worden gemaakt. */
    public const WIDTHS = [240, 480, 800, 1200];

    /** @var array<string, array{0: int, 1: int}|null> */
    private static array $dimensions = [];

    public static function variantPath(string $path, int $width): string
    {
        $info = pathinfo($path);

        return ($info['dirname'] === '.' ? '' : $info['dirname'].'/')."{$info['filename']}-{$width}w.webp";
    }

    public static function isVariant(string $path): bool
    {
        return (bool) preg_match('/-\d+w\.webp$/', $path);
    }

    /**
     * URL met versie op basis van de wijzigingsdatum, zodat een vervangen foto
     * met dezelfde naam niet een jaar uit de browsercache blijft komen.
     */
    public static function url(string $path): string
    {
        $file = public_path($path);

        return asset($path).(is_file($file) ? '?v='.dechex(filemtime($file)) : '');
    }

    /** @return array{0: int, 1: int}|null breedte en hoogte van het origineel */
    public static function dimensions(string $path): ?array
    {
        if (! array_key_exists($path, self::$dimensions)) {
            $size = @getimagesize(public_path($path));
            self::$dimensions[$path] = $size ? [$size[0], $size[1]] : null;
        }

        return self::$dimensions[$path];
    }

    public static function srcset(string $path): string
    {
        $candidates = collect(self::WIDTHS)
            ->filter(fn (int $width) => is_file(public_path(self::variantPath($path, $width))))
            ->map(fn (int $width) => self::url(self::variantPath($path, $width))." {$width}w");

        if ($size = self::dimensions($path)) {
            $candidates->push(self::url($path)." {$size[0]}w");
        }

        return $candidates->implode(', ');
    }
}
