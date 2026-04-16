<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AlertaLoginCorreo extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Alerta de inicio de sesión - Café',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.alerta_login', // Esta es la vista que crearemos en el Paso 2
        );
    }
}
