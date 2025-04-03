<?php

namespace App\Http\Controllers\Api;

use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
     */
    public function index()
    {
        // Log du début de la requête
        Log::debug('Récupération de la liste des abonnements', ['controller' => 'AbonnementController', 'method' => 'index']);

        $abonnements = Abonnement::all();

        // Log du nombre d'abonnements récupérés
        Log::info('Liste des abonnements récupérée', [
            'controller' => 'AbonnementController',
            'method' => 'index',
            'count' => count($abonnements)
        ]);

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
     */
    public function store(Request $request)
    {
        // Log du début de la création
        Log::debug('Tentative de création d\'un abonnement', [
            'controller' => 'AbonnementController',
            'method' => 'store',
            'inputs' => $request->all()
        ]);

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prix' => 'required',
            'duree' => 'required',
        ]);

        if ($validator->fails()) {
            // Log des erreurs de validation
            Log::warning('Validation échouée lors de la création d\'un abonnement', [
                'controller' => 'AbonnementController',
                'method' => 'store',
                'errors' => $validator->errors()->toArray()
            ]);

            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input['nom'] = $request->nom;
        $input['prix'] = $request->prix;
        $input['duree'] = $request->duree;
        try {
            $abonnement = Abonnement::create($input);

            // Log du succès de la création
            Log::info('Abonnement créé avec succès', [
                'controller' => 'AbonnementController',
                'method' => 'store',
                'abonnement_id' => $abonnement->id,
                'abonnement_nom' => $abonnement->nom
            ]);

            $success['abonnement'] = $abonnement;

            return $this->sendResponse($success, "Création de l'abonnement reussie", 201);
        } catch (\Exception $ex) {
            // Log de l'erreur
            Log::error('Erreur lors de la création d\'un abonnement', [
                'controller' => 'AbonnementController',
                'method' => 'store',
                'exception' => $ex->getMessage(),
                'trace' => $ex->getTraceAsString()
            ]);

            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show Subscription by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the subscription. Example: 1
     */
    public function show($id)
    {
        // Log de la demande de détails
        Log::debug('Récupération des détails d\'un abonnement', [
            'controller' => 'AbonnementController',
            'method' => 'show',
            'abonnement_id' => $id
        ]);

        $abonnement = Abonnement::find($id);

        // Log du résultat de la recherche
        if ($abonnement) {
            Log::info('Détails de l\'abonnement récupérés', [
                'controller' => 'AbonnementController',
                'method' => 'show',
                'abonnement_id' => $id,
                'abonnement_nom' => $abonnement->nom
            ]);
        } else {
            Log::warning('Abonnement non trouvé', [
                'controller' => 'AbonnementController',
                'method' => 'show',
                'abonnement_id' => $id
            ]);
        }

        $success['abonnement'] = $abonnement;

        return $this->sendResponse($success, "Abonnement");
    }

    /**
     * Update Subscription.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the subscription. Example: 1
     * @bodyParam nom string the name of the subscription. Example: Smart
     * @bodyParam prix int the price of the subscription. Example: 5000
     * @bodyParam duree int duration of the subscription. Example: 1
     * @bodyParam type string Type of subscription(Year by default). Example:year
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     */
    public function update(Request $request, $id)
    {
        // Log de la tentative de mise à jour
        Log::debug('Tentative de mise à jour d\'un abonnement', [
            'controller' => 'AbonnementController',
            'method' => 'update',
            'abonnement_id' => $id,
            'inputs' => $request->all()
        ]);

        try {
            $abonnement = Abonnement::find($id);

            if (!$abonnement) {
                Log::warning('Tentative de mise à jour d\'un abonnement inexistant', [
                    'controller' => 'AbonnementController',
                    'method' => 'update',
                    'abonnement_id' => $id
                ]);
                return $this->sendError('Abonnement non trouvé', [], 404);
            }

            // Log des anciennes valeurs avant mise à jour
            Log::debug('Anciennes valeurs de l\'abonnement', [
                'controller' => 'AbonnementController',
                'method' => 'update',
                'abonnement_id' => $id,
                'old_values' => [
                    'nom' => $abonnement->nom,
                    'prix' => $abonnement->prix,
                    'duree' => $abonnement->duree
                ]
            ]);

            $abonnement->nom = $request->nom ?? $abonnement->nom;
            $abonnement->prix = $request->prix ?? $abonnement->prix;
            $abonnement->duree = $request->duree ?? $abonnement->duree;

            $abonnement->save();

            // Log du succès de la mise à jour
            Log::info('Abonnement mis à jour avec succès', [
                'controller' => 'AbonnementController',
                'method' => 'update',
                'abonnement_id' => $id,
                'new_values' => [
                    'nom' => $abonnement->nom,
                    'prix' => $abonnement->prix,
                    'duree' => $abonnement->duree
                ]
            ]);

            $success['abonnement'] = $abonnement;

            return $this->sendResponse($success, "Update Success", 201);
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error('Erreur lors de la mise à jour d\'un abonnement', [
                'controller' => 'AbonnementController',
                'method' => 'update',
                'abonnement_id' => $id,
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);

            return $this->sendError('Echec de mise à jour', ['error' => $th->getMessage()], 400);
        }
    }

    /**
     * Delete subscription.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the subscription. Example: 1
     */
    public function destroy($id)
    {
        // Log de la tentative de suppression
        Log::debug('Tentative de suppression d\'un abonnement', [
            'controller' => 'AbonnementController',
            'method' => 'destroy',
            'abonnement_id' => $id
        ]);

        $abonnement = Abonnement::find($id);

        if (!$abonnement) {
            Log::warning('Tentative de suppression d\'un abonnement inexistant', [
                'controller' => 'AbonnementController',
                'method' => 'destroy',
                'abonnement_id' => $id
            ]);
            return $this->sendError('Abonnement non trouvé', [], 404);
        }

        try {
            $abonnement->delete();

            // Log du succès de la suppression
            Log::info('Abonnement supprimé avec succès', [
                'controller' => 'AbonnementController',
                'method' => 'destroy',
                'abonnement_id' => $id,
                'abonnement_nom' => $abonnement->nom
            ]);

            return $this->sendResponse("", "Delete Success", 200);
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error('Erreur lors de la suppression d\'un abonnement', [
                'controller' => 'AbonnementController',
                'method' => 'destroy',
                'abonnement_id' => $id,
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);

            return $this->sendError('Erreur de suppression.', ['error' => $th->getMessage()], 400);
        }
    }
}
