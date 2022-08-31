<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
     * @responseFile storage/responses/getadmins.json
     */
    public function index()
    {
        $admins = Admin::all();

        foreach ($admins as $admin) {
            $admin->user->roles;
        }

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
     * @bodyParam phone int required The phone number of the admin. Example:699999999
     * @bodyParam image_profil file Profile Image.
     * @responseFile storage/responses/addadmin.json
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $admin = Admin::where('user_id', $user->id)->first();
        if ($admin->isSuperAdmin == 1) {
            $validator =  Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'phone' => 'regex:/^[\+0-9]+$/',
                'password' => 'string|between:6,20',
                'image_profil' => 'mimes:png,jpg,jpeg|max:20000'
            ]);

            if ($validator->fails()) {
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
            }



            try {

                DB::beginTransaction();
                $user = User::create($input);
                $user->assignRole('admin');
                $user->sendEmailVerificationNotification();

                $inputAdmin['user_id'] = $user->id;

                $admin = Admin::create($inputAdmin);

                $admin->user->roles;

                DB::commit();

                $success['admin'] = $admin;

                return $this->sendResponse($success, "Création de l'admin reussie", 201);
            } catch (\Exception $ex) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
            }
        } else {
            return $this->sendError("Pas autorisé.", ['error' => 'Unauthorised']);
        }
    }

    /**
     * Show Admin by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the admin. Example: 2
     * @responseFile storage/responses/showadmin.json
     */
    public function show($id)
    {
        $admin = Admin::find($id);
        $admin->user->roles;

        $success['admin'] = $admin;

        return $this->sendResponse($success, "Admin");
    }

    /**
     * Update admin account.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the admin. Example: 2
     * @bodyParam name string the name of the user. Example: Gautier
     * @bodyParam phone int The phone number of the user. Example:699999999
     * @bodyParam isSuperAdmin bool. Example:true
     * @bodyParam image_profil file Profile Image.
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updateadmin.json
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $admin = Admin::where('user_id', $user->id)->first();
        if ($admin->isSuperAdmin == 1 || $user->id == $id) {
            $admin = Admin::find($id);
            $request->validate([
                'image_profil' => 'mimes:png,jpg,jpeg|max:20000'
            ]);

            try {
                DB::beginTransaction();
                $userUpdate = User::find($admin->user_id);
                $userUpdate->name = $request->name ?? $userUpdate->name;
                $userUpdate->phone = $request->phone ?? $userUpdate->phone;

                if ($request->file()) {
                    $fileName = time() . '_' . $request->image_profil->getClientOriginalName();
                    $filePath = $request->file('image_profil')->storeAs('uploads/admins/profils', $fileName, 'public');
                    $userUpdate->image_profil = '/storage/' . $filePath;
                }
                $userUpdate->save();



                $admin->isSuperAdmin = $request->isSuperAdmin ?? $admin->isSuperAdmin;
                $admin->save();
                $admin->user->roles;

                DB::commit();

                $success['admin'] = $admin;

                return $this->sendResponse($success, "Update Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['Echec de mise à jour' => $th->getMessage()], 400);
            }
        } else {
            return $this->sendError("Pas autorisé.", ['error' => 'Unauthorised']);
        }
    }

    /**
     * Delete admin account.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the admin. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $admin = Admin::where('user_id', $user->id)->first();
        if ($admin->isSuperAdmin == 1 || $user->id == $id) {
            $admin = Admin::find($id);

            try {
                DB::beginTransaction();
                $admin->user()->delete();

                $admin->delete();

                DB::commit();

                return $this->sendResponse("", "Delete Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Echec de suppression.', ['error' => $th->getMessage()], 400);
            }
        }
    }
}
