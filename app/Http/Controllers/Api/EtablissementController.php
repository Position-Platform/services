<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Batiment;
use App\Models\Commentaire;
use App\Models\Commercial;
use App\Models\Commodite;
use App\Models\Etablissement;
use App\Models\Horaire;
use App\Models\SousCategorie;
use App\Models\UserFavoris;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $etablissements = Etablissement::paginate(100);
        $etablissements->setPath(env('APP_URL') . '/api/etablissements');

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

    public function countEtablissement()
    {
        $etablissements = Etablissement::count();
        $nbre_page = ceil($etablissements / 100);
        $etablissements['nbre_page'] = $nbre_page;
        return $this->sendResponse($etablissements, 'Nombre des Etablissements');
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
     * @bodyParam idSousCategorie string required ids of sous categories. Example: 1,2,3
     * @bodyParam idCommodite string required ids of commodites. Example: 1,2,3
     * @responseFile storage/responses/addetablissement.json
     */
    public function store(Request $request)
    {

        $user = Auth::user();

        $validator =  Validator::make($request->all(), [
            'nom' => 'required',
            'etage' => 'required',
            'phone' => 'required',
            'whatsapp1' => 'required',
            'services' => 'required',
            'idSousCategorie' => 'required',
            'idBatiment' => 'required',
            'idCommodite' => 'required',
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

            try {

                $commercial = Commercial::where('idUser', $user->id)->first();

                $input['idCommercial'] = $commercial->id;
            } catch (\Exception $e) {
            }


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
     * @queryParam user_id string id of user. Example: 1
     * @responseFile storage/responses/getetablissements.json
     */
    public function search(Request $request)
    {
        $q = $request->input('q');
        $etablissements = Etablissement::search($q)->get();

        foreach ($etablissements as $key => $etablissement) {

            if ($request->user_id) {
                $etablissement->isFavoris = $this->checkIfEtablissementInFavoris($etablissement, $request->user_id);
            } else {
                $etablissement->isFavoris = false;
            }


            $moyenne = $this->getMoyenneRatingByEtablissmeent($etablissement->id);

            $etablissement->moyenne = $moyenne;

            $etablissement->avis = $this->getCommentNumberByEtablissmeent($etablissement->id);

            $etablissement->count = $this->countOccurenceRatingInCommentTableByEtablissement($etablissement->id);

            $etablissement->opennow = $this->checkIfEtablissementIsOpen($etablissement->id);


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
            if ($etablissement->commercial) {
                $etablissement->commercial->user;
            }

            if ($etablissement->manager) {
                $etablissement->manager->user;
            }
        }

        return $this->sendResponse($etablissements, 'Liste des Etablissements');
    }



    /**
     * Search Establishment by Commodites & Distance.
     *
     * @header Content-Type application/json
     * @queryParam lon string required . Example: 13
     * @queryParam lat string required . Example: 5
     * @queryParam idCommodites string required . Example: 1,2,3
     * @queryParam user_id string id of user conncted . Example: 10
     * @queryParam id_categorie string required id of categorie . Example: 1
     * @responseFile storage/responses/getetablissementsdistance.json
     *
     */
    public function searchByCommoditesDistance(Request $request)
    {
        $lon = $request->input('lon');
        $lat = $request->input('lat');
        $id_categorie = $request->input('id_categorie');

        $idCommodites = explode(",", $request->input('idCommodites'));

        $data = array();

        foreach ($idCommodites as $key => $idCommodite) {
            $commodite = Commodite::find($idCommodite);


            foreach ($commodite->etablissements as $key => $etablissement) {


                if ($request->user_id) {
                    $etablissement->isFavoris = $this->checkIfEtablissementInFavoris($etablissement, $request->user_id);
                } else {
                    $etablissement->isFavoris = false;
                }

                $moyenne = $this->getMoyenneRatingByEtablissmeent($etablissement->id);

                $etablissement->moyenne = $moyenne;

                $etablissement->avis = $this->getCommentNumberByEtablissmeent($etablissement->id);

                $etablissement->count = $this->countOccurenceRatingInCommentTableByEtablissement($etablissement->id);

                $etablissement->opennow = $this->checkIfEtablissementIsOpen($etablissement->id);


                $etablissement->sousCategories;



                $etablissement->commodites;
                $etablissement->images;
                $etablissement->horaires;
                $etablissement->commentaires;

                foreach ($etablissement->commentaires as $key => $commentaires) {
                    $commentaires->user;
                }

                if ($etablissement->commercial) {
                    $etablissement->commercial->user;
                }
                if ($etablissement->manager) {
                    $etablissement->manager->user;
                }


                $etablissement->batiment->longitude;
                $etablissement->batiment->latitude;

                $distance = $this->getDistance($lat, $lon, $etablissement->batiment->latitude, $etablissement->batiment->longitude);
                $etablissement["distance"] = $distance;

                foreach ($etablissement->sousCategories as $key => $sousCategories) {
                    $sousCategories->categorie;
                    if ($sousCategories->categorie->id == $id_categorie) {
                        $bool = $this->checkIfEtablassimentInDataArray($etablissement, $data);
                        if ($bool == false) {
                            $data[] = $etablissement;
                        }

                        usort($data, function ($a, $b) {
                            return $a['distance'] > $b['distance'];
                        });
                    }
                }
            }
        }

        return $this->sendResponse($data, 'Liste des Etablissements');
    }

    /**
     * Search Establishment by Commodites & Avis.
     *
     * @header Content-Type application/json
     * @queryParam idCommodites string required . Example: 1,2,3
     * @queryParam user_id string id of user conncted . Example: 10
     * @queryParam id_categorie string required id of categorie . Example: 1
     * @responseFile storage/responses/getetablissements.json
     *
     */

    public function searchByCommoditesAvis(Request $request)
    {
        $idCommodites = explode(",", $request->input('idCommodites'));
        $id_categorie = $request->input('id_categorie');
        $data = array();
        foreach ($idCommodites as $key => $idCommodite) {
            $commodite = Commodite::find($idCommodite);


            foreach ($commodite->etablissements as $key => $etablissement) {
                if ($request->user_id) {
                    $etablissement->isFavoris = $this->checkIfEtablissementInFavoris($etablissement, $request->user_id);
                } else {
                    $etablissement->isFavoris = false;
                }
                $etablissement->sousCategories;

                $moyenne = $this->getMoyenneRatingByEtablissmeent($etablissement->id);

                $etablissement->moyenne = $moyenne;

                $etablissement->avis = $this->getCommentNumberByEtablissmeent($etablissement->id);

                $etablissement->count = $this->countOccurenceRatingInCommentTableByEtablissement($etablissement->id);

                $etablissement->opennow = $this->checkIfEtablissementIsOpen($etablissement->id);



                $etablissement->commodites;
                $etablissement->images;
                $etablissement->horaires;
                $etablissement->commentaires;

                foreach ($etablissement->commentaires as $key => $commentaires) {
                    $commentaires->user;
                }

                if ($etablissement->commercial) {
                    $etablissement->commercial->user;
                }
                if ($etablissement->manager) {
                    $etablissement->manager->user;
                }


                $etablissement->batiment->longitude;
                $etablissement->batiment->latitude;

                foreach ($etablissement->sousCategories as $key => $sousCategories) {
                    $sousCategories->categorie;
                    if ($sousCategories->categorie->id == $id_categorie) {
                        $bool = $this->checkIfEtablassimentInDataArray($etablissement, $data);
                        if ($bool == false) {
                            $data[] = $etablissement;
                        }
                        usort($data, function ($a, $b) {
                            return $a['avis'] < $b['avis'];
                        });
                    }
                }
            }
        }

        return $this->sendResponse($data, 'Liste des Etablissements');
    }

    /**
     * Search Establishment by Commodites & Vues.
     *
     * @header Content-Type application/json
     * @queryParam idCommodites string required . Example: 1,2,3
     * @queryParam user_id string id of user conncted . Example: 10
     * @queryParam id_categorie string required id of categorie . Example: 1
     * @responseFile storage/responses/getetablissements.json
     *
     */

    public function searchByCommoditesVues(Request $request)
    {
        $idCommodites = explode(",", $request->input('idCommodites'));
        $id_categorie = $request->input('id_categorie');
        $data = array();
        foreach ($idCommodites as $key => $idCommodite) {
            $commodite = Commodite::find($idCommodite);


            foreach ($commodite->etablissements as $key => $etablissement) {
                if ($request->user_id) {
                    $etablissement->isFavoris = $this->checkIfEtablissementInFavoris($etablissement, $request->user_id);
                } else {
                    $etablissement->isFavoris = false;
                }

                $etablissement->sousCategories;

                $moyenne = $this->getMoyenneRatingByEtablissmeent($etablissement->id);

                $etablissement->moyenne = $moyenne;

                $etablissement->avis = $this->getCommentNumberByEtablissmeent($etablissement->id);

                $etablissement->count = $this->countOccurenceRatingInCommentTableByEtablissement($etablissement->id);

                $etablissement->opennow = $this->checkIfEtablissementIsOpen($etablissement->id);

                $etablissement->commodites;
                $etablissement->images;
                $etablissement->horaires;
                $etablissement->commentaires;

                foreach ($etablissement->commentaires as $key => $commentaires) {
                    $commentaires->user;
                }

                if ($etablissement->commercial) {
                    $etablissement->commercial->user;
                }
                if ($etablissement->manager) {
                    $etablissement->manager->user;
                }


                $etablissement->batiment->longitude;
                $etablissement->batiment->latitude;

                foreach ($etablissement->sousCategories as $key => $sousCategories) {
                    $sousCategories->categorie;
                    if ($sousCategories->categorie->id == $id_categorie) {
                        $bool = $this->checkIfEtablassimentInDataArray($etablissement, $data);
                        if ($bool == false) {
                            $data[] = $etablissement;
                        }
                        usort($data, function ($a, $b) {
                            return $a['vues'] < $b['vues'];
                        });
                    }
                }
            }
        }

        return $this->sendResponse($data, 'Liste des Etablissements');
    }

    /**
     * Add Favorite Establishment.
     *
     * @authenticated
     * @bodyParam idEtablissement int required . Example: 1
     * @responseFile storage/responses/addfavorite.json
     */

    public function addFavorite(Request $request)
    {
        $user = Auth::user();
        $idEtablissement = $request->idEtablissement;

        $favorite = UserFavoris::where('etablissement_id', $idEtablissement)->where('user_id', $user->id)->first();

        if ($favorite) {
            return $this->sendError('Etablissement déjà dans vos favoris', [], 200);
        }

        $favorite = new UserFavoris();
        $favorite->etablissement_id = $idEtablissement;
        $favorite->user_id = $user->id;
        $favorite->save();

        return $this->sendResponse($favorite, 'Etablissement ajouté aux favoris');
    }

    /**
     * Remove Favorite Establishment.
     *
     * @authenticated
     * @bodyParam idEtablissement int required . Example: 1
     * @responseFile storage/responses/removefavorite.json
     */

    public function removeFavorite(Request $request)
    {
        $user = Auth::user();
        $idEtablissement = $request->idEtablissement;

        $favorite = UserFavoris::where('etablissement_id', $idEtablissement)->where('user_id', $user->id)->first();

        if (!$favorite) {
            return $this->sendError('Etablissement n\'est pas dans vos favoris', [], 200);
        }

        $favorite->delete();

        return $this->sendResponse($favorite, 'Etablissement retiré des favoris');
    }

    /**
     * Update vues Establishment.
     *
     * @urlParam idEtablissement int required . Example: 1
     * @responseFile 201 storage/responses/updateetablissement.json
     */
    public function updateVues($idEtablissement)
    {

        $etablissement = Etablissement::find($idEtablissement);

        $etablissement->vues = $etablissement->vues + 1;
        $etablissement->save();

        return $this->sendResponse($etablissement, 'Vues du Etablissement incrémentées');
    }
}
