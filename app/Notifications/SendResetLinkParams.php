<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class SendResetLinkParams extends Notification
{
    use Queueable;

    protected $token;
    protected $url;

    public function __construct($token, $url)
    {
        $this->token = $token;
        $this->url = $url;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        $token = $this->token;
        $url = $this->url;

        return (new MailMessage)
            ->subject('Reset Password Link')
            ->view('emails.reset_link', compact('token', 'url'));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
