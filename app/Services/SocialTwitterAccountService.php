<?php


namespace App\Services;

use App\Models\Social\SocialTwitterAccount;
use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialTwitterAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialTwitterAccount::whereProvider('twitter')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new SocialTwitterAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider'         => 'twitter',
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $file = str_replace('_normal', '', $providerUser->getAvatar());
                $user = User::create([
                    'email'    => $providerUser->getEmail() ?? "No email",
                    'name'     => $providerUser->getName(),
                    'image_profil'   => $file ? $file : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($providerUser->getEmail()))),
                    'token' => $providerUser->token,
                    'tokenSecret' => $providerUser->tokenSecret,
                    'password' => md5(rand(1, 10000)),
                    'phone' => $this->randomNumber()
                ]);
                $user->assignRole('user');
                $user->markEmailAsVerified();
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }

    /**
     * generate random Number.
     *
     * @return integer
     */
    public function randomNumber($length = 9)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return intval($randomString);
    }
}
