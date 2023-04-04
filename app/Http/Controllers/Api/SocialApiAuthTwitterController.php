<?php


namespace App\Http\Controllers\Api;

use App\Services\SocialTwitterAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/**
 * @group Account management
 *
 * APIs for managing twitter user
 */
class SocialApiAuthTwitterController extends BaseController
{
    /**
     * Twitter Connect.
     *
     * @header Content-Type application/json
     * @bodyParam token string required the twitter user token. Example: vnjudioplodikebgfdti2fk
     * @bodyParam secret string required the twitter user secret token. Example: vnjudioplodikebgfdti2fk
     */
    public function twitterConnect(Request $request, SocialTwitterAccountService $service)
    {
        $token = $request->token;
        $secret = $request->secret;

        $user = $service->createOrGetUser($user = Socialite::driver('twitter')->userFromTokenAndSecret($token, $secret));

        Auth::login($user);
        $token = $user->createToken('Position')->accessToken;
        $success['token'] = $token;
        $success['user'] = $user;
        $roles = $user->getRoleNames();
        $succes['roles'] = $roles;
        return $this->sendResponse($success, 'Connexion réussie.');
    }
}
