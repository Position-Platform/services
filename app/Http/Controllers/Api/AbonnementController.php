<?php

namespace App\Http\Controllers\Api;

use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

/**
 *
 * @group Abonnement management
 *
 * APIs for managing Abonnements
 */
class AbonnementController extends BaseController
{
    /**
     * Get all Subscription.
     *
     * @header Content-Type application/json
     * @responseFile storage/responses/getabonnements.json
     */
    public function index()
    {
        $abonnements = Abonnement::all();

        return $this->sendResponse($abonnements, 'Liste des Abonnements');
    }

    /**
     * Add a new Subscription.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam nom string required the name of the subscription. Example: Smart
     * @bodyParam prix int required the price of the subscription. Example: 5000
     * @bodyParam duree int required duration of the subscription. Example: 1
     * @bodyParam type string Type of subscription(Year by default). Example:year
     * @responseFile storage/responses/addabonnement.json
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'nom' => 'required',
            'prix' => 'required',
            'duree' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input['nom'] = $request->nom;
        $input['prix'] = $request->prix;
        $input['duree'] = $request->duree;
        try {

            DB::beginTransaction();
            $abonnement = Abonnement::create($input);



            DB::commit();

            return $this->sendResponse($abonnement, "Création de l'abonnement reussie", 201);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show Subscription by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the subscription. Example: 2
     * @responseFile storage/responses/showabonnement.json
     */
    public function show($id)
    {
        $abonnement = Abonnement::find($id);

        return $this->sendResponse($abonnement, "Abonnement");
    }

    /**
     * Update Subscription.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the subscription. Example: 2
     * @bodyParam nom string the name of the subscription. Example: Smart
     * @bodyParam prix int the price of the subscription. Example: 5000
     * @bodyParam duree int duration of the subscription. Example: 1
     * @bodyParam type string Type of subscription(Year by default). Example:year
     * @bodyParam _method string "required if update image(change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updateabonnement.json
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $abonnement = Abonnement::find($id);

            $abonnement->nom = $request->nom ?? $abonnement->nom;
            $abonnement->prix = $request->prix ?? $abonnement->prix;
            $abonnement->duree = $request->duree ?? $abonnement->duree;


            $abonnement->save();

            DB::commit();

            return $this->sendResponse($abonnement, "Update Success", 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
        }
    }

    /**
     * Delete subscription.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the subscription. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function destroy($id)
    {
        $abonnement = Abonnement::find($id);

        try {
            DB::beginTransaction();

            $abonnement->delete();

            DB::commit();

            return $this->sendResponse("", "Delete Success", 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }
}
