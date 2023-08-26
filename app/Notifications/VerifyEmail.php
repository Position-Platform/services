<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as NotificationsVerifyEmail;
use Illuminate\Support\Carbon;
use \Illuminate\Support\Facades\URL;

class VerifyEmail extends NotificationsVerifyEmail
{
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinute(60),
            ['id' => $notifiable->getKey()]
        );  //we use 60 minutes expiry
    }
}
