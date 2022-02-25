<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Manager;
use App\Models\User;
use App\Notifications\SendParams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * @authenticated
 * @group Manager management
 *
 * APIs for managing Managers
 */
class ManagerController extends BaseController
{
    /**
     * Get all Manager.
     *
     * @header Content-Type application/json
     * @responseFile storage/responses/getmanagers.json
     */
    public function index()
    {
        $managers = Manager::all();

        foreach ($managers as $key => $manager) {
            $manager->user->roles;
            $manager->abonnement;
        }

        return $this->sendResponse($managers, 'Liste des Managers');
    }


    /**
     * Add a new Manager.
     *
     * @header Content-Type application/json
     * @bodyParam name string required the name of the manager. Example: Gautier
     * @bodyParam email string required the email of the manager. Example: gautier@position.cm
     * @bodyParam password string required the password of the manager. Example: gautier123
     * @bodyParam phone int required The phone number of the manager. Example:699999999
     * @bodyParam file file Profile Image.
     * @responseFile storage/responses/addmanager.json
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'regex:/^[\+0-9]+$/',
            'file' => 'mimes:png,jpg,jpeg|max:10000',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['phone'] = $request->phone;
        $password = $this->randomString();
        $input['password'] = bcrypt($password);

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads/managers/profils', $fileName, 'public');
            $input['imageProfil'] = '/storage/' . $filePath;
        }

        try {

            DB::beginTransaction();
            $user = User::create($input);
            $user->assignRole('manager');

            $user->notify(new SendParams($user->phone, $password));

            $inputManager['idAbonnement'] = 1;

            $manager = $user->manager()->create($inputManager);

            $manager->user->roles;

            DB::commit();

            return $this->sendResponse($manager, "Création du Manager reussie", 201);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show Manager by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the manager. Example: 2
     * @responseFile storage/responses/showmanager.json
     */
    public function show($id)
    {

        $manager = Manager::find($id);
        $manager->user->roles;
        $manager->abonnement;

        return $this->sendResponse($manager, "Manager");
    }

    /**
     * Update Commercial.
     *
     * @header Content-Type application/json
     * @bodyParam name string the name of the manager. Example: Gautier
     * @bodyParam phone int The phone number of the manager. Example:699999999
     * @bodyParam file file Profile Image.
     * @bodyParam _method string "required if update image(change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updatemanager.json
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $admin = Admin::where('idUser', $user->id)->first();
        if ($admin || $user->id == $id) {
            $manager = Manager::find($id);
            $request->validate([
                'file' => 'mimes:png,jpg,jpeg|max:10000'
            ]);

            try {
                DB::beginTransaction();
                $userUpdate = User::find($manager->idUser);
                $userUpdate->name = $request->name ?? $userUpdate->name;
                $userUpdate->phone = $request->phone ?? $userUpdate->phone;

                if ($request->file()) {
                    $fileName = time() . '_' . $request->file->getClientOriginalName();
                    $filePath = $request->file('file')->storeAs('uploads/managers/profils', $fileName, 'public');
                    $userUpdate->imageProfil = '/storage/' . $filePath;
                }
                $userUpdate->save();

                $manager->idAbonnement = $request->idAbonnement ?? $manager->idAbonnement;

                $manager->save();
                $manager->user->roles;

                DB::commit();

                return $this->sendResponse($manager, "Update Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
            }
        } else {
            return $this->sendError("Pas autorisé.", ['error' => 'Unauthorised']);
        }
    }

    /**
     * Delete manager account.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the manager. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $admin = Admin::where('idUser', $user->id)->first();
        if ($admin) {
            $manager = Manager::find($id);

            try {
                DB::beginTransaction();
                $manager->user()->delete();

                $manager->delete();

                DB::commit();

                return $this->sendResponse("", "Delete Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
            }
        }
    }
}
