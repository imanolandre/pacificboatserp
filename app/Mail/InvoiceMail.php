<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;
    public $pdfPath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice, $pdfPath)
    {
        $this->invoice = $invoice;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invoice')
                    ->subject('Your Invoice')
                    ->attach($this->pdfPath, [
                        'as' => 'invoice.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}
