<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductsPageTest extends TestCase
{
    public function test_products_page_renders_with_seo_title_and_active_nav(): void
    {
        $this->get('/products')
            ->assertOk()
            ->assertSee('<title>Products &amp; Applications | RDM Scientific Products Limited', false)
            ->assertSee('aria-current="page"', false)
            ->assertSee('"@context":"https://schema.org"', false);
    }

    public function test_every_category_from_the_profile_has_a_section(): void
    {
        $response = $this->get('/products')->assertOk();

        foreach (['chemicals', 'reagents', 'glassware', 'consumables', 'equipment'] as $id) {
            $response->assertSee('id="'.$id.'"', false);
        }
    }

    public function test_every_application_from_the_profile_is_listed(): void
    {
        $response = $this->get('/products')->assertOk();

        foreach ([
            'Analytical Chemistry',
            'Cell Culture and Analysis',
            'Chemistry and Synthesis',
            'Clinical Diagnostics',
            'Environmental Testing',
            'Food and Beverage Testing and Manufacturing',
            'Genomics and Microbial Testing',
            'mRNA Development and Manufacturing',
            'Pharmaceutical and Biopharmaceutical Manufacturing',
            'Protein Biology',
            'Research in Disease Areas',
        ] as $application) {
            $response->assertSee($application);
        }
    }

    public function test_all_nine_client_sectors_are_listed(): void
    {
        $response = $this->get('/products')->assertOk();

        foreach (config('catalog.industries') as $industry) {
            $response->assertSee($industry['name']);
        }

        $this->assertCount(9, config('catalog.industries'));
    }

    public function test_enquiry_links_carry_the_selected_item_to_the_quote_form(): void
    {
        $this->get('/products')
            ->assertSee('/contact?application=analytical-chemistry#quote', false)
            ->assertSee('/contact?industry=mining#quote', false)
            ->assertSee('/contact?category=glassware#quote', false);
    }

    public function test_catalogue_is_enquiry_only_with_no_prices_or_cart(): void
    {
        $this->get('/products')
            ->assertDontSee('Add to cart')
            ->assertDontSee('Checkout')
            ->assertDontSee('In stock');
    }

    public function test_every_application_references_valid_categories(): void
    {
        $categoryIds = collect(config('catalog.categories'))->pluck('id');

        foreach (config('catalog.applications') as $application) {
            foreach ($application['categories'] as $categoryId) {
                $this->assertTrue($categoryIds->contains($categoryId), $application['name'].' references unknown category '.$categoryId);
            }
        }

        $applicationIds = collect(config('catalog.applications'))->pluck('id');

        foreach (config('catalog.industries') as $industry) {
            foreach ($industry['applications'] as $applicationId) {
                $this->assertTrue($applicationIds->contains($applicationId), $industry['name'].' references unknown application '.$applicationId);
            }
        }
    }
}
