<?php

namespace App\Http\Controllers\Api;

use App\Models\Etablissement;
use App\Models\Horaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 *
 * @group Schedule management
 *
 * APIs for managing Schedule
 */
class HoraireController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Add a new schedule.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam etablissement_id int required the id of the Establishment. Example: 2
     * @bodyParam horaires string required horaire object. Example: [{"jour": "lundi","etablissement_id":1,"plage_horaire":"07:00-12:00;13:00-17:00"}]
     * @responseFile storage/responses/addhoraire.json
     */
    public function store(Request $request)
    {

        $validator =  Validator::make($request->all(), [
            'horaires' => 'required',
            'etablissement_id' => 'required|exists:etablissements,id',
        ]);

        $horaires = $request->horaires;

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        try {


            DB::beginTransaction();

            $etablissement = Etablissement::find($request->etablissement_id);

            foreach ($horaires as  $horaire) {
                $etablissement->horaires()->create($horaire);
            }

            DB::commit();

            return $this->sendResponse("", "Création de l'horaire reussie", 201);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horaire  $horaire
     * @return \Illuminate\Http\Response
     */
    public function show(Horaire $horaire)
    {
        //
    }


    /**
     * Update Schedule.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the Schedule. Example: 2
     * @bodyParam plage_horaire string  time slot. Example: 10:00-15:00;16:00-18:00
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updatehoraire.json
     */
    public function update(Request $request, $id)
    {
        Auth::user();
        $horaire = Horaire::find($id);

        try {


            $horaire->plage_horaire = $request->plage_horaire ?? $horaire->plage_horaire;
            $horaire->save();

            $success['horaire'] = $horaire;


            return $this->sendResponse($success, "Update Success", 201);
        } catch (\Throwable $th) {
            return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
        }
    }

    /**
     * Delete Schedule.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the Schedule. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function destroy($id)
    {
        Auth::user();

        try {

            Horaire::destroy($id);


            return $this->sendResponse("", "Delete Success", 201);
        } catch (\Throwable $th) {
            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }
}
