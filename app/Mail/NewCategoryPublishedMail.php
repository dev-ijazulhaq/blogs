<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewCategoryPublishedMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $category;
    /**
     * Create a new message instance.
     */
    public function __construct(string $category)
    {
        $this->category = $category;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('noreply@blogify.com', 'Blogify'),
            replyTo: [new Address('support@blogify.com')],
            subject: 'New Category Published',
            cc: [new Address('manager@blogify.com')],
            bcc: [new Address('audit@blogify.com')]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.category-published',
            with: ['category', $this->category]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
