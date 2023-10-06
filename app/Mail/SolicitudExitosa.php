<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use app\Models\Solicitud;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SolicitudExitosa extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Solicitud
     */
    public $solicitud;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($solicitud)
    {
        $this->solicitud = $solicitud;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->solicitud->email)
                    ->replyTo('retiroanticiporrvv@rentanacional.cl', 'Renta Nacional')
                    ->subject('Solicitud de Retiro')
                    ->markdown('emails.solicitud-exitosa');
    }
}