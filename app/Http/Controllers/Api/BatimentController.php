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
        $batiments = Batiment::all();

        foreach ($batiments as $batiment) {
            $batiment->etablissements;
            foreach ($batiment->etablissements as  $etablissement) {

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

                $etablissement['sousCategories'] = $etablissement->sousCategories;
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
        }

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
        $user = Auth::user();
        $validator =  Validator::make($request->all(), [
            'nombre_niveau' => 'required',
            'code' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'ville' => 'required',
            'commune' => 'required',
            'quartier' => 'required',
        ]);

        if ($validator->fails()) {
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
        }

        try {
            $batiment = $user->batiments()->create($input);


            $success['batiment'] = $batiment;

            return $this->sendResponse($success, "Création du batiment reussie", 201);
        } catch (\Exception $ex) {
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
        $batiment = Batiment::find($id);

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


            $etablissement['sousCategories'] = $etablissement->sousCategories;
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
        $batiment = Batiment::find($id);


        try {
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
            }


            $batiment->save();

            $success['batiment'] = $batiment;

            return $this->sendResponse($success, "Update Success", 201);
        } catch (\Throwable $th) {
            return $this->sendError('Erreur.', ['error' => $th->getMessage()], 400);
        }
    }

    /**
     * Delete Building.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the building. Example: 3
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $batiment = Batiment::find($id);
        $admin = Admin::where('user_id', $user->id)->first();

        if ($admin || $user->id == $batiment->user_id) {

            try {
                DB::beginTransaction();


                foreach ($batiment->etablissements as  $etablissement) {
                    $etablissement->images()->delete();
                    $etablissement->horaires()->delete();
                    $etablissement->commentaires()->delete();

                    foreach ($etablissement->sousCategories as  $sousCategorie) {
                        $etablissement->sousCategories()->detach($sousCategorie->id);
                    }

                    foreach ($etablissement->commodites as  $commodite) {
                        $etablissement->commodites()->detach($commodite->id);
                    }
                }

                $batiment->etablissements()->delete();

                $batiment->delete();

                DB::commit();

                return $this->sendResponse("", "Delete Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
            }
        }
    }

    public function addCompletBatiment(Request $request)
    {
        $user = Auth::user();
        $validator =  Validator::make($request->all(), [
            'batiment' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $batiment = $request->batiment;

        try {
            DB::beginTransaction();

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
            }



            $horaires = $etablissement['horaires'];

            foreach ($horaires as  $horaire) {
                $etabli->horaires()->create($horaire);
            }

            $bati['etablissement'] = $etabli;

            DB::commit();

            $success['batiment'] = $bati;

            return $this->sendResponse($success, "Création des batiments reussie", 201);
        } catch (\Exception $th) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => $th->getMessage()], 400);
        }
    }
}
