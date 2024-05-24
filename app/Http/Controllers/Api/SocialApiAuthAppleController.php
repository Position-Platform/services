<?php



namespace App\Http\Controllers\Api;

use App\Services\SocialAppleAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/**
 * @group Account management
 *
 * APIs for managing apple user
 */
class SocialApiAuthAppleController extends BaseController
{

    /**
     * Apple Connect.
     *
     * @header Content-Type application/json
     * @bodyParam token string required the apple user token. Example: vnjudioplodikebgfdti2fk
     * @responseFile storage/responses/register.json
     */
    public function appleConnect(Request $request, SocialAppleAccountService $service)
    {
        $token = $request->token;

        $user = $service->createOrGetUser(Socialite::driver('apple')->userFromToken($token));

        Auth::login($user);
        $token = $user->createToken('Position')->accessToken;
        $success['token'] = $token;
        $success['user'] = $user;
        $roles = $user->getRoleNames();
        $succes['roles'] = $roles;
        return $this->sendResponse($success, 'Connexion réussie.');
    }
}
