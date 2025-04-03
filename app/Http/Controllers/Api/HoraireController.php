<?php

namespace App\Http\Controllers\Api;

use App\Models\Etablissement;
use App\Models\Horaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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
        // Cette méthode n'est pas implémentée mais on logue quand même
        Log::debug('Tentative d\'accès à la méthode index non implémentée', [
            'controller' => 'HoraireController',
            'method' => 'index'
        ]);
    }

    /**
     * Add a new schedule.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam etablissement_id int required the id of the Establishment. Example: 1
     * @bodyParam horaires string required horaire object. Example: [{"jour": "lundi","etablissement_id":1,"plage_horaire":"07:00-12:00;13:00-17:00"}]
     */
    public function store(Request $request)
    {
        // Log du début de la création
        Log::debug('Tentative de création d\'horaires', [
            'controller' => 'HoraireController',
            'method' => 'store',
            'etablissement_id' => $request->etablissement_id,
            'nombre_horaires' => is_array($request->horaires) ? count($request->horaires) : 'format non valide'
        ]);

        $validator = Validator::make($request->all(), [
            'horaires' => 'required',
            'etablissement_id' => 'required|exists:etablissements,id',
        ]);

        $horaires = $request->horaires;

        if ($validator->fails()) {
            // Log des erreurs de validation
            Log::warning('Validation échouée lors de la création d\'horaires', [
                'controller' => 'HoraireController',
                'method' => 'store',
                'errors' => $validator->errors()->toArray()
            ]);

            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        try {
            DB::beginTransaction();

            // Log du début de la transaction
            Log::debug('Début de transaction pour création d\'horaires', [
                'controller' => 'HoraireController',
                'method' => 'store',
                'etablissement_id' => $request->etablissement_id
            ]);

            $etablissement = Etablissement::find($request->etablissement_id);

            foreach ($horaires as $horaire) {
                $nouvelHoraire = $etablissement->horaires()->create($horaire);

                // Log de la création de chaque horaire
                Log::debug('Horaire créé', [
                    'controller' => 'HoraireController',
                    'method' => 'store',
                    'etablissement_id' => $request->etablissement_id,
                    'horaire_id' => $nouvelHoraire->id,
                    'jour' => $horaire['jour'],
                    'plage_horaire' => $horaire['plage_horaire']
                ]);
            }

            DB::commit();

            // Log du succès de la création
            Log::info('Horaires créés avec succès', [
                'controller' => 'HoraireController',
                'method' => 'store',
                'etablissement_id' => $request->etablissement_id,
                'nombre_horaires' => count($horaires)
            ]);

            return $this->sendResponse("", "Création de l'horaire reussie", 201);
        } catch (\Exception $ex) {
            DB::rollBack();

            // Log de l'erreur
            Log::error('Erreur lors de la création d\'horaires', [
                'controller' => 'HoraireController',
                'method' => 'store',
                'etablissement_id' => $request->etablissement_id,
                'exception' => $ex->getMessage(),
                'trace' => $ex->getTraceAsString()
            ]);

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
        // Cette méthode n'est pas implémentée mais on logue quand même
        Log::debug('Tentative d\'accès à la méthode show non implémentée', [
            'controller' => 'A\'HoraireController',
            'method' => 'show',
            'horaire_id' => $horaire->id
        ]);
    }


    /**
     * Update Schedule.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the Schedule. Example: 1
     * @bodyParam plage_horaire string  time slot. Example: 10:00-15:00;16:00-18:00
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     */
    public function update(Request $request, $id)
    {
        // Log de la tentative de mise à jour
        Log::debug('Tentative de mise à jour d\'un horaire', [
            'controller' => 'HoraireController',
            'method' => 'update',
            'horaire_id' => $id,
            'inputs' => $request->all()
        ]);

        Auth::user();
        $horaire = Horaire::find($id);

        if (!$horaire) {
            Log::warning('Tentative de mise à jour d\'un horaire inexistant', [
                'controller' => 'HoraireController',
                'method' => 'update',
                'horaire_id' => $id
            ]);
            return $this->sendError('Horaire non trouvé', [], 404);
        }

        try {
            // Log des anciennes valeurs avant mise à jour
            Log::debug('Anciennes valeurs de l\'horaire', [
                'controller' => 'HoraireController',
                'method' => 'update',
                'horaire_id' => $id,
                'old_values' => [
                    'jour' => $horaire->jour,
                    'plage_horaire' => $horaire->plage_horaire
                ]
            ]);

            $horaire->plage_horaire = $request->plage_horaire ?? $horaire->plage_horaire;
            $horaire->save();

            // Log du succès de la mise à jour
            Log::info('Horaire mis à jour avec succès', [
                'controller' => 'HoraireController',
                'method' => 'update',
                'horaire_id' => $id,
                'new_values' => [
                    'jour' => $horaire->jour,
                    'plage_horaire' => $horaire->plage_horaire
                ],
                'etablissement_id' => $horaire->etablissement_id
            ]);

            $success['horaire'] = $horaire;

            return $this->sendResponse($success, "Update Success", 201);
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error('Erreur lors de la mise à jour d\'un horaire', [
                'controller' => 'HoraireController',
                'method' => 'update',
                'horaire_id' => $id,
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);

            return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
        }
    }

    /**
     * Delete Schedule.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the Schedule. Example: 1
     */
    public function destroy($id)
    {
        // Log de la tentative de suppression
        Log::debug('Tentative de suppression d\'un horaire', [
            'controller' => 'HoraireController',
            'method' => 'destroy',
            'horaire_id' => $id
        ]);

        Auth::user();

        $horaire = Horaire::find($id);

        if (!$horaire) {
            Log::warning('Tentative de suppression d\'un horaire inexistant', [
                'controller' => 'HoraireController',
                'method' => 'destroy',
                'horaire_id' => $id
            ]);
            return $this->sendError('Horaire non trouvé', [], 404);
        }

        // Stockage temporaire pour le log
        $etablissementId = $horaire->etablissement_id;
        $jour = $horaire->jour;

        try {
            Horaire::destroy($id);

            // Log du succès de la suppression
            Log::info('Horaire supprimé avec succès', [
                'controller' => 'HoraireController',
                'method' => 'destroy',
                'horaire_id' => $id,
                'etablissement_id' => $etablissementId,
                'jour' => $jour
            ]);

            return $this->sendResponse("", "Delete Success", 201);
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error('Erreur lors de la suppression d\'un horaire', [
                'controller' => 'HoraireController',
                'method' => 'destroy',
                'horaire_id' => $id,
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);

            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }
}
