<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewEmailWithAttachment extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $filePath;

    public function __construct($email, $filePath = null)
    {
        $this->email = $email;
        $this->filePath = $filePath;
    }

    public function build()
    {
        $mail = $this->subject('📧 Thông báo Email mới')
                     ->view('emails.notification');

        if ($this->filePath) {
            $mail->attach($this->filePath);
        }

        return $mail;
    }
}
