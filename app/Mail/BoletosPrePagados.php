<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BoletosPrePagados extends Mailable
{
    use Queueable, SerializesModels;

    public $orden;
    public $cantidad;

    public function __construct($orden, $cantidad)
    {
        $this->orden = $orden;
        $this->cantidad = $cantidad;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('boletos-prepagados');
    }
}
