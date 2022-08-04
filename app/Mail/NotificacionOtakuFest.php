<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionOtakuFest extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre_destino;
    public $texto;
    public $url;

    public function __construct($nombre_destino,$texto,$url)
    {
        $this->nombre_destino = $nombre_destino;
        $this->texto = $texto;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('noti-email');
    }
}
