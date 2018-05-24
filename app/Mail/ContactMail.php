<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public $email;

    public $branch;

    public $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $request )
    {
        $this->name = $request->input( 'contact_name' );

        $this->email = $request->input( 'contact_email' );

        $this->branch = $request->input( 'contact_branch' );

        $this->text = $request->input( 'contact_message' );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view( 'mails.contact' )
                ->from( 'info@topdvd.co.za', 'Top DVD Website' )
                ->subject( 'You received a new enquiry on the website' );
    }
}
