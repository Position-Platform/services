<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();

        return $this->sendResponse($admins, 'Liste des Admins');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $admin = Admin::where('idUser', $user->id)->first();
        if ($admin->isSuperAdmin == 1) {
            $validator =  Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'phone' => 'regex:/^[\+0-9]+$/',
                'password' => 'string|between:6,20',
                'file' => 'mimes:png,jpg,jpeg|max:10000'
            ]);

            if ($validator->fails()) {
                return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
            }

            $input['name'] = $request->name;
            $input['email'] = $request->email;
            $input['phone'] = $request->phone;
            $input['password'] = bcrypt($request->password);

            if ($request->file()) {
                $fileName = time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads/admins/profils', $fileName, 'public');
                $input['imageProfil'] = '/storage/' . $filePath;
            }



            try {

                DB::beginTransaction();
                $user = User::create($input);
                $user->assignRole('admin');
                $user->sendEmailVerificationNotification();

                $inputAdmin['idUser'] = $user->id;

                $admin = Admin::create($inputAdmin);

                $admin->user;

                DB::commit();

                return $this->sendResponse($admin, "Création de l'admin reussie", 201);
            } catch (\Exception $ex) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
            }
        } else {
            return $this->sendError("Pas autorisé.", ['error' => 'Unauthorised']);
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
        $admin = Admin::find($id);
        $admin->user();

        return $this->sendResponse($admin, "Admin");
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
        $user = Auth::user();
        $admin = Admin::where('idUser', $user->id)->first();
        if ($admin->isSuperAdmin == 1) {
            $admin = Admin::find($id);
            $request->validate([
                'file' => 'mimes:png,jpg,jpeg|max:10000'
            ]);

            try {
                DB::beginTransaction();
                $userUpdate = User::find($admin->idUser);
                $userUpdate->name = $request->name ?? $userUpdate->name;
                $userUpdate->phone = $request->phone ?? $userUpdate->phone;

                if ($request->file()) {
                    $fileName = time() . '_' . $request->file->getClientOriginalName();
                    $filePath = $request->file('file')->storeAs('uploads/commerciaux/profils', $fileName, 'public');
                    $userUpdate->imageProfil = '/storage/' . $filePath;
                }
                $userUpdate->save();



                $admin->isSuperAdmin = $request->isSuperAdmin ?? $admin->isSuperAdmin;
                $admin->save();

                DB::commit();

                return $this->sendResponse($admin, "Update Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
            }
        } else {
            return $this->sendError("Pas autorisé.", ['error' => 'Unauthorised']);
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
        $user = Auth::user();
        $admin = Admin::where('idUser', $user->id)->first();
        if ($admin->isSuperAdmin == 1) {
            $admin = Admin::find($id);

            try {
                DB::beginTransaction();
                User::destroy($admin->idUser);
                Admin::destroy($admin->id);

                DB::commit();

                return $this->sendResponse("", "Delete Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
            }
        }
    }
}
