<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeekerAppWithdraw extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Job Application Withdrawal')
            ->view('seeker.e-mails.applicationWithdraw', ['data' => $this->data]);
    }
}
