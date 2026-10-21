<?php

namespace Tests\Feature;

use App\Support\Cars;
use Tests\TestCase;

class CollectieTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config(['app.url' => 'https://fenbumprenklup.nl', 'site.coming_soon.enabled' => false]);
    }

    public function test_overview_links_to_every_car(): void
    {
        $response = $this->get('/collectie')->assertOk();

        foreach (Cars::all() as $car) {
            $response->assertSee($car['name'])->assertSee(route('collectie.show', $car['slug']), false);
        }
    }

    public function test_every_car_has_a_detail_page_with_its_own_seo(): void
    {
        foreach (Cars::all() as $car) {
            $this->get("/collectie/{$car['slug']}")
                ->assertOk()
                ->assertSee('<title>'.e($car['title']).' – Fenbump Renklup</title>', false)
                ->assertSee('<meta name="description" content="'.e($car['description']).'">', false)
                ->assertSee('<link rel="canonical" href="https://fenbumprenklup.nl/collectie/'.$car['slug'].'">', false)
                ->assertSee('"@type": "Car"', false)
                ->assertSee(e($car['intro'][0]), false);
        }
    }

    public function test_photos_and_share_images_exist(): void
    {
        foreach (Cars::all() as $car) {
            foreach ($car['gallery'] as $photo) {
                $this->assertFileExists(public_path($photo['src']));
            }
            $this->assertFileExists(public_path($car['og_image']));
        }
    }

    public function test_unknown_car_is_a_404(): void
    {
        $this->get('/collectie/bestaat-niet')->assertNotFound();
    }

    public function test_contact_form_is_prefilled_from_a_car(): void
    {
        $car = Cars::find('glas');

        $this->get('/contact?auto=glas')->assertSee('Ik heb interesse in de '.e($car['title']).'.', false);
        $this->get('/contact?auto=onzin')->assertDontSee('Ik heb interesse');
    }

    public function test_sitemap_lists_every_car(): void
    {
        $response = $this->get('/sitemap.xml');

        foreach (Cars::all() as $car) {
            $response->assertSee('<loc>https://fenbumprenklup.nl/collectie/'.$car['slug'].'</loc>', false);
        }
    }
}
