<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

// Definiamo una nuova classe chiamata NewContact che estende la classe Mailable.
class NewContact extends Mailable
{
    // Utilizziamo due trait (Queueable e SerializesModels) per aggiungere funzionalità alla classe.

    // Dichiarazione di una variabile pubblica chiamata $lead.
    public $lead;

    /**
     * Costruttore della classe NewContact.
     * Questo metodo viene chiamato quando viene creata una nuova istanza della classe.
     *
     * @param $_lead - Il parametro $_lead rappresenta i dati del contatto (o "lead") che vogliamo includere nell'email.
     * @return void
     */
    public function __construct($_lead)
    {
        // Assegniamo il valore del parametro $_lead alla variabile $lead della classe.
        $this->lead = $_lead;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        // Creiamo un nuovo oggetto Envelope con alcuni parametri specificati:

        // - Il parametro "subject" definisce l'oggetto (o il titolo) dell'email.
        //   In questo caso, l'oggetto dell'email è "Nuovo contatto da form Boolfolio".

        // - Il parametro "replyTo" definisce l'indirizzo email a cui dovrebbero essere inviate le risposte all'email.
        //   In questo caso, le risposte all'email verranno inviate a "info@boolfolio.com".
        return new Envelope(
            subject: 'Nuovo contatto da form Boolfolio',
            replyTo: $this->lead->address,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
