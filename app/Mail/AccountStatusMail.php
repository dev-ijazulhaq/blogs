<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountStatusMail extends Mailable
{
    use Queueable, SerializesModels;
    public string $status;
    public string $userName;
    /**
     * Create a new message instance.
     */
    public function __construct(public User $user) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Account Status Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.AccountStatusMail',
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

    public function build()
    {
        $statusLabel = $this->user->status->label();
        $isActive = $statusLabel === 'Active';

        return $this->subject('Account Status Update')
            ->view('emails.account-status')
            ->with([
                'userName'   => $this->user->name,
                'statusText' => $statusLabel,
                'bodyMessage'    => $isActive
                    ? 'Your account has been successfully activated.'
                    : 'Your account has been temporarily disabled.',
                'buttonText' => $isActive ? 'Login to Account' : 'Contact Support',
                'buttonUrl'  => route('login'),
                'boxBg'      => $isActive ? '#e9f7ef' : '#fdecea',
                'boxBorder'  => $isActive ? '#2ecc71' : '#e74c3c',
                'boxText'    => $isActive ? '#27ae60' : '#c0392b',
                'buttonBg'   => $isActive ? '#4B7BF5' : '#6c757d',
                'actionUrl'  => route('login')
            ]);
    }
}
