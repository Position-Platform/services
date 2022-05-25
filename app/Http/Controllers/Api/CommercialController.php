<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Commercial;
use App\Models\User;
use App\Notifications\SendParams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * @authenticated
 * @group Commerciaux management
 *
 * APIs for managing Commerciaux
 */
class CommercialController extends BaseController
{
    /**
     * Get all Commerciaux.
     *
     * @header Content-Type application/json
     * @responseFile storage/responses/getcommercial.json
     */
    public function index()
    {
        $commercials = Commercial::all();

        foreach ($commercials as $key => $commercial) {
            $commercial->user->roles;
        }

        return $this->sendResponse($commercials, 'Liste des Commerciaux');
    }

    /**
     * Add a new Commercial.
     *
     * @header Content-Type application/json
     * @bodyParam name string required the name of the commercial. Example: Gautier
     * @bodyParam email string required the email of the commercial. Example: gautier@position.cm
     * @bodyParam phone int required The phone number of the commercial. Example:699999999
     * @bodyParam imageProfil file Profile Image.
     * @bodyParam numeroCni int required. Example: 1256987
     * @bodyParam numeroBadge int required. Example: 1234568
     * @bodyParam ville string required. Example: Douala
     * @bodyParam quartier string required. Example: Melen
     * @bodyParam sexe string required. Example: Masculin
     * @bodyParam whatsapp int required. Example: 699999999
     * @bodyParam diplome string required. Example: BAC
     * @bodyParam tailleTshirt string required. Example: XXL
     * @bodyParam age int required. Example: 25
     * @responseFile storage/responses/addcommercial.json
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'regex:/^[\+0-9]+$/',
            'imageProfil' => 'mimes:png,jpg,jpeg|max:10000',
            'numeroCni' => 'required',
            'numeroBadge' => 'required',
            'ville' => 'required',
            'quartier' => 'required',
            'sexe' => 'required',
            'whatsapp' => 'required',
            'diplome' => 'required',
            'tailleTshirt' => 'required',
            'age' => 'required',
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
            $fileName = time() . '_' . $request->imageProfil->getClientOriginalName();
            $filePath = $request->file('imageProfil')->storeAs('uploads/commerciaux/profils', $fileName, 'public');
            $input['imageProfil'] = '/storage/' . $filePath;
        }

        try {

            DB::beginTransaction();
            $user = User::create($input);
            $user->assignRole('commercial');



            $user->notify(new SendParams($user->phone, $password));

            $phone = "00237" . $user->phone;

            $sms = $this->sendSms($user, $phone, $password);

            $inputCommercial['numeroCni'] = $request->numeroCni;
            $inputCommercial['numeroBadge'] = $request->numeroBadge;
            $inputCommercial['ville'] = $request->ville;
            $inputCommercial['quartier'] = $request->quartier;
            $inputCommercial['sexe'] = $request->sexe;
            $inputCommercial['whatsapp'] = $request->whatsapp;
            $inputCommercial['diplome'] = $request->diplome;
            $inputCommercial['tailleTshirt'] = $request->tailleTshirt;
            $inputCommercial['age'] = $request->age;

            $commercial = $user->commercial()->create($inputCommercial);

            $commercial->user->roles;

            $commercial["sms"] = $sms;

            DB::commit();


            return $this->sendResponse($commercial, "Création du commercial reussie", 201);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show Commercial by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the commercial. Example: 2
     * @responseFile storage/responses/showcommercial.json
     */
    public function show($id)
    {
        $commercial = Commercial::find($id);
        $commercial->user->roles;

        return $this->sendResponse($commercial, "Commercial");
    }

    /**
     * Update Commercial.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the commercial. Example: 2
     * @bodyParam name string the name of the commercial. Example: Gautier
     * @bodyParam phone int The phone number of the commercial. Example:699999999
     * @bodyParam imageProfil file Profile Image.
     * @bodyParam numeroCni int. Example: 1256987
     * @bodyParam numeroBadge int. Example: 1234568
     * @bodyParam ville string. Example: Douala
     * @bodyParam quartier string. Example: Melen
     * @bodyParam sexe string. Example: Masculin
     * @bodyParam whatsapp int. Example: 699999999
     * @bodyParam diplome string. Example: BAC
     * @bodyParam tailleTshirt string. Example: XXL
     * @bodyParam age int. Example: 25
     * @bodyParam _method string "required if update image(change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updatecommercial.json
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $admin = Admin::where('idUser', $user->id)->first();
        if ($admin || $user->id == $id) {
            $commercial = Commercial::find($id);
            $request->validate([
                'imageProfil' => 'mimes:png,jpg,jpeg|max:10000'
            ]);

            try {
                DB::beginTransaction();
                $userUpdate = User::find($commercial->idUser);
                $userUpdate->name = $request->name ?? $userUpdate->name;
                $userUpdate->phone = $request->phone ?? $userUpdate->phone;

                if ($request->file()) {
                    $fileName = time() . '_' . $request->imageProfil->getClientOriginalName();
                    $filePath = $request->file('imageProfil')->storeAs('uploads/commerciaux/profils', $fileName, 'public');
                    $userUpdate->imageProfil = '/storage/' . $filePath;
                }
                $userUpdate->save();

                $commercial->numeroCni = $request->numeroCni ?? $commercial->numeroCni;
                $commercial->numeroBadge = $request->numeroBadge ?? $commercial->numeroBadge;
                $commercial->ville = $request->ville ?? $commercial->ville;
                $commercial->quartier = $request->quartier ?? $commercial->quartier;
                $commercial->actif = $request->actif ?? $commercial->actif;

                $commercial->sexe = $request->sexe ?? $commercial->sexe;
                $commercial->whatsapp = $request->whatsapp ?? $commercial->whatsapp;
                $commercial->diplome = $request->diplome ?? $commercial->diplome;
                $commercial->tailleTshirt = $request->tailleTshirt ?? $commercial->tailleTshirt;
                $commercial->age = $request->age ?? $commercial->age;

                $commercial->save();
                $commercial->user->roles;

                DB::commit();

                return $this->sendResponse($commercial, "Update Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
            }
        } else {
            return $this->sendError("Pas autorisé.", ['error' => 'Unauthorised']);
        }
    }

    /**
     * Delete commercial account.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the commercial. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $admin = Admin::where('idUser', $user->id)->first();
        if ($admin) {
            $commercial = Commercial::find($id);

            try {
                DB::beginTransaction();
                $commercial->user()->delete();

                $commercial->delete();

                DB::commit();

                return $this->sendResponse("", "Delete Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
            }
        }
    }
}
