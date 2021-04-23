<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\RegistroEgresadoNuevo;

class MensajeRechazado extends Mailable
{
    use Queueable, SerializesModels;
    
    public $data1;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data1, $data)
    {
        $this->data1 = $data1;
        $this->data = $data;
        //dd($this->$data);
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.webrechazoegre');
    }
}
