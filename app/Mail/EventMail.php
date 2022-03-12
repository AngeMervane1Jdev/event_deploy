<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datamail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datamail)
    {
        //
        $this->datamail=$datamail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->subject('Mail send from MASSALI event')->view('emails.EventMail');
    }
}
