<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    private array $details;
    public string $token;

    /**
     * Create a new message instance.
     *
     * @param array $details
     * @param string $token
     */
    public function __construct(array $details, string $token)
    {
        $this->details = $details;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from'))
            ->with([
                'token' => $this
            ])
            ->markdown('emails.forgotPass', ["token" => $this->token]);
    }
}
