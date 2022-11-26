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
            Carbon::now()->addDays(1),
            ['id' => $notifiable->getKey()]
        );  //we use 10 minutes expiry
    }
}
