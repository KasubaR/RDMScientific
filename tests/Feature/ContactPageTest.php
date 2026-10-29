<?php

namespace Tests\Feature;

use App\Enums\EnquiryType;
use App\Mail\EnquiryReceived;
use App\Mail\NewEnquiry;
use App\Models\Enquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Test Buyer',
            'organization' => 'Test Mining Ltd',
            'email' => 'buyer@example.com',
            'phone' => '+260 977 000000',
            'type' => 'quotation',
            'subject' => 'Glassware',
            'message' => 'Please quote for 20 measuring cylinders.',
            'privacy' => '1',
            'form_token' => Crypt::encryptString((string) now()->subSeconds(30)->timestamp),
        ], $overrides);
    }

    public function test_contact_page_shows_verified_details_and_privacy_notice(): void
    {
        $this->get('/contact')
            ->assertOk()
            ->assertSee('<title>Contact Us | RDM Scientific Products Limited', false)
            ->assertSee('tel:+260977783636', false)
            ->assertSee('mailto:sales@rdmscientific.com', false)
            ->assertSee('Plot No. 1 Chisokone Road')
            ->assertSee('www.rdmscientific.com')
            ->assertSee('Privacy notice')
            ->assertSee('aria-current="page"', false);
    }

    public function test_contact_page_does_not_show_unconfirmed_map_hours_or_whatsapp(): void
    {
        $this->get('/contact')
            ->assertDontSee('<iframe', false)
            ->assertDontSee('Business hours')
            ->assertDontSee('WhatsApp')
            ->assertDontSee('wa.me');
    }

    public function test_valid_enquiry_is_stored_and_sales_team_is_emailed(): void
    {
        Mail::fake();

        $this->post('/contact', $this->validPayload())
            ->assertRedirect(route('contact').'#confirmation')
            ->assertSessionHas('enquiry_sent');

        $this->assertDatabaseHas('enquiries', ['email' => 'buyer@example.com', 'type' => 'quotation']);

        Mail::assertSent(NewEnquiry::class, fn (NewEnquiry $mail) => $mail->hasTo('sales@rdmscientific.com')
            && $mail->hasReplyTo('buyer@example.com'));
        Mail::assertNotSent(EnquiryReceived::class);
    }

    public function test_sender_confirmation_is_sent_only_when_enabled(): void
    {
        Mail::fake();
        config(['rdm.send_confirmation' => true]);

        $this->post('/contact', $this->validPayload());

        Mail::assertSent(EnquiryReceived::class, fn (EnquiryReceived $mail) => $mail->hasTo('buyer@example.com'));
    }

    public function test_confirmation_message_is_shown_after_submission(): void
    {
        Mail::fake();

        $this->followingRedirects()
            ->post('/contact', $this->validPayload())
            ->assertSee('Your enquiry has been sent');
    }

    public function test_required_fields_are_validated_with_clear_messages(): void
    {
        Mail::fake();

        $this->from('/contact')
            ->post('/contact', $this->validPayload(['name' => '', 'email' => 'not-an-email', 'message' => '', 'privacy' => null]))
            ->assertRedirect(route('contact').'#form-errors')
            ->assertSessionHasErrors(['name', 'email', 'message', 'privacy']);

        $this->assertDatabaseCount('enquiries', 0);
        Mail::assertNothingSent();
    }

    public function test_validation_errors_are_displayed_on_the_page(): void
    {
        $this->followingRedirects()
            ->from('/contact')
            ->post('/contact', $this->validPayload(['email' => 'nope']))
            ->assertSee('Your enquiry has not been sent')
            ->assertSee('Please enter a valid email address');
    }

    public function test_invalid_enquiry_type_and_phone_are_rejected(): void
    {
        $this->post('/contact', $this->validPayload(['type' => 'sales-pitch', 'phone' => 'abc']))
            ->assertSessionHasErrors(['type', 'phone']);
    }

    public function test_honeypot_submissions_are_rejected(): void
    {
        Mail::fake();

        $this->post('/contact', $this->validPayload(['website_url' => 'http://spam.example']))
            ->assertSessionHasErrors('website_url');

        $this->assertDatabaseCount('enquiries', 0);
        Mail::assertNothingSent();
    }

    public function test_submissions_faster_than_a_person_are_rejected(): void
    {
        $this->post('/contact', $this->validPayload([
            'form_token' => Crypt::encryptString((string) now()->timestamp),
        ]))->assertSessionHasErrors('form_token');

        $this->assertDatabaseCount('enquiries', 0);
    }

    public function test_tampered_or_missing_tokens_are_rejected(): void
    {
        $this->post('/contact', $this->validPayload(['form_token' => 'forged']))
            ->assertSessionHasErrors('form_token');

        $this->post('/contact', $this->validPayload(['form_token' => null]))
            ->assertSessionHasErrors('form_token');
    }

    public function test_enquiry_is_kept_even_if_the_mail_server_fails(): void
    {
        Mail::shouldReceive('to')->andThrow(new \RuntimeException('SMTP down'));

        $this->post('/contact', $this->validPayload())
            ->assertSessionHas('enquiry_sent');

        $this->assertDatabaseCount('enquiries', 1);
    }

    public function test_form_is_rate_limited(): void
    {
        Mail::fake();

        foreach (range(1, 6) as $attempt) {
            $this->post('/contact', $this->validPayload())->assertRedirect();
        }

        $this->post('/contact', $this->validPayload())->assertStatus(429);
    }

    public function test_application_link_preselects_subject_and_enquiry_type(): void
    {
        $this->get('/contact?application=mrna')
            ->assertSee('value="Enquiry about mRNA Development and Manufacturing"', false)
            ->assertSee('<option value="product" selected>', false);
    }

    public function test_industry_and_document_links_prefill_the_form(): void
    {
        $this->get('/contact?industry=mining')
            ->assertSee('value="Supplies for Mining Companies"', false);

        $this->get('/contact?topic=documents')
            ->assertSee('Request for catalogues, datasheets and safety data sheets');
    }

    public function test_unknown_prefill_values_fall_back_to_a_quotation(): void
    {
        $this->get('/contact?application=does-not-exist')
            ->assertOk()
            ->assertSee('<option value="quotation" selected>', false);
    }

    public function test_enquiry_factory_produces_a_valid_record(): void
    {
        $enquiry = Enquiry::factory()->create();

        $this->assertInstanceOf(EnquiryType::class, $enquiry->type);
    }

    public function test_old_products_url_redirects_to_the_new_sitemap_url(): void
    {
        $this->get('/products')->assertRedirect('/products-applications')->assertStatus(301);
    }
}
