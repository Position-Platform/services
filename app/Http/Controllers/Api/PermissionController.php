<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Validator;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Log du début de la requête
        Log::debug('Récupération de la liste des permissions', [
            'controller' => 'PermissionController',
            'method' => 'index'
        ]);

        $permissions = Permission::all();

        // Log du nombre de permissions récupérées
        Log::info('Liste des permissions récupérée', [
            'controller' => 'PermissionController',
            'method' => 'index',
            'count' => count($permissions)
        ]);

        $success['permissions'] = $permissions;

        return $this->sendResponse($success, 'Liste des Permissions');
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
        Log::debug('Tentative de création d\'une permission', [
            'controller' => 'PermissionController',
            'method' => 'store',
            'inputs' => $request->all()
        ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name'
        ]);

        if ($validator->fails()) {
            // Log des erreurs de validation
            Log::warning('Validation échouée lors de la création d\'une permission', [
                'controller' => 'PermissionController',
                'method' => 'store',
                'errors' => $validator->errors()->toArray()
            ]);

            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        try {
            $permission = Permission::create(['name' => $request->input('name')]);

            // Log du succès de la création
            Log::info('Permission créée avec succès', [
                'controller' => 'PermissionController',
                'method' => 'store',
                'permission_id' => $permission->id,
                'permission_name' => $permission->name
            ]);

            $success['permission'] = $permission;

            return $this->sendResponse($success, 'Création de la Permission reussie');
        } catch (\Exception $e) {
            // Log de l'erreur
            Log::error('Erreur lors de la création d\'une permission', [
                'controller' => 'PermissionController',
                'method' => 'store',
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $this->sendError('Erreur lors de la création de la permission', ['error' => $e->getMessage()], 400);
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
        Log::debug('Récupération des détails d\'une permission', [
            'controller' => 'PermissionController',
            'method' => 'show',
            'permission_id' => $id
        ]);

        $permission = Permission::find($id);

        if (!$permission) {
            Log::warning('Permission non trouvée', [
                'controller' => 'PermissionController',
                'method' => 'show',
                'permission_id' => $id
            ]);
            return $this->sendError('Permission non trouvée', [], 404);
        }

        // Log du succès de la récupération
        Log::info('Détails de la permission récupérés', [
            'controller' => 'PermissionController',
            'method' => 'show',
            'permission_id' => $id,
            'permission_name' => $permission->name
        ]);

        $success['permission'] = $permission;

        return $this->sendResponse($success, 'Permission');
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
        Log::debug('Tentative de mise à jour d\'une permission', [
            'controller' => 'PermissionController',
            'method' => 'update',
            'permission_id' => $id,
            'inputs' => $request->all()
        ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            // Log des erreurs de validation
            Log::warning('Validation échouée lors de la mise à jour d\'une permission', [
                'controller' => 'PermissionController',
                'method' => 'update',
                'errors' => $validator->errors()->toArray()
            ]);

            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        try {
            $permission = Permission::find($id);

            if (!$permission) {
                Log::warning('Tentative de mise à jour d\'une permission inexistante', [
                    'controller' => 'PermissionController',
                    'method' => 'update',
                    'permission_id' => $id
                ]);
                return $this->sendError('Permission non trouvée', [], 404);
            }

            // Log des anciennes valeurs avant mise à jour
            Log::debug('Anciennes valeurs de la permission', [
                'controller' => 'PermissionController',
                'method' => 'update',
                'permission_id' => $id,
                'old_name' => $permission->name
            ]);

            $permission->name = $request->input('name');
            $savePermission = $permission->save();

            if ($savePermission) {
                // Log du succès de la mise à jour
                Log::info('Permission mise à jour avec succès', [
                    'controller' => 'PermissionController',
                    'method' => 'update',
                    'permission_id' => $id,
                    'new_name' => $permission->name
                ]);

                $success['permission'] = $permission;
                return $this->sendResponse($success, "Update Success", 201);
            } else {
                // Log de l'échec de la mise à jour
                Log::warning('Échec de la mise à jour d\'une permission', [
                    'controller' => 'PermissionController',
                    'method' => 'update',
                    'permission_id' => $id
                ]);

                return $this->sendError("Erreur de Création.", ['error' => 'Echec de Mise à jour']);
            }
        } catch (\Exception $e) {
            // Log de l'erreur
            Log::error('Erreur lors de la mise à jour d\'une permission', [
                'controller' => 'PermissionController',
                'method' => 'update',
                'permission_id' => $id,
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $this->sendError('Erreur lors de la mise à jour de la permission', ['error' => $e->getMessage()], 400);
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
        Log::debug('Tentative de suppression d\'une permission', [
            'controller' => 'PermissionController',
            'method' => 'destroy',
            'permission_id' => $id
        ]);

        try {
            $permission = Permission::find($id);

            if (!$permission) {
                Log::warning('Tentative de suppression d\'une permission inexistante', [
                    'controller' => 'PermissionController',
                    'method' => 'destroy',
                    'permission_id' => $id
                ]);
                return $this->sendError('Permission non trouvée', [], 404);
            }

            // Stockage temporaire pour le log
            $permissionName = $permission->name;

            $permissionDestroy = Permission::destroy($id);

            if ($permissionDestroy) {
                // Log du succès de la suppression
                Log::info('Permission supprimée avec succès', [
                    'controller' => 'PermissionController',
                    'method' => 'destroy',
                    'permission_id' => $id,
                    'permission_name' => $permissionName
                ]);

                return $this->sendResponse("", "Suppression réussie", 201);
            } else {
                // Log de l'échec de la suppression
                Log::warning('Échec de la suppression d\'une permission', [
                    'controller' => 'PermissionController',
                    'method' => 'destroy',
                    'permission_id' => $id
                ]);

                return $this->sendError("Echec de Suppression", ['error' => 'Echec de Suppression'], 400);
            }
        } catch (\Exception $e) {
            // Log de l'erreur
            Log::error('Erreur lors de la suppression d\'une permission', [
                'controller' => 'PermissionController',
                'method' => 'destroy',
                'permission_id' => $id,
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return $this->sendError('Erreur lors de la suppression de la permission', ['error' => $e->getMessage()], 400);
        }
    }
}
