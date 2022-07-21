<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class NuevaReserva extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Reserva campify confirmada";

    public $reserva;
    public $homecamper;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reserva, $user)
    {
        
        $this->reserva = $reserva;
        $this->user = $user;
                
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.NuevaReserva');
    }
}
