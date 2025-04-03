<?php

namespace App\Http\Controllers\Api;

use App\Services\SocialFacebookAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

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
     * @responseFile storage/responses/register.json
     */
    public function facebookConnect(Request $request, SocialFacebookAccountService $service)
    {
        $token = $request->token;

        // Log de la tentative de connexion Facebook
        Log::debug('Tentative de connexion via Facebook', [
            'controller' => 'SocialApiAuthFacebookController',
            'method' => 'facebookConnect',
            'token_length' => strlen($token)
        ]);

        try {
            // Récupération de l'utilisateur depuis l'API Facebook
            $socialiteUser = Socialite::driver('facebook')->userFromToken($token);

            // Log des informations de l'utilisateur Facebook récupérées
            Log::debug('Informations utilisateur Facebook récupérées', [
                'controller' => 'SocialApiAuthFacebookController',
                'method' => 'facebookConnect',
                'socialite_id' => $socialiteUser->getId(),
                'socialite_email' => $socialiteUser->getEmail(),
                'socialite_name' => $socialiteUser->getName()
            ]);

            // Création ou récupération de l'utilisateur dans notre système
            $user = $service->createOrGetUser($socialiteUser);

            // Authentification de l'utilisateur
            Auth::login($user);
            $token = $user->createToken('Position')->accessToken;

            // Log du succès de la connexion Facebook
            Log::info('Connexion Facebook réussie', [
                'controller' => 'SocialApiAuthFacebookController',
                'method' => 'facebookConnect',
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            $success['token'] = $token;
            $success['user'] = $user;
            $roles = $user->getRoleNames();
            $success['roles'] = $roles;

            return $this->sendResponse($success, 'Connexion réussie.');
        } catch (\Exception $e) {
            // Log de l'erreur de connexion Facebook
            Log::error('Erreur lors de la connexion Facebook', [
                'controller' => 'SocialApiAuthFacebookController',
                'method' => 'facebookConnect',
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $this->sendError('Erreur de connexion Facebook', ['error' => $e->getMessage()], 400);
        }
    }
}
