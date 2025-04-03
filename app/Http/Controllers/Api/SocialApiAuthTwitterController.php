<?php

namespace App\Http\Controllers\Api;

use App\Services\SocialTwitterAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

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
     * @responseFile storage/responses/register.json
     */
    public function twitterConnect(Request $request, SocialTwitterAccountService $service)
    {
        $token = $request->token;
        $secret = $request->secret;

        // Log de la tentative de connexion Twitter
        Log::debug('Tentative de connexion via Twitter', [
            'controller' => 'SocialApiAuthTwitterController',
            'method' => 'twitterConnect',
            'token_length' => strlen($token),
            'secret_length' => strlen($secret)
        ]);

        try {
            // Récupération de l'utilisateur depuis l'API Twitter
            $socialiteUser = Socialite::driver('twitter')->userFromTokenAndSecret($token, $secret);

            // Log des informations de l'utilisateur Twitter récupérées
            Log::debug('Informations utilisateur Twitter récupérées', [
                'controller' => 'SocialApiAuthTwitterController',
                'method' => 'twitterConnect',
                'socialite_id' => $socialiteUser->getId(),
                'socialite_nickname' => $socialiteUser->getNickname(),
                'socialite_name' => $socialiteUser->getName()
            ]);

            // Création ou récupération de l'utilisateur dans notre système
            $user = $service->createOrGetUser($socialiteUser);

            // Authentification de l'utilisateur
            Auth::login($user);
            $token = $user->createToken('Position')->accessToken;

            // Log du succès de la connexion Twitter
            Log::info('Connexion Twitter réussie', [
                'controller' => 'SocialApiAuthTwitterController',
                'method' => 'twitterConnect',
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            $success['token'] = $token;
            $success['user'] = $user;
            $roles = $user->getRoleNames();
            $success['roles'] = $roles;

            return $this->sendResponse($success, 'Connexion réussie.');
        } catch (\Exception $e) {
            // Log de l'erreur de connexion Twitter
            Log::error('Erreur lors de la connexion Twitter', [
                'controller' => 'SocialApiAuthTwitterController',
                'method' => 'twitterConnect',
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $this->sendError('Erreur de connexion Twitter', ['error' => $e->getMessage()], 400);
        }
    }
}
