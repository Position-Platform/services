<?php

namespace App\Http\Controllers\Api;

use App\Models\TypeCommodite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 *
 * @group TypeCommodite management
 *
 * APIs for managing TypeCommodite
 */
class TypeCommoditeController extends BaseController
{
    /**
     * Get all Type Commodite.
     *
     * @header Content-Type application/json
     * @responseFile storage/responses/gettypecommodites.json
     */
    public function index()
    {
        $typesCommodites = TypeCommodite::all();

        foreach ($typesCommodites as   $typeCommodite) {
            $typeCommodite->commodites;
        }

        return $this->sendResponse($typesCommodites, 'Liste des Types de Commodités');
    }

    /**
     * Add a new Type Commodite.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam nom string required the name of the type commodite. Example: Achat
     * @responseFile storage/responses/addtypecommodite.json
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'nom' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input['nom'] = $request->nom;

        try {

            DB::beginTransaction();
            $typeCommodite = TypeCommodite::create($input);

            DB::commit();

            return $this->sendResponse($typeCommodite, "Création du type de commodité reussie", 201);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show Type Commodite by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the type commodite. Example: 2
     * @responseFile storage/responses/showtypecommodite.json
     */
    public function show($id)
    {
        $typeCommodite = TypeCommodite::find($id);

        $typeCommodite->commodites;

        return $this->sendResponse($typeCommodite, 'Type Commodite');
    }

    /**
     * Update Type Commodite.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the type commodite. Example: 2
     * @bodyParam nom string the name of the type commodite. Example: Achat
     * @bodyParam _method string "required if update image(change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updatetypecommodite.json
     */
    public function update(Request $request, $id)
    {
        $typeCommodite = TypeCommodite::find($id);


        try {
            DB::beginTransaction();

            $typeCommodite->nom = $request->nom ?? $typeCommodite->nom;

            $typeCommodite->commodites;
            $typeCommodite->save();

            DB::commit();

            return $this->sendResponse($typeCommodite, "Update Success", 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
        }
    }

    /**
     * Delete Category.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the type commodite. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function destroy($id)
    {
        $typeCommodite = TypeCommodite::find($id);

        try {
            DB::beginTransaction();

            $typeCommodite->commodites()->delete();

            $typeCommodite->delete();

            DB::commit();

            return $this->sendResponse("", "Delete Success", 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }
}
