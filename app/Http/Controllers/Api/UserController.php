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
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:191',
            'email' => 'email|unique:users,email',
            'password' => 'string|between:6,20',
            'phone' => 'regex:/^[\+0-9]+$/',
            'image_profil' => 'mimes:png,jpg,jpeg|max:10000'
        ]);


        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
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
            return $this->sendResponse($success, 'Création réussie verifiez vos mails.');
        } else {
            return $this->sendError("Pas autorisé.", ['error' => 'Unauthorised']);
        }
    }

    /**
     * Login a new user.
     *
     * @header Content-Type application/json
     * @group Account management
     * @bodyParam email string required if phone not found the email of the user. Example: gautier@position.cm
     * @bodyParam password string required the password of the user. Example: gautier123
     * @bodyParam phone int required if email not found The phone number of the user. Example:699999999
     * @responseFile storage/responses/login.json
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'phone', 'password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->hasVerifiedEmail()) {
                $user->getRoleNames();
                $success['token'] = $user->createToken('Position')->accessToken;
                $success['user'] = $user;

                return $this->sendResponse($success, 'Connexion réussie.');
            } else {
                return $this->sendError("Email not verified.", ['error' => 'Unauthorised'], 400);
            }
        } else {
            return $this->sendError('Pas autorisé.', ['error' => 'Login Error']);
        }
    }

    /**
     * Logout a user.
     *
     * @header Content-Type application/json
     * @authenticated
     * @group Account management
     * @responseFile storage/responses/logout.json
     */
    public function logout()
    {
        $user = Auth::user();
        $token = $user->token();
        $revoque = $token->revoke();

        if ($revoque) {
            return $this->sendResponse("", 'Deconnexion réussie.');
        } else {
            return $this->sendError('Pas autorisé.', ['error' => 'Echec de deconnexion'], 400);
        }
    }

    /**
     * get User Account.
     *
     * @header Content-Type application/json
     * @authenticated
     * @group Account management
     * @responseFile storage/responses/getuser.json
     */
    public function getUser()
    {
        $user = Auth::user();

        if ($user) {
            $roles = $user->getRoleNames();
            $success["user"] = $user;
            $succes['roles'] = $roles;

            return $this->sendResponse($success, 'Utilisateur');
        } else {
            return $this->sendError('Pas autorisé.', ['error' => 'Unauthorised']);
        }
    }

    /**
     * Update user account.
     *
     * @header Content-Type application/json
     * @authenticated
     * @group Account management
     * @urlParam id int required the id of the admin. Example: 2
     * @bodyParam name string the name of the user. Example: Gautier
     * @bodyParam phone int The phone number of the user. Example:699999999
     * @bodyParam image_profil file Profile Image.
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updateuser.json
     */
    public function updateuser($id, Request $request)
    {
        $user = Auth::user();
        $admin = Admin::where('user_id', $user->id)->first();
        if ($admin || $user->id == $id) {
            $validator = Validator::make($request->all(), [
                'phone' => 'regex:/^[\+0-9]+$/',
                'image_profil' => 'mimes:png,jpg,jpeg|max:10000'
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
                $success["user"] = $user;
                return $this->sendResponse($success, "Utilisateur", 201);
            } else {
                return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
            }
        } else {
            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }


    /**
     * Delete user account.
     *
     * @header Content-Type application/json
     * @authenticated
     * @group Account management
     * @urlParam id int required the id of the admin. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function deleteuser($id)
    {
        $user = Auth::user();
        $admin = Admin::where('user_id', $user->id)->first();
        if ($admin || $user->id == $id) {

            try {
                User::destroy($id);

                return $this->sendResponse("", "Delete Success", 200);
            } catch (\Throwable $th) {
                return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
            }
        }
    }


    /**
     * Forgot Password
     *
     * @header Content-Type application/json
     * @group Account management
     * @bodyParam email string required the email of the user. Example: gautier@position.cm
     * @responseFile storage/responses/forgot.json
     */
    public function forgot()
    {
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);

        return $this->sendResponse("", "Un lien de reinitialisation vous a été envoyé par mail.", 200);
    }

    /**
     * Reset Password
     *
     * @header Content-Type application/json
     * @group Account management
     * @bodyParam email string required the email of the user. Example: gautier@position.cm
     * @bodyParam token string required token give in mail.
     * @bodyParam password string required the new password of the user. Example: gautier124
     * @bodyParam password_confirmation string required the password confirmation of the user. Example: gautier124
     * @responseFile 201 storage/responses/reset.json
     */
    public function reset(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $credentials = $request->only(['email', 'token', 'password']);

        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return $this->sendError("Invalid token provided", ['error' => 'Unauthorised']);
        }

        return $this->sendResponse("", "Password has been successfully changed", 201);
    }

    /**
     * Get Favorites
     *
     * @authenticated
     * @group Account management
     * @responseFile storage/responses/favorites.json
     */

    public function favorites()
    {
        $user = Auth::user();
        $favorites = UserFavoris::where('user_id', $user->id)->get();

        $etablissements = Etablissement::whereIn('id', $favorites->pluck('etablissement_id'))->get();

        foreach ($etablissements as  $etablissement) {
            $etablissement->batiment;
            $etablissement->sousCategories;

            foreach ($etablissement->sousCategories as  $sousCategories) {
                $sousCategories->categorie;
            }

            $etablissement->commodites;
            $etablissement->images;
            $etablissement->horaires;
            $etablissement->commentaires;

            foreach ($etablissement->commentaires as  $commentaires) {
                $commentaires->user;
            }

            $etablissement->user;
        }

        return $this->sendResponse($etablissements, 'Favorites');
    }
}
