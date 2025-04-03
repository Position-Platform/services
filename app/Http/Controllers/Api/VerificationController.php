<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VerificationController extends BaseController
{
    /**
     * Verify Password
     *
     * @return \Illuminate\Http\Response
     */
    public function verify($id, Request $request)
    {
        // Log de la vérification de l'email
        Log::debug('Tentative de vérification de l\'email', [
            'controller' => 'VerificationController',
            'method' => 'verify',
            'user_id' => $id,
            'request' => $request->all()
        ]);
        /*  if (!$request->hasValidSignature()) {
            return $this->sendError("Invalid/Expired url provided.", ['error' => 'Unauthorised']);
        }*/

        $user = User::findOrFail($id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
        // Log de la vérification réussie
        Log::info('Vérification de l\'email réussie', [
            'controller' => 'VerificationController',
            'method' => 'verify',
            'user_id' => $id
        ]);
        $success['user'] = $user;
        return $this->sendResponse($success, 'Vérification Reussie');
    }

    /**
     * Ressed Password
     *
     * @return \Illuminate\Http\Response
     */
    public function resend()
    {

        // Log de la demande de renvoi de l'email de vérification
        Log::debug('Tentative de renvoi de l\'email de vérification', [
            'controller' => 'VerificationController',
            'method' => 'resend',
            'user_id' => Auth::id()
        ]);
        if (Auth::user()->hasVerifiedEmail()) {
            return $this->sendError("Email already verified.", ['error' => ''], 400);
        }

        // Log de l'envoi de l'email de vérification
        Log::info('Envoi de l\'email de vérification', [
            'controller' => 'VerificationController',
            'method' => 'resend',
            'user_id' => Auth::id()
        ]);

        Auth::user()->sendEmailVerificationNotification();
        $success['user'] = auth()->user();
        return $this->sendResponse($success, 'Email verification link sent on your email id');
    }

    /**
     * Verify Account
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyByPhone($id)
    {
        // Log de la vérification du téléphone
        Log::debug('Tentative de vérification du téléphone', [
            'controller' => 'VerificationController',
            'method' => 'verifyByPhone',
            'user_id' => $id
        ]);
        $user = User::findOrFail($id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
        // Log de la vérification réussie
        Log::info('Vérification du téléphone réussie', [
            'controller' => 'VerificationController',
            'method' => 'verifyByPhone',
            'user_id' => $id
        ]);
        $success['user'] = $user;
        return $this->sendResponse($success, 'Vérification Reussie');
    }
}
