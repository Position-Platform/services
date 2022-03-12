<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Batiment;
use App\Models\Commercial;
use App\Models\Commodite;
use App\Models\Etablissement;
use App\Models\SousCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 *
 * @group Establishment management
 *
 * APIs for managing Establishment
 */
class EtablissementController extends BaseController
{


    /**
     * Get all establishment.
     *
     * @header Content-Type application/json
     * @responseFile storage/responses/getetablissements.json
     */
    public function index()
    {
        $etablissements = Etablissement::all();

        foreach ($etablissements as $key => $etablissement) {
            $etablissement->batiment;
            $etablissement->sousCategories;

            foreach ($etablissement->sousCategories as $key => $sousCategories) {
                $sousCategories->categorie;
            }

            $etablissement->commodites;
            $etablissement->images;
            $etablissement->horaires;
            $etablissement->commentaires;

            foreach ($etablissement->commentaires as $key => $commentaires) {
                $commentaires->user;
            }


            if ($etablissement->manager) {
                $etablissement->manager->user;
            }

            if ($etablissement->user) {
                $etablissement->user;
            }

            if ($etablissement->commercial) {
                $etablissement->commercial->user;
            }
        }

        return $this->sendResponse($etablissements, 'Liste des Etablissements');
    }

    /**
     * Add a new establishment.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam nom string required  the name of the establishment. Example: Sogefi
     * @bodyParam idBatiment int required the id of the Building. Example: 2
     * @bodyParam indicationAdresse string precise address of the establishment. Example: Rue de Melen
     * @bodyParam codePostal string postal code. Example: 59684
     * @bodyParam siteInternet string website. Example: sogefi.cm.
     * @bodyParam description string establishment description Example: Super etablissement.
     * @bodyParam cover file required establishment Image.
     * @bodyParam etage int required floor number of the establishment. Example: 3
     * @bodyParam phone string required Phone Numer. Example: 699999999
     * @bodyParam whatsapp1 string required whatsapp number. Example: 699999999
     * @bodyParam whatsapp2 string other whatsapp number. Example: 699999999
     * @bodyParam osmId string OSM Data Id. Example: 111259658236
     * @bodyParam services string required department of the establishment. Example: OM;MOMO
     * @bodyParam ameliorations string improvements. Example: Site internet,videos
     * @bodyParam logo file required establishment Logo.
     * @responseFile storage/responses/addetablissement.json
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $admin = Admin::where('idUser', $user->id)->first();
        $commercial = Commercial::where('idUser', $user->id)->first();

        $validator =  Validator::make($request->all(), [
            'nom' => 'required',
            'etage' => 'required',
            'phone' => 'required',
            'whatsapp1' => 'required',
            'services' => 'required',
            'idSousCategorie' => 'required',
            'idCommodite' => 'required',
            'idBatiment' => 'required',
            'cover' => 'mimes:png,jpg,jpeg|max:20000',
            'logo' => 'mimes:png,jpg,jpeg,svg|max:10000',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input['nom'] = $request->nom;
        $input['indicationAdresse'] = $request->indicationAdresse;
        $input['codePostal'] = $request->codePostal;
        $input['siteInternet'] = $request->siteInternet;
        $input['etage'] = $request->etage;
        $input['phone'] = $request->phone;
        $input['whatsapp1'] = $request->whatsapp1;
        $input['whatsapp2'] = $request->whatsapp2;
        $input['description'] = $request->description;
        $input['osmId'] = $request->osmId;
        $input['services'] = $request->services;
        $input['ameliorations'] = $request->ameliorations;
        $input['idUser'] = $user->id;

        $batiment = Batiment::find($request->idBatiment);

        if ($admin || $commercial) {

            if ($request->file()) {
                $fileName = time() . '_' . $request->cover->getClientOriginalName();
                $filePath = $request->file('cover')->storeAs('uploads/batiments/images/' . $batiment->codeBatiment . '/' . $request->nom, $fileName, 'public');
                $input['cover'] = '/storage/' . $filePath;
            }

            if ($request->file('logo')) {
                $fileName = time() . '_' . $request->logo->getClientOriginalName();
                $filePathLogo = $request->file('logo')->storeAs('uploads/batiments/images/' . $batiment->codeBatiment . '/' . $request->nom, $fileName, 'public');
                $input['logo'] = '/storage/' . $filePathLogo;
            }

            try {


                DB::beginTransaction();

                $input['idCommercial'] = $commercial->id;

                $etablissement = $batiment->etablissements()->create($input);



                if ($request->idSousCategorie != null) {
                    $idSousCategories = explode(",", $request->idSousCategorie);
                    $sousCategories = SousCategorie::find($idSousCategories);
                    $etablissement->sousCategories()->attach($sousCategories);
                }

                if ($request->idCommodite != null) {
                    $idCommodites = explode(",", $request->idCommodite);
                    $commodites = Commodite::find($idCommodites);
                    $etablissement->commodites()->attach($commodites);
                }

                DB::commit();

                return $this->sendResponse($etablissement, "Création de l'etablissement reussie", 201);
            } catch (\Exception $ex) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
            }
        }
    }

    /**
     * Show Establishment by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the Establishment. Example: 2
     * @responseFile storage/responses/showetablissement.json
     */
    public function show($id)
    {
        $etablissement = Etablissement::find($id);

        $etablissement->batiment;
        $etablissement->sousCategories;

        foreach ($etablissement->sousCategories as $key => $sousCategories) {
            $sousCategories->categorie;
        }

        $etablissement->commodites;
        $etablissement->images;
        $etablissement->horaires;
        $etablissement->commentaires;

        foreach ($etablissement->commentaires as $key => $commentaires) {
            $commentaires->user;
        }

        if ($etablissement->manager) {
            $etablissement->manager->user;
        }

        if ($etablissement->user) {
            $etablissement->user;
        }

        if ($etablissement->commercial) {
            $etablissement->commercial->user;
        }

        return $this->sendResponse($etablissement, "Etablissement");
    }

