<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComingSoon
{
    private const PREVIEW_COOKIE = 'coming_soon_preview';

    public function handle(Request $request, Closure $next): Response
    {
        $settings = config('site.coming_soon');

        if (! $settings['enabled'] || $this->isExempt($request)) {
            return $next($request);
        }

        // Previewlink: zet een cookie zodat de rest van de site ook zichtbaar is.
        $secret = $settings['secret'];
        if (filled($secret) && hash_equals($secret, (string) $request->query('preview'))) {
            return redirect($request->url())
                ->withCookie(cookie()->forever(self::PREVIEW_COOKIE, hash('sha256', $secret)));
        }

        if (filled($secret) && hash_equals(hash('sha256', $secret), (string) $request->cookie(self::PREVIEW_COOKIE))) {
            return $next($request);
        }

        if (auth('twill_users')->check()) {
            return $next($request);
        }

        return response()->view('coming-soon');
    }

    private function isExempt(Request $request): bool
    {
        $admin = trim(config('twill.admin_app_path', 'admin'), '/');

        return ($admin !== '' && $request->is($admin, $admin.'/*'))
            || $request->is('up', 'robots.txt', 'sitemap.xml');
    }
}
