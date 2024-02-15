<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeekerApplicationStatus extends Mailable
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
            ->subject('Job Application Status Update')
            ->view('seeker.e-mails.applicationStatus', ['data' => $this->data]);
    }
}
