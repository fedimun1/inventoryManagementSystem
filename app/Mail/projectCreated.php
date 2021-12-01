<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Http\Request;

class projectCreated extends Mailable
{
    use Queueable, SerializesModels;
     public $emailedTender;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailedTender)
    {

      $this->emailedTender = $emailedTender;
      //$this->mailRequest = $mailRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $id=$this->emailedTender['selector'];
        if($id==1){

        return $this->subject('Waiting For Approval')->markdown('emails.tenderCreated')->with(['tender', $this->emailedTender]);
        }
       elseif ($id==2) {
        return $this->subject('Ask Request')->markdown('emails.askRequest')->with(['tender', $this->emailedTender]);
       }
    }
}
