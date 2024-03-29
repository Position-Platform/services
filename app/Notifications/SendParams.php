<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Support\Facades\URL;

class SendParams extends Notification
{
    use Queueable;

    protected $phone;
    protected $password;

    public function __construct($phone, $password)
    {
        $this->phone = $phone;
        $this->password = $password;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        $phone = $this->phone;
        $password = $this->password;

        $url = $this->make_url($notifiable);

        return (new MailMessage)
            ->subject('Connection Settings')
            ->view('emails.account_settings', compact('phone', 'password', 'url'));
    }

    /**
     * Get the Vonage / SMS representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\VonageMessage
     */
    public function toVonage($notifiable)
    {
        $phone = $this->phone;
        $password = $this->password;

        return (new VonageMessage)
            ->clientReference((string) $notifiable->id)
            ->content("Vos Paramètres de connexion à votre compte sont les suivants : \nPhone : $phone \nPassword : $password \n \nSuivez le lien ci-dessous pour activer votre compte: \n \n " . env("APP_URL") . "/api/auth/phone/verify/" . $notifiable->id);
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    private function make_url($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(10),
            ['user' => $notifiable->email, 'id' => $notifiable->id]
        );
    }
}
