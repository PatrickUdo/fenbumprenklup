<?php

namespace App\Console\Commands;

use App\Support\ResponsiveImage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;

class ImageVariants extends Command
{
    protected $signature = 'images:variants
        {--force : Bestaande versies opnieuw maken}';

    protected $description = 'Maak kleinere WebP-versies van de foto\'s in public/images voor srcset (vereist ImageMagick, draai in DDEV)';

    /** Mappen binnen public/ waarvan versies worden gemaakt. */
    private const DIRECTORIES = ['images/auto', 'images/projecten'];

    /** Losse afbeeldingen die ook versies krijgen. */
    private const FILES = ['images/logo.png'];

    public function handle(): int
    {
        if (! Process::run(['magick', '-version'])->successful()) {
            $this->components->error('ImageMagick (magick) is niet gevonden. Draai dit commando in DDEV: ddev artisan images:variants');

            return self::FAILURE;
        }

        $sources = collect(self::DIRECTORIES)
            ->flatMap(fn (string $dir) => File::allFiles(public_path($dir)))
            ->map(fn ($file) => str_replace(public_path().'/', '', $file->getPathname()))
            ->merge(self::FILES)
            ->filter(fn (string $path) => preg_match('/\.(webp|jpe?g|png)$/i', $path) && ! ResponsiveImage::isVariant($path))
            ->sort()
            ->values();

        $made = 0;

        foreach ($sources as $path) {
            [$width] = ResponsiveImage::dimensions($path) ?? [0];

            foreach (ResponsiveImage::WIDTHS as $target) {
                $variant = ResponsiveImage::variantPath($path, $target);

                if ($target >= $width || (! $this->option('force') && is_file(public_path($variant)))) {
                    continue;
                }

                Process::run([
                    'magick', public_path($path),
                    '-auto-orient', '-resize', "{$target}x", '-strip', '-quality', '78',
                    public_path($variant),
                ])->throw();

                $made++;
            }
        }

        $this->components->info("{$made} versies gemaakt van {$sources->count()} afbeeldingen.");

        return self::SUCCESS;
    }
}
