<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ReservaConfirmada extends Mailable
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
    public function __construct($reserva, $homecamper)
    {
        
        $this->reserva = $reserva;
        $this->homecamper = $homecamper;
                
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirmacionReserva');
    }
}
