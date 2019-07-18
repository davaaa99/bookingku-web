<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The invoice model object instance
     * 
     * @var invoice
     */

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sender@example.com') //ganti pake email admin kong
                    ->view('invoice') //ganti sama view yg digenerate jadi viewnya
                    ->text('')
                    ->attach($invoice,['as'=>'invoice','mime'=>'invoice']);
    }
}
