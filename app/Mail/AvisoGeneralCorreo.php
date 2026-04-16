<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AvisoGeneralCorreo extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $mensaje;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $mensaje)
    {
        $this->user = $user;
        $this->mensaje = $mensaje;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Aviso Importante - Café',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.aviso_general', // Esta será nuestra segunda vista
        );
    }
}
