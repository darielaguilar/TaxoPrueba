<?php

namespace App\Jobs;

use App\Mail\EmailForQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $title;
    protected $destinatario;
    protected $cuerpo;
    protected $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($title,$destinatario,$cuerpo,$email)
    {
        //
        $this->title = $title;
        $this->destinatario = $destinatario;
        $this->cuerpo = $cuerpo;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $email = new EmailForQueue($this->title,$this->destinatario,$this->cuerpo);
        Mail::to($this->email)->send($email);
    }
}
