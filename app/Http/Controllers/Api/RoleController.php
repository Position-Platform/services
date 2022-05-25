<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Validator;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        foreach ($roles as $key => $role) {
            $role->permissions;
        }

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
        $validator =  Validator::make($request->all(), [
            'name' => 'required|unique:roles,name'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $role = Role::create(['name' => $request->input('name')]);

        return $this->sendResponse($role, 'Création du Role reussie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $role->permissions;

        return $this->sendResponse($role, 'Role');
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

        $role = Role::find($id);
        $role->name = $request->input('name');
        $saveRole = $role->save();

        if ($saveRole) {
            return $this->sendResponse($role, "Update Success", 201);
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
        $roleDestroy = Role::destroy($id);


        if ($roleDestroy) {
            return $this->sendResponse("", "Suppression réussie", 201);
        } else {
            return $this->sendError("Echec de Suppression", ['error' => 'Echec de Suppression'], 400);
        }
    }
}
