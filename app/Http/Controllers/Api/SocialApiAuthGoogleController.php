<?php


namespace App\Http\Controllers\Api;

use App\Services\SocialGoogleAccountService;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

/**
 * @group Account management
 *
 * APIs for managing google user
 */
class SocialApiAuthGoogleController extends BaseController
{
    /**
     * Google Connect.
     *
     * @header Content-Type application/json
     * @bodyParam token string required the google user token. Example: vnjudioplodikebgfdti2fk
     * @responseFile storage/responses/register.json
     */
    public function googleConnect(Request $request, SocialGoogleAccountService $service)
    {
        $token = $request->token;

        $user = $service->createOrGetUser(Socialite::driver('google')->userFromToken($token));

        Auth::login($user);
        $token = $user->createToken('Position')->accessToken;
        $success['token'] = $token;
        $success['user'] = $user;
        $roles = $user->getRoleNames();
        $succes['roles'] = $roles;
        return $this->sendResponse($success, 'Connexion réussie.');
    }
}
