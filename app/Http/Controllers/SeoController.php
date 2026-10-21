<?php

namespace App\Http\Controllers;

use App\Support\Cars;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    public function robots(): Response
    {
        $admin = trim(config('twill.admin_app_path', 'admin'), '/');
        $base = rtrim(config('app.url'), '/');

        $lines = [
            'User-agent: *',
            'Disallow: /'.$admin.'/',
            '',
            'Sitemap: '.$base.'/sitemap.xml',
        ];

        return response(implode("\n", $lines)."\n")
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    public function sitemap(): Response
    {
        $base = rtrim(config('app.url'), '/');

        // Alle pagina's uit het hoofdmenu en alle auto's, met het hoofddomein uit APP_URL.
        $urls = collect(config('site.navigation'))
            ->map(fn (array $item) => $base.route($item['route'], absolute: false))
            ->merge(Cars::all()->map(fn (array $car) => $base.route('collectie.show', $car['slug'], absolute: false)));

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
