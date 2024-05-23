<?php



namespace App\Http\Controllers\Api;

use App\Services\SocialOsmAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/**
 * @group Account management
 *
 * APIs for managing osm user
 */
class SocialApiAuthOsmController extends BaseController
{

    /**
     * Osm Connect.
     *
     * @header Content-Type application/json
     * @bodyParam token string required the osm user token. Example: vnjudioplodikebgfdti2fk
     * @responseFile storage/responses/register.json
     */
    public function osmConnect(Request $request, SocialOsmAccountService $service)
    {
        $token = $request->token;

        $user = $service->createOrGetUser(Socialite::driver('openstreetmap')->userFromToken($token));

        Auth::login($user);
        $token = $user->createToken('Position')->accessToken;
        $success['token'] = $token;
        $success['user'] = $user;
        $roles = $user->getRoleNames();
        $succes['roles'] = $roles;
        return $this->sendResponse($success, 'Connexion réussie.');
    }
}
