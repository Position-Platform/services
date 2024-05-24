<?php



namespace App\Services;

use App\Models\Social\SocialAppleAccount;
use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAppleAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAppleAccount::whereProvider('apple')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAppleAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider'         => 'apple',
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $file = str_replace('type=normal', 'type=large', $providerUser->getAvatar());
                $user = User::create([
                    'email'    => $providerUser->getEmail(),
                    'name'     => $providerUser->getName(),
                    'image_profil'   => $file ? $file : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($providerUser->getEmail()))),
                    'token' => $providerUser->token,
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
