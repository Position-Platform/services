<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Batiment;
use App\Models\Commodite;
use App\Models\SousCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 *
 * @group Building management
 * @authenticated
 *
 * APIs for managing Building
 */
class BatimentController extends BaseController
{
    /**
     * Get all Building.
     *
     * @header Content-Type application/json
     * @queryParam user_id string id of user conncted . Example: 1
     */
    public function index(Request $request)
    {
        // Log du début de la requête
        Log::debug('Récupération de la liste des bâtiments', [
            'controller' => 'BatimentController',
            'method' => 'index',
            'user_id' => $request->user_id
        ]);

        $batiments = Batiment::all();

        foreach ($batiments as $batiment) {
            $batiment->etablissements;
            foreach ($batiment->etablissements as $etablissement) {

                if ($request->user_id) {
                    $etablissement->isFavoris = $this->checkIfEtablissementInFavoris($etablissement->id, $request->user_id);
                } else {
                    $etablissement->isFavoris = false;
                }
                $isOpen = $this->checkIfEtablissementIsOpen($etablissement->id);

                $etablissement->isopen = $isOpen;


                $moyenne = $this->getMoyenneRatingByEtablissmeent($etablissement->id);

                $etablissement->moyenne = $moyenne;

                $etablissement->avis = $this->getCommentNumberByEtablissmeent($etablissement->id);

                $etablissement->count = $this->countOccurenceRatingInCommentTableByEtablissement($etablissement->id);


                $etablissement->user->abonnement;

                //  $etablissement['sousCategories'] = $etablissement->sousCategories;
                $etablissement->commodites;
                foreach ($etablissement->sousCategories as $sousCategories) {
                    $sousCategories->categorie;
                }

                $etablissement->horaires;
                $etablissement->images;
                //  $etablissement->commentaires;

                foreach ($etablissement->commentaires as $commentaires) {
                    $commentaires->user;
                }
            }
        }

        // Log du nombre de bâtiments récupérés
        Log::info('Liste des bâtiments récupérée', [
            'controller' => 'BatimentController',
            'method' => 'index',
            'count' => count($batiments)
        ]);

        $success['batiments'] = $batiments;

        return $this->sendResponse($success, 'Liste des Batiments');
    }

