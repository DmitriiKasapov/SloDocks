<?php

namespace App\Mail;

use App\Models\Access;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccessGrantedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Access $access
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Доступ к материалам SloDocs активирован',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.access-granted',
            with: [
                'access' => $this->access,
                'service' => $this->access->service,
                'accessUrl' => $this->getAccessUrl(),
                'expiresAt' => $this->access->expires_at->format('d.m.Y H:i'),
            ],
        );
    }

    /**
     * Get the access URL with token
     */
    private function getAccessUrl(): string
    {
        return route('services.content', [
            'slug' => $this->access->service->slug,
            'token' => $this->access->access_token,
        ]);
    }
}
