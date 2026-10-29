<?php

namespace Tests\Feature;

use Tests\TestCase;

class ConsentTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config(['site.coming_soon.enabled' => false]);
    }

    public function test_every_page_loads_the_consent_runtime_and_preferences(): void
    {
        foreach (['/', '/projecten', '/collectie', '/contact', '/cookies', '/privacy'] as $path) {
            $this->get($path)
                ->assertOk()
                ->assertSee('consent-ui', false)
                ->assertSee('id="consent-preferences"', false)
                ->assertSee('data-consent-open', false);
        }
    }

    public function test_consent_interface_is_dutch_and_links_to_the_cookie_statement(): void
    {
        $this->get('/')
            ->assertSee('lang="nl"', false)
            ->assertSee('href="/cookies"', false);
    }

    public function test_first_visit_sets_no_consent_cookie(): void
    {
        $this->get('/')->assertCookieMissing(config('consent.cookie.name'));
    }

    public function test_cookie_statement_lists_the_consent_cookie(): void
    {
        $this->get('/cookies')->assertSee(config('consent.cookie.name'));
    }
}
