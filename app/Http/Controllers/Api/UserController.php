<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Password;
use Spatie\Permission\Models\Role;

class UserController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:191',
            'email' => 'email|unique:users,email',
            'password' => 'string|between:6,20',
            'phone' => 'regex:/^[\+0-9]+$/',
        ]);


        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
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
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'phone', 'password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $roles = $user->getRoleNames();
            $success['token'] = $user->createToken('Position')->accessToken;
            $success['user'] = $user;
            $succes['roles'] = $roles;

            return $this->sendResponse($success, 'Connexion réussie.');
        } else {
            return $this->sendError('Pas autorisé.', ['error' => 'Unauthorised']);
        }
    }

    /**
     * Logout
     *
     * @return \Illuminate\Http\Response
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
     * Get User Connected
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser()
    {
    }

    /**
     * Update User
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request)
    {
    }


    /**
     * Forgot Password
     *
     * @return \Illuminate\Http\Response
     */
    public function forgot()
    {
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);

        return $this->sendResponse("", "Un lien de reinitialisation vous a été envoyé par mail.", 201);
    }

    /**
     * Reset Password
     *
     * @return \Illuminate\Http\Response
     */
    public function reset()
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return $this->sendError("Invalid token provided", ['error' => 'Unauthorised']);
        }

        return $this->sendResponse("", "Password has been successfully changed", 201);
    }
}
