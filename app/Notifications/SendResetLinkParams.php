<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Kreait\Firebase\DynamicLink\CreateDynamicLink\FailedToCreateDynamicLink;
use Kreait\Laravel\Firebase\Facades\Firebase;

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
        $dynamicLink = Firebase::dynamicLinks();

        $url = 'https://app.position.cm/';

        try {
            $link = $dynamicLink->createDynamicLink(
                $url,
                'https://app.position.cm?resettoken=' . $this->token,
                [
                    'ios' => [
                        'bundleId' => 'cm.geosmfamily.position',
                    ],
                    'android' => [
                        'packageName' => 'cm.geosmfamily.position',
                    ],
                ]
            );

            $this->url = $dynamicLink->createShortLink($url);

            $url = $this->url;

            return (new MailMessage)
                ->subject('Reset Password Link')
                ->view('emails.reset_link', compact('url'));
        } catch (FailedToCreateDynamicLink $e) {
            echo $e->getMessage();
        }
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
