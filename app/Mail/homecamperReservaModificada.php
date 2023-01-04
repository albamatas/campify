<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class homecamperReservaModificada extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Reserva modificada";

    public $reserva;
    public $homecamper;
    public $user;




    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reserva, $homecamper)
    {
        
        $this->reserva = $reserva;
        $this->homecamper = $homecamper;
        $this->user =  $reserva->user;
                
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.homecamperReservaModificada');
    }
}
