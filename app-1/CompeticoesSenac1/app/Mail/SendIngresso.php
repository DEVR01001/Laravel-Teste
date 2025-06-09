<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendIngresso extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $ingresso;
    public $chair;
    public $evento;
    public $qrcodeBase64;
    public $pdfContent; 

    public function __construct($user, $ingresso, $chair, $evento, $qrcodeBase64, $pdfContent)
    {
        $this->user = $user;
        $this->ingresso = $ingresso;
        $this->chair = $chair;
        $this->evento = $evento;
        $this->qrcodeBase64 = $qrcodeBase64;
        $this->pdfContent = $pdfContent;
    }

    public function build()
    {
        return $this->subject('Ingresso - ' . $this->evento->name)
                    ->markdown('mail.email')
                    ->attachData($this->pdfContent, 'ingresso_' . $this->ingresso->id . '.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
