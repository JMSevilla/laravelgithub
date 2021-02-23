<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendJobMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $message = false;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        //
      $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $file = $this->message['cv'];
        return $this->markdown('emails.apply_job')
          ->subject('New email from Job MovieCircle')
          ->replyTo($this->message['user_email'])
          ->attach($file->getRealPath(), array(
              'as' => $file->getClientOriginalName(), // If you want you can chnage original name to custom name      
              'mime' => $file->getMimeType())
          );
    }
}
