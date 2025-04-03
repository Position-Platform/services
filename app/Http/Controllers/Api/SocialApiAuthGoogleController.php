<?php

namespace App\Http\Controllers\Api;

use App\Services\SocialGoogleAccountService;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

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

        // Log de la tentative de connexion Google
        Log::debug('Tentative de connexion via Google', [
            'controller' => 'SocialApiAuthGoogleController',
            'method' => 'googleConnect',
            'token_length' => strlen($token)
        ]);

        try {
            // Récupération de l'utilisateur depuis l'API Google
            $socialiteUser = Socialite::driver('google')->userFromToken($token);

            // Log des informations de l'utilisateur Google récupérées
            Log::debug('Informations utilisateur Google récupérées', [
                'controller' => 'SocialApiAuthGoogleController',
                'method' => 'googleConnect',
                'socialite_id' => $socialiteUser->getId(),
                'socialite_email' => $socialiteUser->getEmail(),
                'socialite_name' => $socialiteUser->getName()
            ]);

            // Création ou récupération de l'utilisateur dans notre système
            $user = $service->createOrGetUser($socialiteUser);

            // Authentification de l'utilisateur
            Auth::login($user);
            $token = $user->createToken('Position')->accessToken;

            // Log du succès de la connexion Google
            Log::info('Connexion Google réussie', [
                'controller' => 'SocialApiAuthGoogleController',
                'method' => 'googleConnect',
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            $success['token'] = $token;
            $success['user'] = $user;
            $roles = $user->getRoleNames();
            $success['roles'] = $roles;

            return $this->sendResponse($success, 'Connexion réussie.');
        } catch (\Exception $e) {
            // Log de l'erreur de connexion Google
            Log::error('Erreur lors de la connexion Google', [
                'controller' => 'SocialApiAuthGoogleController',
                'method' => 'googleConnect',
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $this->sendError('Erreur de connexion Google', ['error' => $e->getMessage()], 400);
        }
    }
}
