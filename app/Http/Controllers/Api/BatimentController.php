<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Batiment;
use App\Models\Commercial;
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
     * @responseFile storage/responses/getbatiments.json
     */
    public function index()
    {
        $batiments = Batiment::all();

        foreach ($batiments as $batiment) {
            $batiment->etablissements;


            foreach ($batiment->etablissements as $key => $etablissement) {
                if ($etablissement->manager) {
                    $etablissement->manager->user;
                }

                if ($etablissement->user) {
                    $etablissement->user;
                }

                if ($etablissement->commercial) {
                    $etablissement->commercial->user;
                }

                $etablissement->sousCategories;
                $etablissement->commodites;
                foreach ($etablissement->sousCategories as $key => $sousCategories) {
                    $sousCategories->categorie;
                }

                $etablissement->horaires;
                $etablissement->images;
                $etablissement->commentaires;

                foreach ($etablissement->commentaires as $key => $commentaires) {
                    $commentaires->user;
                }
            }
        }

        return $this->sendResponse($batiments, 'Liste des Batiments');
    }

    /**
     * Add a new Building.
     *
     * @header Content-Type application/json
     * @bodyParam nom string  the name of the Building. Example: Sogefi
     * @bodyParam idCommercial int the id of the commercial. Example: 2
     * @bodyParam nombreNiveau int required the number of levels in the building. Example: 3
     * @bodyParam codeBatiment string required the building code. Example: BATIMENT_MELEN_0569
     * @bodyParam longitude string required.
     * @bodyParam latitude string required.
     * @bodyParam image file required Building Image.
     * @bodyParam indication string indication of the location of the building. Example: Rue de melen
     * @bodyParam rue string. Example: Rue de Melen
     * @bodyParam ville string required. Example: Douala
     * @bodyParam quartier string required. Example: Melen
     * @bodyParam commune string required. Example: Yaounde IV
     * @responseFile storage/responses/addbatiment.json
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validator =  Validator::make($request->all(), [
            'nombreNiveau' => 'required',
            'codeBatiment' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'ville' => 'required',
            'commune' => 'required',
            'quartier' => 'required',
            'idCommercial' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:20000'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input['nom'] = $request->nom;
        $input['nombreNiveau'] = $request->nombreNiveau;
        $input['codeBatiment'] = $request->codeBatiment;
        $input['longitude'] = $request->longitude;
        $input['latitude'] = $request->latitude;
        $input['indication'] = $request->indication;
        $input['rue'] = $request->rue;
        $input['ville'] = $request->ville;
        $input['commune'] = $request->commune;
        $input['quartier'] = $request->quartier;
        $input['idCommercial'] = $request->idCommercial;
        $input['idUser'] = $user->id;

        if ($request->file()) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads/batiments/images/' . $request->codeBatiment, $fileName, 'public');
            $input['image'] = '/storage/' . $filePath;
        }

        try {

            DB::beginTransaction();
            $batiment = Batiment::create($input);

            DB::commit();

            return $this->sendResponse($batiment, "Création du batiment reussie", 201);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show Building by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the building. Example: 2
     * @responseFile storage/responses/showbatiment.json
     */
    public function show($id)
    {
        $batiment = Batiment::find($id);

        $batiment->etablissements;


        foreach ($batiment->etablissements as $key => $etablissement) {
            if ($etablissement->manager) {
                $etablissement->manager->user;
            }

            if ($etablissement->user) {
                $etablissement->user;
            }

            if ($etablissement->commercial) {
                $etablissement->commercial->user;
            }

            $etablissement->sousCategories;
            $etablissement->commodites;
            foreach ($etablissement->sousCategories as $key => $sousCategories) {
                $sousCategories->categorie;
            }

            $etablissement->horaires;
            $etablissement->images;
            $etablissement->commentaires;

            foreach ($etablissement->commentaires as $key => $commentaires) {
                $commentaires->user;
            }
        }

        return $this->sendResponse($batiment, "Batiment");
    }

    /**
     * Update Building.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the building. Example: 2
     * @bodyParam nom string  the name of the Building. Example: Sogefi
     * @bodyParam idCommercial int the id of the commercial. Example: 2
     * @bodyParam nombreNiveau int the number of levels in the building. Example: 3
     * @bodyParam longitude string.
     * @bodyParam latitude string.
     * @bodyParam image file Building Image.
     * @bodyParam indication string indication of the location of the building. Example: Rue de melen
     * @bodyParam rue string. Example: Rue de Melen
     * @bodyParam ville string. Example: Douala
     * @bodyParam quartier string. Example: Melen
     * @bodyParam commune string. Example: Yaounde IV
     * @bodyParam _method string "required if update image(change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updatebatiment.json
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $batiment = Batiment::find($id);
        $admin = Admin::where('idUser', $user->id)->first();
        $commercial = Commercial::where('idUser', $user->id)->first();

        if ($admin || $commercial->id == $batiment->idCommercial) {
            $request->validate([
                'image' => 'mimes:png,jpg,jpeg|max:10000'
            ]);

            try {
                DB::beginTransaction();
                $batiment->nom = $request->nom ?? $batiment->nom;
                $batiment->nombreNiveau = $request->nombreNiveau ?? $batiment->nombreNiveau;
                $batiment->longitude = $request->longitude ?? $batiment->longitude;
                $batiment->latitude = $request->latitude ?? $batiment->latitude;
                $batiment->indication = $request->indication ?? $batiment->indication;
                $batiment->rue = $request->rue ?? $batiment->rue;
                $batiment->ville = $request->ville ?? $batiment->ville;
                $batiment->commune = $request->commune ?? $batiment->commune;
                $batiment->quartier = $request->quartier ?? $batiment->quartier;

                if ($request->file()) {
                    $fileName = time() . '_' . $request->image->getClientOriginalName();
                    $filePath = $request->file('image')->storeAs('uploads/batiments/images/' . $batiment->codeBatiment, $fileName, 'public');
                    $batiment->image = '/storage/' . $filePath;
                }


                $batiment->save();

                DB::commit();

                return $this->sendResponse($batiment, "Update Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => $th->getMessage()], 400);
            }
        }
    }

    /**
     * Delete Building.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the building. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $batiment = Batiment::find($id);
        $admin = Admin::where('idUser', $user->id)->first();
        $commercial = Commercial::where('idUser', $user->id)->first();

        if ($admin || $commercial->id == $batiment->idCommercial) {

            try {
                DB::beginTransaction();


                foreach ($batiment->etablissements as $key => $etablissement) {
                    $etablissement->images()->delete();
                    $etablissement->horaires()->delete();
                    $etablissement->commentaires()->delete();

                    foreach ($etablissement->sousCategories as $key => $sousCategorie) {
                        $etablissement->sousCategories()->detach($sousCategorie->id);
                    }

                    foreach ($etablissement->commodites as $key => $commodite) {
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
}
