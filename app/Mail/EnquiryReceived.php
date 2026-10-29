<?php

namespace App\Mail;

use App\Models\Enquiry;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class EnquiryReceived extends Mailable
{
    public function __construct(public Enquiry $enquiry) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'We have received your enquiry - '.config('rdm.name'));
    }

    public function content(): Content
    {
        return new Content(markdown: 'mail.enquiry.received');
    }
}
