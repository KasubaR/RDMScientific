<?php

namespace App\Mail;

use App\Models\Enquiry;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class NewEnquiry extends Mailable
{
    public function __construct(public Enquiry $enquiry) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [new Address($this->enquiry->email, $this->enquiry->name)],
            subject: 'Website enquiry: '.$this->enquiry->type->label().($this->enquiry->subject ? ' - '.$this->enquiry->subject : ''),
        );
    }

    public function content(): Content
    {
        return new Content(markdown: 'mail.enquiry.new');
    }
}
