<?php

namespace App\Http\Controllers\Api;

use App\Models\Commodite;
use App\Models\TypeCommodite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 *
 * @group Commodites management
 *
 * APIs for managing Commodite
 */
class CommoditeController extends BaseController
{
    /**
     * Get all Commodites.
     *
     * @header Content-Type application/json
     * @responseFile storage/responses/getcommodites.json
     */
    public function index()
    {
        $commodites = Commodite::all();

        foreach ($commodites as  $commodite) {
            $commodite->typeCommodite;
        }

        $success['commodites'] = $commodites;

        return $this->sendResponse($success, 'Liste des Commodites');
    }

    /**
     * Add a new Commodite.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam nom string required the name commodite. Example: Achat
     * @bodyParam type_commodite_id int required the id TypeCommodite. Example: 5
     * @responseFile storage/responses/addcommodite.json
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'nom' => 'required',
            'type_commodite_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input['nom'] = $request->nom;
        $typeCommodite = TypeCommodite::find($request->type_commodite_id);


        try {

            $commodite = $typeCommodite->commodites()->create($input);
            $commodite->typeCommodite;


            $success['commodite'] = $commodite;


            return $this->sendResponse($success, "Création de la Commodité reussie", 201);
        } catch (\Exception $ex) {
            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show Commodite by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id commodite. Example: 2
     * @responseFile storage/responses/showcommodite.json
     */
    public function show($id)
    {
        $commodite = Commodite::find($id);

        $commodite->typeCommodite;

        $success['commodite'] = $commodite;


        return $this->sendResponse($success, 'Commodite');
    }

    /**
     * Update Commodite.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id commodite. Example: 2
     * @bodyParam nom string the name commodite. Example: Achat
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updatecommodite.json
     */
    public function update(Request $request, $id)
    {
        $commodite = Commodite::find($id);

        try {

            $commodite->nom = $request->nom ?? $commodite->nom;

            $commodite->typeCommodite;

            $commodite->save();

            $success['commodite'] = $commodite;


            return $this->sendResponse($success, "Update Success", 201);
        } catch (\Throwable $th) {
            return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
        }
    }

    /**
     * Delete Commodite.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id commodite. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function destroy($id)
    {
        $commodite = Commodite::find($id);

        try {

            $commodite->delete();


            return $this->sendResponse("", "Delete Success", 201);
        } catch (\Throwable $th) {
            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }
}