    /**
     * Update Establishment.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the Establishment. Example: 2
     * @bodyParam nom string  the name of the establishment. Example: Sogefi
     * @bodyParam idManager int the id of the Manager. Example: 2
     * @bodyParam indicationAdresse string precise address of the establishment. Example: Rue de Melen
     * @bodyParam codePostal string postal code. Example: 59684
     * @bodyParam siteInternet string website. Example: sogefi.cm.
     * @bodyParam description string establishment description Example: Super etablissement.
     * @bodyParam cover file establishment Image.
     * @bodyParam etage int floor number of the establishment. Example: 3
     * @bodyParam phone string Phone Numer. Example: 699999999
     * @bodyParam whatsapp1 string whatsapp number. Example: 699999999
     * @bodyParam whatsapp2 string other whatsapp number. Example: 699999999
     * @bodyParam osmId string OSM Data Id. Example: 111259658236
     * @bodyParam services string department of the establishment. Example: OM;MOMO
     * @bodyParam ameliorations string improvements. Example: Site internet,videos
     * @bodyParam vues string count view. Example: ok
     * @bodyParam avis int overall rating of the institution. Example: 3.2
     * @bodyParam revoir bool establishment to be reviewed. Example: 3.2
     * @bodyParam valide bool valid establishment. Example: 3.2
     * @bodyParam logo file establishment Logo.
     * @bodyParam _method string "required if update image(change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updateetablissement.json
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $etablissement = Etablissement::find($id);
        $admin = Admin::where('idUser', $user->id)->first();
        $commercial = Commercial::where('idUser', $user->id)->first();

        if ($admin || $commercial->id == $etablissement->idCommercial) {
            $request->validate([
                'cover' => 'mimes:png,jpg,jpeg|max:10000',
                'logo' => 'mimes:png,jpg,jpeg,svg|max:10000',
            ]);

            try {
                DB::beginTransaction();

                $etablissement->nom = $request->nom ?? $etablissement->nom;
                $etablissement->indicationAdresse = $request->indicationAdresse ?? $etablissement->indicationAdresse;
                $etablissement->codePostal = $request->codePostal ?? $etablissement->codePostal;
                $etablissement->siteInternet = $request->siteInternet ?? $etablissement->siteInternet;
                $etablissement->description = $request->description ?? $etablissement->description;
                $etablissement->etage = $request->etage ?? $etablissement->etage;
                $etablissement->services = $request->services ?? $etablissement->services;
                $etablissement->idManager = $request->idManager ?? $etablissement->idManager;
                if ($request->vues) {
                    $etablissement->vues =  $etablissement->vues + 1;
                }

                $etablissement->revoir = $request->revoir ?? $etablissement->revoir;
                $etablissement->valide = $request->valide ?? $etablissement->valide;
                $etablissement->phone = $request->phone ?? $etablissement->phone;
                $etablissement->whatsapp1 = $request->whatsapp1 ?? $etablissement->whatsapp1;
                $etablissement->whatsapp2 = $request->whatsapp2 ?? $etablissement->whatsapp2;
                $etablissement->osmId = $request->osmId ?? $etablissement->osmId;
                $etablissement->updated = $request->updated ?? $etablissement->updated;
                $etablissement->ameliorations = $request->ameliorations ?? $etablissement->ameliorations;
                if ($request->avis) {
                    $etablissement->avis =  $etablissement->avis + 1;
                }

                $batiment = $etablissement->batiment;

                if ($request->file()) {
                    $fileName = time() . '_' . $request->cover->getClientOriginalName();
                    $filePath = $request->file('cover')->storeAs('uploads/batiments/images/' . $batiment->codeBatiment, $fileName, 'public');
                    $etablissement->cover = '/storage/' . $filePath;
                }

                if ($request->file('logo')) {
                    $fileName = time() . '_' . $request->logo->getClientOriginalName();
                    $filePathLogo = $request->file('logo')->storeAs('uploads/batiments/images/' . $batiment->codeBatiment, $fileName, 'public');
                    $etablissement->logo = '/storage/' . $filePathLogo;
                }


                $etablissement->save();

                DB::commit();

                return $this->sendResponse($etablissement, "Update Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => $th->getMessage()], 400);
            }
        }
    }

    /**
     * Delete Establishment.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the Establishment. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $etablissement = Etablissement::find($id);
        $admin = Admin::where('idUser', $user->id)->first();
        $commercial = Commercial::where('idUser', $user->id)->first();

        if ($admin || $commercial->id == $etablissement->idCommercial) {

            try {
                DB::beginTransaction();


                $etablissement->images()->delete();
                $etablissement->horaires()->delete();
                $etablissement->commentaires()->delete();

                foreach ($etablissement->sousCategories as $key => $sousCategorie) {
                    $etablissement->sousCategories()->detach($sousCategorie->id);
                }

                foreach ($etablissement->commodites as $key => $commodite) {
                    $etablissement->commodites()->detach($commodite->id);
                }

                $etablissement->delete();

                DB::commit();

                return $this->sendResponse("", "Delete Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
            }
        }
    }

    /**
     * Search Establishment.
     *
     * @header Content-Type application/json
     * @queryParam q string required search value. Example: piscine
     * @responseFile storage/responses/getetablissements.json
     */
    public function search(Request $request)
    {
        $q = $request->input('q');
        $etablissements = Etablissement::search($q)->get();

        foreach ($etablissements as $key => $etablissement) {
            $etablissement->batiment;
            $etablissement->sousCategories;

            foreach ($etablissement->sousCategories as $key => $sousCategories) {
                $sousCategories->categorie;
            }

            $etablissement->commodites;
            $etablissement->images;
            $etablissement->horaires;
            $etablissement->commentaires;

            foreach ($etablissement->commentaires as $key => $commentaires) {
                $commentaires->user;
            }

            $etablissement->commercial->user;
            if ($etablissement->manager) {
                $etablissement->manager->user;
            }
        }

        return $this->sendResponse($etablissements, 'Liste des Etablissements');
    }
}
