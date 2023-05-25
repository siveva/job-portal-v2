<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $notificationMessage;

    /**
     * Create a new message instance.
     *
     * @param string $subject
     * @param string $notificationMessage
     * @return void
     */
    public function __construct($subject, $notificationMessage)
    {
        $this->subject = $subject;
        $this->notificationMessage = $notificationMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $notificationMessage = $this->notificationMessage;
        return $this->from('noreply@gmail.com', config('mail.from.name'))->subject($this->subject)
                    ->view('emails.application-notification', compact('notificationMessage'));
    }
}

