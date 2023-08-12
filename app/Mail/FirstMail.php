<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class FirstMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    /**
     * Create a new message instance.
     */
    public function __construct($name)
    {
        $this->name=$name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('faisal2410@yahoo.com', 'Faisal ahmed'),
            subject: 'Hello From Faisal ahmed',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
              view: 'mails.first-mail',
            with:['name'=>$this->name]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
   Attachment::fromPath(Storage::path('public/faisal.jpg'))
               ->as('your_image.jpg')
                ->withMime('image/jpg'),


        ];
    }
}
