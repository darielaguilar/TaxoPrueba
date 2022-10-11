<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailForQueue extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $destinatario;
    protected $cuerpo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$destinatario,$cuerpo)
    {
        //
        $this->title = $title;
        $this->destinatario = $destinatario;
        $this->cuerpo = $cuerpo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('prueba@mail.com','Prueba')
                    ->subject($this->title)
                    ->view('Email')
                    ->with([
                        'title'=> $this->title,
                        'cuerpo'=> $this->cuerpo
                    ]
                    );
    }
}
