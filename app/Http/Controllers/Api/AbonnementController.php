<?php

namespace App\Http\Controllers\Api;

use App\Models\Abonnement;
use Illuminate\Http\Request;
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

        $success['abonnements'] = $abonnements;

        return $this->sendResponse($success, 'Liste des Abonnements');
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

            $abonnement = Abonnement::create($input);

            $success['abonnement'] = $abonnement;


            return $this->sendResponse($success, "Création de l'abonnement reussie", 201);
        } catch (\Exception $ex) {
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

        $success['abonnement'] = $abonnement;

        return $this->sendResponse($success, "Abonnement");
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
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updateabonnement.json
     */
    public function update(Request $request, $id)
    {
        try {
            $abonnement = Abonnement::find($id);

            $abonnement->nom = $request->nom ?? $abonnement->nom;
            $abonnement->prix = $request->prix ?? $abonnement->prix;
            $abonnement->duree = $request->duree ?? $abonnement->duree;


            $abonnement->save();

            $success['abonnement'] = $abonnement;


            return $this->sendResponse($success, "Update Success", 201);
        } catch (\Throwable $th) {
            return $this->sendError('Echec de mise à jour', ['error' => $th->getMessage()], 400);
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
            $abonnement->delete();
            return $this->sendResponse("", "Delete Success", 200);
        } catch (\Throwable $th) {
            return $this->sendError('Erreur de suppression.', ['error' => $th->getMessage()], 400);
        }
    }
}
