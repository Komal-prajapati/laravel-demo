<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEnquiryReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * \App\Models\ContactEnquiry instance.
     *
     */
    public $enquiry;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\ContactEnquiry  $enquiry
     * @return void
     */
    public function __construct($enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact-enquiries-received')
                    ->from(config('mail.from.address'))
                    ->subject(config('app.name') .': Contact Enquiry Received')
                    ->with(['enquiry' => $this->enquiry]);
    }
}
