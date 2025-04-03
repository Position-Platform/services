<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Validator;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Log du début de la requête
        Log::debug('Récupération de la liste des rôles', [
            'controller' => 'RoleController',
            'method' => 'index'
        ]);

        $roles = Role::all();

        foreach ($roles as $role) {
            $role->permissions;
        }

        // Log du nombre de rôles récupérés
        Log::info('Liste des rôles récupérée', [
            'controller' => 'RoleController',
            'method' => 'index',
            'count' => count($roles)
        ]);

        $success['roles'] = $roles;

        return $this->sendResponse($roles, 'Liste des Roles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Log du début de la création
        Log::debug('Tentative de création d\'un rôle', [
            'controller' => 'RoleController',
            'method' => 'store',
            'inputs' => $request->all()
        ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name'
        ]);

        if ($validator->fails()) {
            // Log des erreurs de validation
            Log::warning('Validation échouée lors de la création d\'un rôle', [
                'controller' => 'RoleController',
                'method' => 'store',
                'errors' => $validator->errors()->toArray()
            ]);

            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        try {
            $role = Role::create(['name' => $request->input('name')]);

            // Log du succès de la création
            Log::info('Rôle créé avec succès', [
                'controller' => 'RoleController',
                'method' => 'store',
                'role_id' => $role->id,
                'role_name' => $role->name
            ]);

            $success['role'] = $role;

            return $this->sendResponse($role, 'Création du Role reussie');
        } catch (\Exception $e) {
            // Log de l'erreur
            Log::error('Erreur lors de la création d\'un rôle', [
                'controller' => 'RoleController',
                'method' => 'store',
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $this->sendError('Erreur lors de la création du rôle', ['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Log de la demande de détails
        Log::debug('Récupération des détails d\'un rôle', [
            'controller' => 'RoleController',
            'method' => 'show',
            'role_id' => $id
        ]);

        $role = Role::find($id);

        if (!$role) {
            Log::warning('Rôle non trouvé', [
                'controller' => 'RoleController',
                'method' => 'show',
                'role_id' => $id
            ]);
            return $this->sendError('Rôle non trouvé', [], 404);
        }

        $role->permissions;

        // Log du succès de la récupération
        Log::info('Détails du rôle récupérés', [
            'controller' => 'RoleController',
            'method' => 'show',
            'role_id' => $id,
            'role_name' => $role->name,
            'nombre_permissions' => count($role->permissions)
        ]);

        $success['role'] = $role;

        return $this->sendResponse($success, 'Role');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Log de la tentative de mise à jour
        Log::debug('Tentative de mise à jour d\'un rôle', [
            'controller' => 'RoleController',
            'method' => 'update',
            'role_id' => $id,
            'inputs' => $request->all()
        ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            // Log des erreurs de validation
            Log::warning('Validation échouée lors de la mise à jour d\'un rôle', [
                'controller' => 'RoleController',
                'method' => 'update',
                'errors' => $validator->errors()->toArray()
            ]);

            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        try {
            $role = Role::find($id);

            if (!$role) {
                Log::warning('Tentative de mise à jour d\'un rôle inexistant', [
                    'controller' => 'RoleController',
                    'method' => 'update',
                    'role_id' => $id
                ]);
                return $this->sendError('Rôle non trouvé', [], 404);
            }

            // Log des anciennes valeurs avant mise à jour
            Log::debug('Anciennes valeurs du rôle', [
                'controller' => 'RoleController',
                'method' => 'update',
                'role_id' => $id,
                'old_name' => $role->name
            ]);

            $role->name = $request->input('name');
            $saveRole = $role->save();

            if ($saveRole) {
                // Log du succès de la mise à jour
                Log::info('Rôle mis à jour avec succès', [
                    'controller' => 'RoleController',
                    'method' => 'update',
                    'role_id' => $id,
                    'new_name' => $role->name
                ]);

                $success['role'] = $role;
                return $this->sendResponse($success, "Update Success", 201);
            } else {
                // Log de l'échec de la mise à jour
                Log::warning('Échec de la mise à jour d\'un rôle', [
                    'controller' => 'RoleController',
                    'method' => 'update',
                    'role_id' => $id
                ]);

                return $this->sendError("Erreur de Création.", ['error' => 'Echec de Mise à jour']);
            }
        } catch (\Exception $e) {
            // Log de l'erreur
            Log::error('Erreur lors de la mise à jour d\'un rôle', [
                'controller' => 'RoleController',
                'method' => 'update',
                'role_id' => $id,
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $this->sendError('Erreur lors de la mise à jour du rôle', ['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Log de la tentative de suppression
        Log::debug('Tentative de suppression d\'un rôle', [
            'controller' => 'RoleController',
            'method' => 'destroy',
            'role_id' => $id
        ]);

        try {
            $role = Role::find($id);

            if (!$role) {
                Log::warning('Tentative de suppression d\'un rôle inexistant', [
                    'controller' => 'RoleController',
                    'method' => 'destroy',
                    'role_id' => $id
                ]);
                return $this->sendError('Rôle non trouvé', [], 404);
            }

            // Stockage temporaire pour le log
            $roleName = $role->name;

            $roleDestroy = Role::destroy($id);

            if ($roleDestroy) {
                // Log du succès de la suppression
                Log::info('Rôle supprimé avec succès', [
                    'controller' => 'RoleController',
                    'method' => 'destroy',
                    'role_id' => $id,
                    'role_name' => $roleName
                ]);

                return $this->sendResponse("", "Suppression réussie", 201);
            } else {
                // Log de l'échec de la suppression
                Log::warning('Échec de la suppression d\'un rôle', [
                    'controller' => 'RoleController',
                    'method' => 'destroy',
                    'role_id' => $id
                ]);

                return $this->sendError("Echec de Suppression", ['error' => 'Echec de Suppression'], 400);
            }
        } catch (\Exception $e) {
            // Log de l'erreur
            Log::error('Erreur lors de la suppression d\'un rôle', [
                'controller' => 'RoleController',
                'method' => 'destroy',
                'role_id' => $id,
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $this->sendError('Erreur lors de la suppression du rôle', ['error' => $e->getMessage()], 400);
        }
    }
}
