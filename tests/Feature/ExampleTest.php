<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_home_page_renders_with_seo_and_contact_details(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('Reliable Laboratory Solutions for', false)
            ->assertSee('<title>RDM Scientific Products Limited', false)
            ->assertSee('tel:+260977783636', false)
            ->assertSee('mailto:sales@rdmscientific.com', false)
            ->assertSee('Plot No. 1 Chisokone Road', false)
            ->assertSee('aria-current="page"', false);
    }
}
