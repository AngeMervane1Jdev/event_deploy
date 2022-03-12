<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datareg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datareg)
    {
        $this->datareg=$datareg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->subject('Mail send from MASSALI event')->view('emails.RegisterMail');
    }
}