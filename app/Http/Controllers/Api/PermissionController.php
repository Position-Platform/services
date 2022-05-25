<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();


        return $this->sendResponse($permissions, 'Liste des Permissions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $permission = Permission::create(['name' => $request->input('name')]);

        return $this->sendResponse($permission, 'Création de la Permission reussie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);

        return $this->sendResponse($permission, 'Permission');
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
        $validator =  Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $savePermission = $permission->save();

        if ($savePermission) {
            return $this->sendResponse($permission, "Update Success", 201);
        } else {
            return $this->sendError("Erreur de Création.", ['error' => 'Echec de Mise à jour']);
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
        $permissionDestroy = Permission::destroy($id);


        if ($permissionDestroy) {
            return $this->sendResponse("", "Suppression réussie", 201);
        } else {
            return $this->sendError("Echec de Suppression", ['error' => 'Echec de Suppression'], 400);
        }
    }
}
