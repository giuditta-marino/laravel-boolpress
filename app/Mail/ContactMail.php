<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $email;
    private $reason;
    private $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $reason, $content)
    {
      $this->name = $name;
      $this->email = $email;
      $this->reason = $reason;
      $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contact')->with('name', $this->name)->with('content', $this->content)->from($this->email)->subject($this->reason);
    }
}
