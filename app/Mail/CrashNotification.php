<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CrashNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $crash;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($crash)
    {
        $this->crash = $crash;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sender@example.com')
                    ->view('mails.demo')
                    ->text('mails.demo_plain')
                    ->subject('Внимание! '.$this->crash->obj.'. '.$this->crash->loc.'. '.$this->crash->description);
    }
}

