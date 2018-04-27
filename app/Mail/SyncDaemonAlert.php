<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\company;

class SyncDaemonAlert extends Mailable
{
    use Queueable, SerializesModels;
        protected  $company;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company)
    {
        $this->company = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return dd($this->company['company_name']);
        return $this->view('email.syncdaemon')
        ->with([
            'company' => $this->company['company_name'],
            'id' => $this->company['id'],
            ]);
    }
}
