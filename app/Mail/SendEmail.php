<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject;
    public $msg;
    public $from_email;

    public function __construct( $subject,$message,$from_email='supporter@aait.com' )
    {
        $this -> subject        = $subject;
        $this -> msg            = $message;
        $this -> from_email     = $from_email;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $subject        = $this -> subject;
        $msg            = $this -> msg;
        $from_email     = $this -> from_email;
        return $this -> view( 'mails.send_email', compact( 'msg' ) ) -> subject( $subject )-> from( $from_email );
    }
}
