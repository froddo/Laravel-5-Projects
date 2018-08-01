<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailPurchase extends Mailable
{
    use Queueable, SerializesModels;

    public $paymentInfo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($paymentInfo)
    {
        $this->paymentInfo = $paymentInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sales@personal-blog.test')->view('email.purchase')->with([
            'paymentInfo' => $this->paymentInfo
        ]);
    }
}
