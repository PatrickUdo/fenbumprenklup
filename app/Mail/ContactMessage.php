<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array{name: string, email: string, phone: ?string, message: string}  $data
     */
    public function __construct(public array $data, public Carbon $sentAt)
    {
    }

    public function envelope(): Envelope
    {
        // Antwoorden gaat rechtstreeks naar de bezoeker.
        return new Envelope(
            replyTo: [new Address($this->data['email'], $this->data['name'])],
            subject: 'Nieuw bericht van '.$this->data['name'],
        );
    }

    public function content(): Content
    {
        return new Content(
            html: 'mail.contact-html',
            text: 'mail.contact',
        );
    }
}
