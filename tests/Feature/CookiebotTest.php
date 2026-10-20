<?php

namespace Tests\Feature;

use Tests\TestCase;

class CookiebotTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config(['site.coming_soon.enabled' => false]);
    }

    public function test_no_banner_without_an_id(): void
    {
        config(['site.cookiebot.id' => null]);

        $this->get('/')
            ->assertOk()
            ->assertDontSee('consent.cookiebot.com', false)
            ->assertDontSee('data-cookie-settings', false);
    }

    public function test_banner_is_the_first_script_when_an_id_is_set(): void
    {
        config(['site.cookiebot.id' => '00000000-0000-0000-0000-000000000000']);

        $html = $this->get('/')
            ->assertOk()
            ->assertSee('data-cbid="00000000-0000-0000-0000-000000000000"', false)
            ->assertSee('data-cookie-settings', false)
            ->getContent();

        $this->assertSame(
            strpos($html, '<script'),
            strpos($html, '<script id="Cookiebot"'),
            'Cookiebot moet het eerste script in de pagina zijn.',
        );
    }

    public function test_cookie_page_shows_the_declaration(): void
    {
        config(['site.cookiebot.id' => '00000000-0000-0000-0000-000000000000']);

        $this->get('/cookies')
            ->assertOk()
            ->assertSee('consent.cookiebot.com/00000000-0000-0000-0000-000000000000/cd.js', false);
    }
}
