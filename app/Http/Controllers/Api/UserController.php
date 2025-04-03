<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Etablissement;
use App\Models\User;
use App\Models\UserFavoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Password;
use Illuminate\Support\Facades\Log;

class UserController extends BaseController
{
    /**
     * Register a new user.
     *
     * @header Content-Type application/json
     * @group Account management
     * @bodyParam name string required the name of the user. Example: Gautier
     * @bodyParam email string required the email of the user. Example: gautier@position.cm
     * @bodyParam password string required the password of the user. Example: gautier123
     * @bodyParam phone int required The phone number of the user. Example:699999999
     * @bodyParam image_profil file Profile Image.
     * @responseFile storage/responses/register.json
     */
    public function register(Request $request)
    {
        // Log de la tentative d'inscription
        Log::debug('Tentative d\'inscription', [
            'controller' => 'UserController',
            'method' => 'register',
            'inputs' => $request->all()
        ]);
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:191',
            'email' => 'email|unique:users,email',
            'password' => 'string|between:6,20',
            'phone' => 'regex:/^[\+0-9]+$/',
            'image_profil' => 'mimes:png,jpg,jpeg|max:20000'
        ]);


        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['image_profil'] = 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($input['email'])));
        if ($request->file()) {
            $fileName = time() . '_' . $request->image_profil->getClientOriginalName();
            $filePath = $request->file('image_profil')->storeAs('uploads/users/profils', $fileName, 'public');
            $input['image_profil'] = '/storage/' . $filePath;
        }
        $user = User::create($input);

        $user->assignRole('user');
        $user->sendEmailVerificationNotification();
        $success['token'] = $user->createToken('Position')->accessToken;
        $success['user'] = $user;

        if ($user) {
            // Log de l'inscription réussie
            Log::info('Inscription réussie', [
                'controller' => 'UserController',
                'method' => 'register',
                'user_id' => $user->id,
                'email' => $user->email
            ]);
            return $this->sendResponse($success, 'Création réussie verifiez vos mails.');
        } else {
            // Log de l'échec de l'inscription
            Log::error('Échec de l\'inscription', [
                'controller' => 'UserController',
                'method' => 'register',
                'input' => $input
            ]);
            return $this->sendError("Pas autorisé.", ['error' => 'Unauthorised']);
        }
    }

    /**
     * Login a new user.
     *
     * @header Content-Type application/json
     * @group Account management
     * @bodyParam email string required if phone not found the email of the user. Example: admin@position.cm
     * @bodyParam password string required the password of the user. Example: secret
     * @bodyParam phone int required if email not found The phone number of the user. Example:699999999
     */
    public function login(Request $request)
    {
        // Log de la tentative de connexion
        Log::debug('Tentative de connexion', [
            'controller' => 'UserController',
            'method' => 'login',
            'inputs' => $request->all()
        ]);
        $credentials = $request->only(['email', 'phone', 'password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->hasVerifiedEmail()) {
                $user->getRoleNames();
                $success['token'] = $user->createToken('Position')->accessToken;
                $success['user'] = $user;

                // Log de la connexion réussie
                Log::info('Connexion réussie', [
                    'controller' => 'UserController',
                    'method' => 'login',
                    'user_id' => $user->id,
                    'email' => $user->email
                ]);

                return $this->sendResponse($success, 'Connexion réussie.');
            } else {
                // Log de l'échec de la connexion en raison d'un email non vérifié
                Log::warning('Connexion échouée - Email non vérifié', [
                    'controller' => 'UserController',
                    'method' => 'login',
                    'user_id' => $user->id,
                    'email' => $user->email
                ]);
                return $this->sendError("Email not verified.", ['error' => 'Unauthorised'], 400);
            }
        } else {
            // Log de l'échec de la connexion
            Log::error('Échec de la connexion', [
                'controller' => 'UserController',
                'method' => 'login',
                'credentials' => $credentials
            ]);
            return $this->sendError('Pas autorisé.', ['error' => 'Login Error']);
        }
    }

    /**
     * Logout a user.
     *
     * @header Content-Type application/json
     * @authenticated
     * @group Account management
     */
    public function logout()
    {
        // Log de la tentative de déconnexion
        Log::debug('Tentative de déconnexion', [
            'controller' => 'UserController',
            'method' => 'logout',
            'user_id' => Auth::id()
        ]);
        $user = Auth::user();

        if ($user) {
            $token = $user->token();
            $revoque = $token->revoke();

            if ($revoque) {
                // Log de la déconnexion réussie
                Log::info('Déconnexion réussie', [
                    'controller' => 'UserController',
                    'method' => 'logout',
                    'user_id' => $user->id
                ]);
                return $this->sendResponse("", 'Deconnexion réussie.');
            } else {
                // Log de l'échec de la déconnexion
                Log::error('Échec de la déconnexion', [
                    'controller' => 'UserController',
                    'method' => 'logout',
                    'user_id' => $user->id
                ]);
                return $this->sendError('Pas autorisé.', ['error' => 'Echec de deconnexion'], 400);
            }
        } else {
            // Log de l'échec de la déconnexion en raison d'un utilisateur non authentifié
            Log::warning('Tentative de déconnexion sans utilisateur authentifié', [
                'controller' => 'UserController',
                'method' => 'logout'
            ]);
            return $this->sendResponse("", 'Deconnexion réussie.');
        }
    }

    /**
     * get User Account.
     *
     * @header Content-Type application/json
     * @authenticated
     * @group Account management
     */
    public function getUser()
    {
        // Log de la récupération des informations utilisateur
        Log::debug('Récupération des informations utilisateur', [
            'controller' => 'UserController',
            'method' => 'getUser',
            'user_id' => Auth::id()
        ]);
        $user = Auth::user();

        if ($user) {
            $roles = $user->getRoleNames();
            $user->abonnement;
            $success["user"] = $user;
            $succes['roles'] = $roles;

            // Log du succès de la récupération
            Log::info('Informations utilisateur récupérées', [
                'controller' => 'UserController',
                'method' => 'getUser',
                'user_id' => $user->id
            ]);

            return $this->sendResponse($success, 'Utilisateur');
        } else {
            // Log de l'échec de la récupération en raison d'un utilisateur non authentifié
            Log::warning('Echec Unauthorised', [
                'controller' => 'UserController',
                'method' => 'getUser'
            ]);
            return $this->sendError('Pas autorisé.', ['error' => 'Unauthorised']);
        }
    }

    /**
     * Update user account.
     *
     * @header Content-Type application/json
     * @authenticated
     * @group Account management
     * @urlParam id int required the id of the admin. Example: 1
     * @bodyParam name string the name of the user. Example: Gautier
     * @bodyParam phone int The phone number of the user. Example:699999999
     * @bodyParam image_profil file Profile Image.
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     */
    public function updateuser($id, Request $request)
    {
        // Log de la tentative de mise à jour
        Log::debug('Tentative de mise à jour de l\'utilisateur', [
            'controller' => 'UserController',
            'method' => 'updateuser',
            'user_id' => $id,
            'inputs' => $request->all()
        ]);
        $user = Auth::user();
        $admin = Admin::where('user_id', $user->id)->first();
        if ($admin || $user->id == $id) {
            $validator = Validator::make($request->all(), [
                'phone' => 'regex:/^[\+0-9]+$/',
                'image_profil' => 'mimes:png,jpg,jpeg|max:20000'
            ]);

            if ($validator->fails()) {
                return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
            }

            $user = Auth::user();
            $user->name = $request->name ?? $user->name;
            $user->phone = $request->phone ?? $user->phone;

            if ($request->file()) {
                $fileName = time() . '_' . $request->image_profil->getClientOriginalName();
                $filePath = $request->file('image_profil')->storeAs('uploads/users/profils', $fileName, 'public');
                $user->image_profil = '/storage/' . $filePath;
            }

            $save = $user->save();

            if ($save) {
                // Log de la mise à jour réussie
                Log::info('Mise à jour réussie', [
                    'controller' => 'UserController',
                    'method' => 'updateuser',
                    'user_id' => $user->id
                ]);
                $success["user"] = $user;
                return $this->sendResponse($success, "Utilisateur", 201);
            } else {
                // Log de l'échec de la mise à jour
                Log::error('Échec de la mise à jour', [
                    'controller' => 'UserController',
                    'method' => 'updateuser',
                    'user_id' => $user->id
                ]);
                return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
            }
        } else {
            // Log de l'échec de la mise à jour en raison d'un utilisateur non autorisé
            Log::warning('Tentative de mise à jour d\'un utilisateur non autorisé', [
                'controller' => 'UserController',
                'method' => 'updateuser',
                'user_id' => $id
            ]);
            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }


    /**
     * Delete user account.
     *
     * @header Content-Type application/json
     * @authenticated
     * @group Account management
     * @urlParam id int required the id of the admin. Example: 1
     */
    public function deleteuser($id)
    {
        // Log de la tentative de suppression
        Log::debug('Tentative de suppression de l\'utilisateur', [
            'controller' => 'UserController',
            'method' => 'deleteuser',
            'user_id' => $id
        ]);
        $user = Auth::user();
        $admin = Admin::where('user_id', $user->id)->first();
        if ($admin || $user->id == $id) {

            try {
                User::destroy($id);

                // Log de la suppression réussie
                Log::info('Suppression réussie', [
                    'controller' => 'UserController',
                    'method' => 'deleteuser',
                    'user_id' => $id
                ]);

                return $this->sendResponse("", "Delete Success", 200);
            } catch (\Throwable $th) {
                // Log de l'échec de la suppression
                Log::error('Échec de la suppression', [
                    'controller' => 'UserController',
                    'method' => 'deleteuser',
                    'user_id' => $id,
                    'exception' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ]);
                return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
            }
        }
    }


    /**
     * Forgot Password
     *
     * @header Content-Type application/json
     * @group Account management
     * @bodyParam email string required the email of the user. Example: admin@position.cm
     */
    public function forgot()
    {
        // Log de la tentative de réinitialisation du mot de passe
        Log::debug('Tentative de réinitialisation du mot de passe', [
            'controller' => 'UserController',
            'method' => 'forgot',
            'inputs' => request()->all()
        ]);
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);

        // Log de l'envoi du lien de réinitialisation
        Log::info('Lien de réinitialisation envoyé', [
            'controller' => 'UserController',
            'method' => 'forgot',
            'email' => $credentials['email']
        ]);

        return $this->sendResponse("", "Un lien de reinitialisation vous a été envoyé par mail.", 200);
    }

    /**
     * Reset Password
     *
     * @header Content-Type application/json
     * @group Account management
     * @bodyParam email string required the email of the user. Example: admin@position.cm
     * @bodyParam token string required token give in mail.
     * @bodyParam password string required the new password of the user. Example: gautier124
     * @bodyParam password_confirmation string required the password confirmation of the user. Example: gautier124
     */
    public function reset(Request $request)
    {
        // Log de la tentative de réinitialisation du mot de passe
        Log::debug('Tentative de réinitialisation du mot de passe', [
            'controller' => 'UserController',
            'method' => 'reset',
            'inputs' => $request->all()
        ]);


        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        if ($validator->fails()) {
            // Log des erreurs de validation
            Log::error('Erreur de validation', [
                'controller' => 'UserController',
                'method' => 'reset',
                'errors' => $validator->errors()
            ]);
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $credentials = $request->only(['email', 'token', 'password']);

        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        });

        // Log de la réinitialisation du mot de passe
        Log::info('Réinitialisation du mot de passe', [
            'controller' => 'UserController',
            'method' => 'reset',
            'email' => $credentials['email'],
            'status' => $reset_password_status
        ]);

        if ($reset_password_status == Password::INVALID_TOKEN) {
            // Log de l'échec de la réinitialisation en raison d'un token invalide
            Log::error('Échec de la réinitialisation du mot de passe - Token invalide', [
                'controller' => 'UserController',
                'method' => 'reset',
                'email' => $credentials['email']
            ]);
            return $this->sendError("Invalid token provided", ['error' => 'Unauthorised']);
        }
        if ($reset_password_status == Password::INVALID_USER) {
            // Log de l'échec de la réinitialisation en raison d'un utilisateur invalide
            Log::error('Échec de la réinitialisation du mot de passe - Utilisateur invalide', [
                'controller' => 'UserController',
                'method' => 'reset',
                'email' => $credentials['email']
            ]);
            return $this->sendError("Invalid user provided", ['error' => 'Unauthorised']);
        }
        Log::info('Réinitialisation du mot de passe réussie', [
            'controller' => 'UserController',
            'method' => 'reset',
            'email' => $credentials['email']
        ]);

        return $this->sendResponse("", "Password has been successfully changed", 201);
    }

    /**
     * Get Favorites
     *
     * @authenticated
     * @group Account management
     */

    public function favorites()
    {
        // Log de la récupération des favoris
        Log::debug('Récupération des favoris', [
            'controller' => 'UserController',
            'method' => 'favorites',
            'user_id' => Auth::id()
        ]);
        $user = Auth::user();
        $favorites = UserFavoris::where('user_id', $user->id)->get();

        $etablissements = Etablissement::whereIn('id', $favorites->pluck('etablissement_id'))->get();

        foreach ($etablissements as $etablissement) {

            $etablissement->isFavoris = $this->checkIfEtablissementInFavoris($etablissement, $user->id);



            $moyenne = $this->getMoyenneRatingByEtablissmeent($etablissement->id);

            $isOpen = $this->checkIfEtablissementIsOpen($etablissement->id);

            $etablissement->isopen = $isOpen;

            $etablissement->moyenne = $moyenne;

            $etablissement->avis = $this->getCommentNumberByEtablissmeent($etablissement->id);

            $etablissement->count = $this->countOccurenceRatingInCommentTableByEtablissement($etablissement->id);


            $etablissement->batiment;
            $etablissement->sousCategories;



            foreach ($etablissement->sousCategories as $sousCategories) {
                $sousCategories->categorie;
            }

            $etablissement->commodites;
            $etablissement->images;
            $etablissement->horaires;
            $etablissement->commentaires;

            foreach ($etablissement->commentaires as $commentaires) {
                $commentaires->user;
            }
        }

        // Log du succès de la récupération
        Log::info('Favoris récupérés avec succès', [
            'controller' => 'UserController',
            'method' => 'favorites',
            'user_id' => $user->id,
            'nombre_favoris' => count($etablissements)
        ]);

        return $this->sendResponse($etablissements, 'Favorites');
    }
}
