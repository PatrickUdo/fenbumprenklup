<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config(['app.url' => 'https://fenbumprenklup.nl', 'site.coming_soon.enabled' => false]);
    }

    public function test_every_page_has_its_own_title_description_and_canonical(): void
    {
        foreach (config('site.navigation') as $item) {
            $page = config("site.seo.pages.{$item['route']}");
            $path = route($item['route'], absolute: false);

            $this->get($path)
                ->assertOk()
                ->assertSee('<title>'.e($page['title']).'</title>', false)
                ->assertSee('<meta name="description" content="'.e($page['description']).'">', false)
                ->assertSee('<link rel="canonical" href="https://fenbumprenklup.nl'.$path.'">', false)
                ->assertSee('application/ld+json', false);
        }
    }

    public function test_canonical_ignores_the_query_string(): void
    {
        $this->get('/contact?utm_source=test')
            ->assertSee('<link rel="canonical" href="https://fenbumprenklup.nl/contact">', false);
    }

    public function test_robots_txt_points_to_the_sitemap_and_hides_the_admin(): void
    {
        $this->get('/robots.txt')
            ->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSee('Disallow: /admin/')
            ->assertSee('Sitemap: https://fenbumprenklup.nl/sitemap.xml');
    }

    public function test_sitemap_lists_all_pages(): void
    {
        $response = $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8');

        foreach (config('site.navigation') as $item) {
            $response->assertSee('<loc>https://fenbumprenklup.nl'.route($item['route'], absolute: false).'</loc>', false);
        }
    }

    public function test_robots_and_sitemap_stay_reachable_during_coming_soon(): void
    {
        config(['site.coming_soon.enabled' => true]);

        $this->get('/robots.txt')->assertSee('Sitemap:');
        $this->get('/sitemap.xml')->assertSee('<urlset', false);
    }
}
