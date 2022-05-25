<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Commercial;
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
     * @bodyParam jour string required  the name of the day. Example: Lundi
     * @bodyParam idEtablissement int required the id of the Establishment. Example: 2
     * @bodyParam plageHoraire string required time slot. Example: 10:00-15:00;16:00-18:00
     * @responseFile storage/responses/addhoraire.json
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $admin = Admin::where('idUser', $user->id)->first();
        $commercial = Commercial::where('idUser', $user->id)->first();

        $validator =  Validator::make($request->all(), [
            'idEtablissement' => 'required',
            'jour' => 'required',
            'plageHoraire' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input['jour'] = $request->jour;
        $input['plageHoraire'] = $request->plageHoraire;

        if ($admin || $commercial) {
            try {


                DB::beginTransaction();

                $etablissement = Etablissement::find($request->idEtablissement);

                $horaire = $etablissement->horaires()->create($input);


                DB::commit();

                return $this->sendResponse($horaire, "Création de l'horaire reussie", 201);
            } catch (\Exception $ex) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
            }
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
     * @bodyParam plageHoraire string  time slot. Example: 10:00-15:00;16:00-18:00
     * @bodyParam _method string "required if update image(change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updatehoraire.json
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $horaire = Horaire::find($id);
        $etablissement = Etablissement::find($horaire->idEtablissement);
        $admin = Admin::where('idUser', $user->id)->first();
        $commercial = Commercial::where('idUser', $user->id)->first();

        if ($admin || $commercial->id == $etablissement->idCommercial) {
            try {
                DB::beginTransaction();


                $horaire->plageHoraire = $request->plageHoraire ?? $horaire->plageHoraire;
                $horaire->save();

                DB::commit();

                return $this->sendResponse($etablissement, "Update Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
            }
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
        $user = Auth::user();
        $horaire = Horaire::find($id);
        $etablissement = Etablissement::find($horaire->idEtablissement);
        $admin = Admin::where('idUser', $user->id)->first();
        $commercial = Commercial::where('idUser', $user->id)->first();

        if ($admin || $commercial->id == $etablissement->idCommercial) {
            try {
                DB::beginTransaction();

                Horaire::destroy($id);

                DB::commit();

                return $this->sendResponse("", "Delete Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
            }
        }
    }
}