    /**
     * Add a new Building.
     *
     * @header Content-Type application/json
     * @bodyParam nom string  the name of the Building. Example: Sogefi
     * @bodyParam nombre_niveau int required the number of levels in the building. Example: 3
     * @bodyParam code string required the building code. Example: BATIMENT_MELEN_0569
     * @bodyParam longitude string required.
     * @bodyParam latitude string required.
     * @bodyParam image file required Building Image.
     * @bodyParam indication string indication of the location of the building. Example: Rue de melen
     * @bodyParam rue string. Example: Rue de Melen
     * @bodyParam ville string required. Example: Douala
     * @bodyParam quartier string required. Example: Melen
     * @bodyParam commune string required. Example: Yaounde IV
     */
    public function store(Request $request)
    {
        // Log du début de la création
        Log::debug('Tentative de création d\'un bâtiment', [
            'controller' => 'BatimentController',
            'method' => 'store',
            'inputs' => $request->except('image')
        ]);

        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'nombre_niveau' => 'required',
            'code' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'ville' => 'required',
            'commune' => 'required',
            'quartier' => 'required',
        ]);

        if ($validator->fails()) {
            // Log des erreurs de validation
            Log::warning('Validation échouée lors de la création d\'un bâtiment', [
                'controller' => 'BatimentController',
                'method' => 'store',
                'errors' => $validator->errors()->toArray(),
                'user_id' => $user->id
            ]);

            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input['nom'] = $request->nom;
        $input['nombre_niveau'] = $request->nombre_niveau;
        $input['code'] = $request->code;
        $input['longitude'] = $request->longitude;
        $input['latitude'] = $request->latitude;
        $input['indication'] = $request->indication;
        $input['rue'] = $request->rue;
        $input['ville'] = $request->ville;
        $input['commune'] = $request->commune;
        $input['quartier'] = $request->quartier;


        if ($request->file()) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads/batiments/images/' . $request->code, $fileName, 'public');
            $input['image'] = '/storage/' . $filePath;

            // Log de l'upload de fichier
            Log::debug('Image uploadée pour nouveau bâtiment', [
                'controller' => 'BatimentController',
                'method' => 'store',
                'filename' => $fileName,
                'path' => $filePath,
                'code' => $request->code
            ]);
        }

        try {
            $batiment = $user->batiments()->create($input);

            // Log du succès de la création
            Log::info('Bâtiment créé avec succès', [
                'controller' => 'BatimentController',
                'method' => 'store',
                'batiment_id' => $batiment->id,
                'batiment_code' => $batiment->code,
                'user_id' => $user->id
            ]);

            $success['batiment'] = $batiment;

            return $this->sendResponse($success, "Création du batiment reussie", 201);
        } catch (\Exception $ex) {
            // Log de l'erreur
            Log::error('Erreur lors de la création d\'un bâtiment', [
                'controller' => 'BatimentController',
                'method' => 'store',
                'exception' => $ex->getMessage(),
                'trace' => $ex->getTraceAsString(),
                'user_id' => $user->id
            ]);

            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show Building by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the building. Example: 3
     * @queryParam user_id string id of user conncted . Example: 1
     */
    public function show($id, Request $request)
    {
        // Log de la demande de détails
        Log::debug('Récupération des détails d\'un bâtiment', [
            'controller' => 'BatimentController',
            'method' => 'show',
            'batiment_id' => $id,
            'user_id' => $request->user_id
        ]);

        $batiment = Batiment::find($id);

        if (!$batiment) {
            Log::warning('Bâtiment non trouvé', [
                'controller' => 'BatimentController',
                'method' => 'show',
                'batiment_id' => $id
            ]);
            return $this->sendError('Bâtiment non trouvé', [], 404);
        }

        $batiment->etablissements;


        foreach ($batiment->etablissements as $etablissement) {


            if ($request->user_id) {
                $etablissement->isFavoris = $this->checkIfEtablissementInFavoris($etablissement->id, $request->user_id);
            } else {
                $etablissement->isFavoris = false;
            }


            $isOpen = $this->checkIfEtablissementIsOpen($etablissement->id);

            $etablissement->isopen = $isOpen;


            $moyenne = $this->getMoyenneRatingByEtablissmeent($etablissement->id);

            $etablissement->moyenne = $moyenne;

            $etablissement->avis = $this->getCommentNumberByEtablissmeent($etablissement->id);

            $etablissement->count = $this->countOccurenceRatingInCommentTableByEtablissement($etablissement->id);

            $etablissement->user->abonnement;


            // $etablissement['sousCategories'] = $etablissement->sousCategories;
            $etablissement->commodites;
            foreach ($etablissement->sousCategories as  $sousCategories) {
                $sousCategories->categorie;
            }

            $etablissement->horaires;
            $etablissement->images;
            $etablissement->commentaires;

            foreach ($etablissement->commentaires as  $commentaires) {
                $commentaires->user;
            }
        }

        // Log du succès de la récupération
        Log::info('Détails du bâtiment récupérés', [
            'controller' => 'BatimentController',
            'method' => 'show',
            'batiment_id' => $id,
            'batiment_code' => $batiment->code,
            'nombre_etablissements' => count($batiment->etablissements)
        ]);

        $success['batiment'] = $batiment;

        return $this->sendResponse($success, "Batiment");
    }

    /**
     * Update Building.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the building. Example: 3
     * @bodyParam nom string  the name of the Building. Example: Sogefi
     * @bodyParam nombre_niveau int the number of levels in the building. Example: 3
     * @bodyParam longitude string.
     * @bodyParam latitude string.
     * @bodyParam image file Building Image.
     * @bodyParam indication string indication of the location of the building. Example: Rue de melen
     * @bodyParam rue string. Example: Rue de Melen
     * @bodyParam ville string. Example: Douala
     * @bodyParam quartier string. Example: Melen
     * @bodyParam commune string. Example: Yaounde IV
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     */
    public function update(Request $request, $id)
    {
        // Log de la tentative de mise à jour
        Log::debug('Tentative de mise à jour d\'un bâtiment', [
            'controller' => 'BatimentController',
            'method' => 'update',
            'batiment_id' => $id,
            'inputs' => $request->except('image')
        ]);

        $batiment = Batiment::find($id);

        if (!$batiment) {
            Log::warning('Tentative de mise à jour d\'un bâtiment inexistant', [
                'controller' => 'BatimentController',
                'method' => 'update',
                'batiment_id' => $id
            ]);
            return $this->sendError('Bâtiment non trouvé', [], 404);
        }

        try {
            // Log des anciennes valeurs avant mise à jour
            Log::debug('Anciennes valeurs du bâtiment', [
                'controller' => 'BatimentController',
                'method' => 'update',
                'batiment_id' => $id,
                'old_values' => [
                    'nom' => $batiment->nom,
                    'nombre_niveau' => $batiment->nombre_niveau,
                    'longitude' => $batiment->longitude,
                    'latitude' => $batiment->latitude,
                    'ville' => $batiment->ville,
                    'quartier' => $batiment->quartier,
                    'commune' => $batiment->commune
                ]
            ]);

            $batiment->nom = $request->nom ?? $batiment->nom;
            $batiment->nombre_niveau = $request->nombre_niveau ?? $batiment->nombre_niveau;
            $batiment->longitude = $request->longitude ?? $batiment->longitude;
            $batiment->latitude = $request->latitude ?? $batiment->latitude;
            $batiment->indication = $request->indication ?? $batiment->indication;
            $batiment->rue = $request->rue ?? $batiment->rue;
            $batiment->ville = $request->ville ?? $batiment->ville;
            $batiment->commune = $request->commune ?? $batiment->commune;
            $batiment->quartier = $request->quartier ?? $batiment->quartier;

            if ($request->file()) {
                $fileName = time() . '_' . $request->image->getClientOriginalName();
                $filePath = $request->file('image')->storeAs('uploads/batiments/images/' . $batiment->code, $fileName, 'public');
                $batiment->image = '/storage/' . $filePath;

                // Log de l'upload de fichier
                Log::debug('Image mise à jour pour bâtiment', [
                    'controller' => 'BatimentController',
                    'method' => 'update',
                    'batiment_id' => $id,
                    'filename' => $fileName,
                    'path' => $filePath,
                    'code' => $batiment->code
                ]);
            }


            $batiment->save();

            // Log du succès de la mise à jour
            Log::info('Bâtiment mis à jour avec succès', [
                'controller' => 'BatimentController',
                'method' => 'update',
                'batiment_id' => $id,
                'new_values' => [
                    'nom' => $batiment->nom,
                    'nombre_niveau' => $batiment->nombre_niveau,
                    'longitude' => $batiment->longitude,
                    'latitude' => $batiment->latitude,
                    'ville' => $batiment->ville,
                    'quartier' => $batiment->quartier,
                    'commune' => $batiment->commune
                ]
            ]);

            $success['batiment'] = $batiment;

            return $this->sendResponse($success, "Update Success", 201);
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error('Erreur lors de la mise à jour d\'un bâtiment', [
                'controller' => 'BatimentController',
                'method' => 'update',
                'batiment_id' => $id,
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);

            return $this->sendError('Erreur.', ['error' => $th->getMessage()], 400);
        }
    }

    /**
     * Delete Building.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the building. Example: 1
     */
    public function destroy($id)
    {
        // Log de la tentative de suppression
        Log::debug('Tentative de suppression d\'un bâtiment', [
            'controller' => 'BatimentController',
            'method' => 'destroy',
            'batiment_id' => $id
        ]);

        $user = Auth::user();
        $batiment = Batiment::find($id);

        if (!$batiment) {
            Log::warning('Tentative de suppression d\'un bâtiment inexistant', [
                'controller' => 'BatimentController',
                'method' => 'destroy',
                'batiment_id' => $id
            ]);
            return $this->sendError('Bâtiment non trouvé', [], 404);
        }

        $admin = Admin::where('user_id', $user->id)->first();

        if ($admin || $user->id == $batiment->user_id) {
            try {
                DB::beginTransaction();

                // Log du début de la transaction
                Log::debug('Début de transaction pour suppression de bâtiment', [
                    'controller' => 'BatimentController',
                    'method' => 'destroy',
                    'batiment_id' => $id,
                    'nombre_etablissements' => count($batiment->etablissements)
                ]);

                foreach ($batiment->etablissements as $etablissement) {
                    $etablissement->images()->delete();
                    $etablissement->horaires()->delete();
                    $etablissement->commentaires()->delete();

                    foreach ($etablissement->sousCategories as $sousCategorie) {
                        $etablissement->sousCategories()->detach($sousCategorie->id);
                    }

                    foreach ($etablissement->commodites as $commodite) {
                        $etablissement->commodites()->detach($commodite->id);
                    }
                }

                $batiment->etablissements()->delete();
                $batiment->delete();

                DB::commit();

                // Log du succès de la suppression
                Log::info('Bâtiment supprimé avec succès', [
                    'controller' => 'BatimentController',
                    'method' => 'destroy',
                    'batiment_id' => $id,
                    'batiment_code' => $batiment->code,
                    'user_id' => $user->id
                ]);

                return $this->sendResponse("", "Delete Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();

                // Log de l'erreur
                Log::error('Erreur lors de la suppression d\'un bâtiment', [
                    'controller' => 'BatimentController',
                    'method' => 'destroy',
                    'batiment_id' => $id,
                    'exception' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ]);

                return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
            }
        } else {
            // Log de l'accès non autorisé
            Log::warning('Tentative non autorisée de suppression d\'un bâtiment', [
                'controller' => 'BatimentController',
                'method' => 'destroy',
                'batiment_id' => $id,
                'user_id' => $user->id,
                'batiment_owner_id' => $batiment->user_id
            ]);

            return $this->sendError('Non autorisé à supprimer ce bâtiment', [], 403);
        }
    }

    /**
     * Add Complet Batiment Process.
     *
     * @header Content-Type application/json
     * @bodyParam batiment String required. Example : {"nom": "BOUTIQUE DE MICAL","nombre_niveau": "3","code": "BATIMENT_1013434286","longitude": "11.229207","latitude": "4.078288","indication": "derrierre station","rue": "Rue de la Mairie","ville": "Douala","commune": "Douala 3","quartier": "Nyalla","user_id": 1,"etablissement": {"id": 1,"nom": "BOUTIQUE DE MICAL","indication_adresse": "Face station","code_postal": "BP 4326 Douala", "site_internet": "www.site.com","user_id": "1","etage": "1","phone": "699999999","whatsapp1": "699999999","whatsapp2": "699999998","description": "bel etablissement","nom_manager": "Mical","contact_manager": "Mical","commodites": "Wifi","services": "OM;MOMO","ameliorations": "Ajouter des videos","idSousCategorie": "1","horaires": [{"jour": "lundi","plage_horaire": "07:00-12:00;14:00-17:00"}]}}
     */
    public function addCompletBatiment(Request $request)
    {
        // Log du début de la création complète
        Log::debug('Tentative de création complète d\'un bâtiment avec établissement', [
            'controller' => 'BatimentController',
            'method' => 'addCompletBatiment',
            'inputs' => $request->except('batiment.etablissement.commodites', 'batiment.etablissement.services')
        ]);

        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'batiment' => 'required',
        ]);

        if ($validator->fails()) {
            // Log des erreurs de validation
            Log::warning('Validation échouée lors de la création complète d\'un bâtiment', [
                'controller' => 'BatimentController',
                'method' => 'addCompletBatiment',
                'errors' => $validator->errors()->toArray(),
                'user_id' => $user->id
            ]);

            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $batiment = $request->batiment;

        try {
            DB::beginTransaction();

            // Log du début de la transaction
            Log::debug('Début de transaction pour création complète de bâtiment', [
                'controller' => 'BatimentController',
                'method' => 'addCompletBatiment',
                'code' => $batiment['code'],
                'user_id' => $user->id
            ]);

            $bati = Batiment::create([
                'nom' => $batiment['nom'],
                'nombre_niveau' => $batiment['nombre_niveau'],
                'longitude' => $batiment['longitude'],
                'latitude' => $batiment['latitude'],
                'indication' => $batiment['indication'],
                'rue' => $batiment['rue'],
                'ville' => $batiment['ville'],
                'commune' => $batiment['commune'],
                'quartier' => $batiment['quartier'],
                'code' => $batiment['code'],
                'user_id' => $user->id,
            ]);

            $etablissement = $batiment['etablissement'];
            $etablissement['user_id'] = $user->id;

            $etabli = $bati->etablissements()->create($etablissement);

            if ($etablissement['idSousCategorie'] != null) {
                $idSousCategories = explode(",", $etablissement['idSousCategorie']);
                $sousCategories = SousCategorie::find($idSousCategories);
                $etabli->sousCategories()->attach($sousCategories);

                // Log de l'attachement des sous-catégories
                Log::debug('Sous-catégories attachées à l\'établissement', [
                    'controller' => 'BatimentController',
                    'method' => 'addCompletBatiment',
                    'etablissement_id' => $etabli->id,
                    'sous_categories' => $idSousCategories
                ]);
            }

            $horaires = $etablissement['horaires'];

            foreach ($horaires as $horaire) {
                $etabli->horaires()->create($horaire);
            }

            // Log de la création des horaires
            Log::debug('Horaires créés pour l\'établissement', [
                'controller' => 'BatimentController',
                'method' => 'addCompletBatiment',
                'etablissement_id' => $etabli->id,
                'nombre_horaires' => count($horaires)
            ]);

            $bati['etablissement'] = $etabli;

            DB::commit();

            // Log du succès de la création complète
            Log::info('Création complète de bâtiment avec établissement réussie', [
                'controller' => 'BatimentController',
                'method' => 'addCompletBatiment',
                'batiment_id' => $bati->id,
                'batiment_code' => $bati->code,
                'etablissement_id' => $etabli->id,
                'user_id' => $user->id
            ]);

            $success['batiment'] = $bati;

            return $this->sendResponse($success, "Création des batiments reussie", 201);
        } catch (\Exception $th) {
            DB::rollBack();

            // Log de l'erreur
            Log::error('Erreur lors de la création complète d\'un bâtiment', [
                'controller' => 'BatimentController',
                'method' => 'addCompletBatiment',
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
                'user_id' => $user->id
            ]);

            return $this->sendError('Erreur.', ['error' => $th->getMessage()], 400);
        }
    }
}
