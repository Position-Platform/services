<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Kreait\Firebase\DynamicLink\AndroidInfo;
use Kreait\Firebase\DynamicLink\CreateDynamicLink;
use Kreait\Firebase\DynamicLink\CreateDynamicLink\FailedToCreateDynamicLink;
use Kreait\Firebase\DynamicLink\IOSInfo;
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

        $url = 'https://app.position.cm?resettoken=' . $this->token;

        $action = CreateDynamicLink::forUrl($url)
            ->withDynamicLinkDomain('https://app.position.cm')
            ->withUnguessableSuffix()

            ->withIOSInfo(
                IOSInfo::new()
                    ->withBundleId('cm.geosmfamily.position')

            )
            ->withAndroidInfo(
                AndroidInfo::new()
                    ->withPackageName('cm.geosmfamily.position')
                    ->withMinPackageVersionCode('0')
            );

        $link = $dynamicLink->createDynamicLink($action);

        $url = $link->uri();

        return (new MailMessage)
            ->subject('Reset Password Link')
            ->view('emails.reset_link', compact('url'));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
