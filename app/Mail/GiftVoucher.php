<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GiftVoucher extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $generated_pdf_output = (isset($this->request['generated_pdf_output'])) ? $this->request['generated_pdf_output'] : "";
        // $generated_pdf_link = (isset($this->request['generated_pdf_link'])) ? asset($this->request['generated_pdf_link']) : "";
        if ($generated_pdf_output) {
            // return $this->markdown('emails.GiftVoucher', ['request' => $this->request])->attach(asset($generated_pdf_link));
            return $this->markdown('emails.GiftVoucher', ['request' => $this->request])->attachData($generated_pdf_output, 'voucher.pdf', ['mime' => 'application/pdf']);
        }
        return $this->markdown('emails.GiftVoucher', ['request' => $this->request]);
    }
}