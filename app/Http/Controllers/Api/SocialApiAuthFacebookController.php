<?php



namespace App\Http\Controllers\Api;

use App\Services\SocialFacebookAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/**
 * @group Account management
 *
 * APIs for managing facebook user
 */
class SocialApiAuthFacebookController extends BaseController
{

    /**
     * Facebook Connect.
     *
     * @header Content-Type application/json
     * @bodyParam token string required the facebook user token. Example: vnjudioplodikebgfdti2fk
     */
    public function facebookConnect(Request $request, SocialFacebookAccountService $service)
    {
        $token = $request->token;

        $user = $service->createOrGetUser(Socialite::driver('facebook')->userFromToken($token));

        Auth::login($user);
        $token = $user->createToken('Position')->accessToken;
        $success['token'] = $token;
        $success['user'] = $user;
        $roles = $user->getRoleNames();
        $succes['roles'] = $roles;
        return $this->sendResponse($success, 'Connexion réussie.');
    }
}
