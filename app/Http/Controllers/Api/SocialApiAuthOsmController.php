<?php

namespace App\Http\Controllers\Api;

use App\Services\SocialOsmAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

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

        // Log de la tentative de connexion OSM
        Log::debug('Tentative de connexion via OpenStreetMap', [
            'controller' => 'SocialApiAuthOsmController',
            'method' => 'osmConnect',
            'token_length' => strlen($token)
        ]);

        try {
            // Récupération de l'utilisateur depuis l'API OSM
            $socialiteUser = Socialite::driver('openstreetmap')->userFromToken($token);

            // Log des informations de l'utilisateur OSM récupérées
            Log::debug('Informations utilisateur OpenStreetMap récupérées', [
                'controller' => 'SocialApiAuthOsmController',
                'method' => 'osmConnect',
                'socialite_id' => $socialiteUser->getId(),
                'socialite_email' => $socialiteUser->getEmail(),
                'socialite_name' => $socialiteUser->getName()
            ]);

            // Création ou récupération de l'utilisateur dans notre système
            $user = $service->createOrGetUser($socialiteUser);

            // Authentification de l'utilisateur
            Auth::login($user);
            $token = $user->createToken('Position')->accessToken;

            // Log du succès de la connexion OSM
            Log::info('Connexion OpenStreetMap réussie', [
                'controller' => 'SocialApiAuthOsmController',
                'method' => 'osmConnect',
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            $success['token'] = $token;
            $success['user'] = $user;
            $roles = $user->getRoleNames();
            $success['roles'] = $roles;

            return $this->sendResponse($success, 'Connexion réussie.');
        } catch (\Exception $e) {
            // Log de l'erreur de connexion OSM
            Log::error('Erreur lors de la connexion OpenStreetMap', [
                'controller' => 'SocialApiAuthOsmController',
                'method' => 'osmConnect',
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $this->sendError('Erreur de connexion OpenStreetMap', ['error' => $e->getMessage()], 400);
        }
    }
}
