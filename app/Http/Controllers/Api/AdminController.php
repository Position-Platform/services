<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * @authenticated
 * @group Admin management
 *
 * APIs for managing Admin
 */
class AdminController extends BaseController
{
    /**
     * Get all Admin.
     *
     * @header Content-Type application/json
     */
    public function index()
    {
        // Log du début de la requête
        Log::debug('Récupération de la liste des administrateurs', [
            'controller' => 'AdminController',
            'method' => 'index'
        ]);

        $admins = Admin::all();

        foreach ($admins as $admin) {
            $admin->user->roles;
        }

        // Log du nombre d'administrateurs récupérés
        Log::info('Liste des administrateurs récupérée', [
            'controller' => 'AdminController',
            'method' => 'index',
            'count' => count($admins)
        ]);

        $success['admins'] = $admins;

        return $this->sendResponse($success, 'Liste des Admins');
    }

    /**
     * Add a new admin.
     *
     * @header Content-Type application/json
     * @bodyParam name string required the name of the admin. Example: Gautier
     * @bodyParam email string required the email of the admin. Example: gautier@position.cm
     * @bodyParam password string required the password of the admin. Example: gautier123
     * @bodyParam phone int required The phone number of the admin. Example:699999990
     * @bodyParam image_profil file Profile Image.
     */
    public function store(Request $request)
    {
        // Log du début de la création
        Log::debug('Tentative de création d\'un administrateur', [
            'controller' => 'AdminController',
            'method' => 'store',
            'inputs' => array_diff_key($request->all(), ['password' => '']) // On exclut le mot de passe des logs
        ]);

        $user = Auth::user();
        $admin = Admin::where('user_id', $user->id)->first();

        if ($admin->isSuperAdmin == 1) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'phone' => 'regex:/^[\+0-9]+$/',
                'password' => 'string|between:6,20',
                'image_profil' => 'mimes:png,jpg,jpeg|max:20000'
            ]);

            if ($validator->fails()) {
                // Log des erreurs de validation
                Log::warning('Validation échouée lors de la création d\'un administrateur', [
                    'controller' => 'AdminController',
                    'method' => 'store',
                    'errors' => $validator->errors()->toArray()
                ]);

                return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
            }

            $input['name'] = $request->name;
            $input['email'] = $request->email;
            $input['phone'] = $request->phone;
            $input['password'] = bcrypt($request->password);

            if ($request->file()) {
                $fileName = time() . '_' . $request->image_profil->getClientOriginalName();
                $filePath = $request->file('image_profil')->storeAs('uploads/admins/profils', $fileName, 'public');
                $input['image_profil'] = '/storage/' . $filePath;

                // Log de l'upload de fichier
                Log::debug('Image de profil uploadée pour nouvel administrateur', [
                    'controller' => 'AdminController',
                    'method' => 'store',
                    'filename' => $fileName,
                    'path' => $filePath
                ]);
            }

            try {
                DB::beginTransaction();

                // Log du début de la transaction
                Log::debug('Début de transaction pour création d\'administrateur', [
                    'controller' => 'AdminController',
                    'method' => 'store'
                ]);

                $user = User::create($input);
                $user->assignRole('admin');
                $user->sendEmailVerificationNotification();

                $inputAdmin['user_id'] = $user->id;

                $admin = Admin::create($inputAdmin);

                $admin->user->roles;

                DB::commit();

                // Log du succès de la création
                Log::info('Administrateur créé avec succès', [
                    'controller' => 'AdminController',
                    'method' => 'store',
                    'admin_id' => $admin->id,
                    'user_id' => $user->id,
                    'user_email' => $user->email
                ]);

                $success['admin'] = $admin;

                return $this->sendResponse($success, "Création de l'admin reussie", 201);
            } catch (\Exception $ex) {
                DB::rollBack();

                // Log de l'erreur
                Log::error('Erreur lors de la création d\'un administrateur', [
                    'controller' => 'AdminController',
                    'method' => 'store',
                    'exception' => $ex->getMessage(),
                    'trace' => $ex->getTraceAsString()
                ]);

                return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
            }
        } else {
            // Log de l'accès non autorisé
            Log::warning('Tentative non autorisée de création d\'un administrateur', [
                'controller' => 'AdminController',
                'method' => 'store',
                'user_id' => $user->id,
                'is_super_admin' => $admin ? $admin->isSuperAdmin : 'null'
            ]);

            return $this->sendError("Pas autorisé.", ['error' => 'Unauthorised']);
        }
    }

    /**
     * Show Admin by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the admin. Example: 1
    
     */
    public function show($id)
    {
        // Log de la demande de détails
        Log::debug('Récupération des détails d\'un administrateur', [
            'controller' => 'AdminController',
            'method' => 'show',
            'admin_id' => $id
        ]);

        $admin = Admin::find($id);

        if (!$admin) {
            Log::warning('Administrateur non trouvé', [
                'controller' => 'AdminController',
                'method' => 'show',
                'admin_id' => $id
            ]);
            return $this->sendError('Administrateur non trouvé', [], 404);
        }

        $admin->user->roles;

        // Log du succès de la récupération
        Log::info('Détails de l\'administrateur récupérés', [
            'controller' => 'AdminController',
            'method' => 'show',
            'admin_id' => $id,
            'user_id' => $admin->user_id
        ]);

        $success['admin'] = $admin;

        return $this->sendResponse($success, "Admin");
    }

    /**
     * Update admin account.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the admin. Example: 1
     * @bodyParam name string the name of the user. Example: Gautier
     * @bodyParam phone int The phone number of the user. Example:699999992
     * @bodyParam isSuperAdmin bool. Example:true
     * @bodyParam image_profil file Profile Image.
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     
     */
    public function update(Request $request, $id)
    {
        // Log de la tentative de mise à jour
        Log::debug('Tentative de mise à jour d\'un administrateur', [
            'controller' => 'AdminController',
            'method' => 'update',
            'admin_id' => $id,
            'inputs' => $request->except('image_profil')
        ]);

        $user = Auth::user();
        $admin = Admin::where('user_id', $user->id)->first();

        if ($admin->isSuperAdmin == 1 || $user->id == $id) {
            $admin = Admin::find($id);

            if (!$admin) {
                Log::warning('Tentative de mise à jour d\'un administrateur inexistant', [
                    'controller' => 'AdminController',
                    'method' => 'update',
                    'admin_id' => $id
                ]);
                return $this->sendError('Administrateur non trouvé', [], 404);
            }

            $request->validate([
                'image_profil' => 'mimes:png,jpg,jpeg|max:20000'
            ]);

            try {
                DB::beginTransaction();

                // Log du début de la transaction
                Log::debug('Début de transaction pour mise à jour d\'administrateur', [
                    'controller' => 'AdminController',
                    'method' => 'update',
                    'admin_id' => $id
                ]);

                $userUpdate = User::find($admin->user_id);
                $userUpdate->name = $request->name ?? $userUpdate->name;
                $userUpdate->phone = $request->phone ?? $userUpdate->phone;

                if ($request->file()) {
                    $fileName = time() . '_' . $request->image_profil->getClientOriginalName();
                    $filePath = $request->file('image_profil')->storeAs('uploads/admins/profils', $fileName, 'public');
                    $userUpdate->image_profil = '/storage/' . $filePath;

                    // Log de l'upload de fichier
                    Log::debug('Image de profil mise à jour pour administrateur', [
                        'controller' => 'AdminController',
                        'method' => 'update',
                        'admin_id' => $id,
                        'filename' => $fileName,
                        'path' => $filePath
                    ]);
                }
                $userUpdate->save();

                $admin->isSuperAdmin = $request->isSuperAdmin ?? $admin->isSuperAdmin;
                $admin->save();
                $admin->user->roles;

                DB::commit();

                // Log du succès de la mise à jour
                Log::info('Administrateur mis à jour avec succès', [
                    'controller' => 'AdminController',
                    'method' => 'update',
                    'admin_id' => $id,
                    'user_id' => $userUpdate->id,
                    'is_super_admin' => $admin->isSuperAdmin
                ]);

                $success['admin'] = $admin;

                return $this->sendResponse($success, "Update Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();

                // Log de l'erreur
                Log::error('Erreur lors de la mise à jour d\'un administrateur', [
                    'controller' => 'AdminController',
                    'method' => 'update',
                    'admin_id' => $id,
                    'exception' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ]);

                return $this->sendError('Erreur.', ['Echec de mise à jour' => $th->getMessage()], 400);
            }
        } else {
            // Log de l'accès non autorisé
            Log::warning('Tentative non autorisée de mise à jour d\'un administrateur', [
                'controller' => 'AdminController',
                'method' => 'update',
                'admin_id' => $id,
                'user_id' => $user->id,
                'is_super_admin' => $admin ? $admin->isSuperAdmin : 'null'
            ]);

            return $this->sendError("Pas autorisé.", ['error' => 'Unauthorised']);
        }
    }

    /**
     * Delete admin account.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the admin. Example: 1
     
     */
    public function destroy($id)
    {
        // Log de la tentative de suppression
        Log::debug('Tentative de suppression d\'un administrateur', [
            'controller' => 'AdminController',
            'method' => 'destroy',
            'admin_id' => $id
        ]);

        $user = Auth::user();
        $admin = Admin::where('user_id', $user->id)->first();

        if ($admin->isSuperAdmin == 1 || $user->id == $id) {
            $admin = Admin::find($id);

            if (!$admin) {
                Log::warning('Tentative de suppression d\'un administrateur inexistant', [
                    'controller' => 'AdminController',
                    'method' => 'destroy',
                    'admin_id' => $id
                ]);
                return $this->sendError('Administrateur non trouvé', [], 404);
            }

            try {
                DB::beginTransaction();

                // Log du début de la transaction
                Log::debug('Début de transaction pour suppression d\'administrateur', [
                    'controller' => 'AdminController',
                    'method' => 'destroy',
                    'admin_id' => $id,
                    'user_id' => $admin->user_id
                ]);

                $admin->user()->delete();
                $admin->delete();

                DB::commit();

                // Log du succès de la suppression
                Log::info('Administrateur supprimé avec succès', [
                    'controller' => 'AdminController',
                    'method' => 'destroy',
                    'admin_id' => $id
                ]);

                return $this->sendResponse("", "Delete Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();

                // Log de l'erreur
                Log::error('Erreur lors de la suppression d\'un administrateur', [
                    'controller' => 'AdminController',
                    'method' => 'destroy',
                    'admin_id' => $id,
                    'exception' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ]);

                return $this->sendError('Echec de suppression.', ['error' => $th->getMessage()], 400);
            }
        } else {
            // Log de l'accès non autorisé
            Log::warning('Tentative non autorisée de suppression d\'un administrateur', [
                'controller' => 'AdminController',
                'method' => 'destroy',
                'admin_id' => $id,
                'user_id' => $user->id,
                'is_super_admin' => $admin ? $admin->isSuperAdmin : 'null'
            ]);

            return $this->sendError("Pas autorisé.", ['error' => 'Unauthorised']);
        }
    }
}
