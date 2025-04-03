<?php

namespace App\Http\Controllers\Api;

use App\Services\SocialAppleAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

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

        // Log de la tentative de connexion Apple
        Log::debug('Tentative de connexion via Apple', [
            'controller' => 'SocialApiAuthAppleController',
            'method' => 'appleConnect',
            'token_length' => strlen($token)
        ]);

        try {
            // Récupération de l'utilisateur depuis l'API Apple
            $socialiteUser = Socialite::driver('apple')->userFromToken($token);

            // Log des informations de l'utilisateur Apple récupérées
            Log::debug('Informations utilisateur Apple récupérées', [
                'controller' => 'SocialApiAuthAppleController',
                'method' => 'appleConnect',
                'socialite_id' => $socialiteUser->getId(),
                'socialite_email' => $socialiteUser->getEmail(),
                'socialite_name' => $socialiteUser->getName()
            ]);

            // Création ou récupération de l'utilisateur dans notre système
            $user = $service->createOrGetUser($socialiteUser);

            // Authentification de l'utilisateur
            Auth::login($user);
            $token = $user->createToken('Position')->accessToken;

            // Log du succès de la connexion Apple
            Log::info('Connexion Apple réussie', [
                'controller' => 'SocialApiAuthAppleController',
                'method' => 'appleConnect',
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            $success['token'] = $token;
            $success['user'] = $user;
            $roles = $user->getRoleNames();
            $success['roles'] = $roles;

            return $this->sendResponse($success, 'Connexion réussie.');
        } catch (\Exception $e) {
            // Log de l'erreur de connexion Apple
            Log::error('Erreur lors de la connexion Apple', [
                'controller' => 'SocialApiAuthAppleController',
                'method' => 'appleConnect',
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $this->sendError('Erreur de connexion Apple', ['error' => $e->getMessage()], 400);
        }
    }
}
