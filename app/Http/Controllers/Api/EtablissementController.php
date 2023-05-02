<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Batiment;
use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Etablissement;
use App\Models\Horaire;
use App\Models\Image;
use App\Models\SousCategorie;
use App\Models\SousCategoriesEtablissement;
use App\Models\User;
use App\Models\UserFavoris;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
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
     * @queryParam user_id string id of user. Example: 1
     */
    public function index(Request $request)
    {

        $lat = $request->lat;
        $lon = $request->lon;

        $sqlDistance =  DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(CAST(batiments.latitude as DOUBLE PRECISION))) 
                * cos( radians(CAST(batiments.longitude as DOUBLE PRECISION)) - radians(" . $lon . ")) 
                + sin(radians(" . $lat . ")) 
                * sin(radians(CAST(batiments.latitude as DOUBLE PRECISION))))");


        $etablissements =  DB::table('etablissements')
            ->join('batiments', 'etablissements.batiment_id', '=', 'batiments.id')
            ->select(
                'etablissements.*'
            )
            ->selectRaw("{$sqlDistance} AS distance")
            ->orderBy('distance')
            ->paginate(50);


        foreach ($etablissements as $etablissement) {


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

            $etablissement->distance;

            $etablissement->batiment = Batiment::where('id', $etablissement->batiment_id)->first();

            $sousCategorieEtablissement = SousCategoriesEtablissement::where('etablissement_id', $etablissement->id)->first();



            $etablissement->sousCategories = SousCategorie::where('id', $sousCategorieEtablissement->sous_categorie_id)->get();

            foreach ($etablissement->sousCategories as $sousCategories) {
                $sousCategories->categorie;
            }

            $etablissement->commodites;
            $etablissement->images = Image::where('etablissement_id', $etablissement->id)->get();
            $etablissement->horaires = Horaire::where('etablissement_id', $etablissement->id)->get();
            $etablissement->commentaires = Commentaire::where('etablissement_id', $etablissement->id)->get();

            foreach ($etablissement->commentaires as $commentaires) {
                $commentaires->user;
            }
        }

        $success['etablissements'] = $etablissements;

        return $this->sendResponse($success, 'Liste des Etablissements');
    }

    public function countEtablissement()
    {
        $nbre_etablissements = Etablissement::count();
        $nbre_page = ceil($nbre_etablissements / 100);
        $success['nbre_etablissements'] = $nbre_etablissements;
        $success['nbre_page'] = $nbre_page;
        return $this->sendResponse($success, 'Nombre des Etablissements');
    }

    public function getEtablissementByDistance(Request $request)
    {
        $lat = $request->lat;
        $lon = $request->lon;

        $sqlDistance =  DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(CAST(batiments.latitude as DOUBLE PRECISION))) 
                * cos( radians(CAST(batiments.longitude as DOUBLE PRECISION)) - radians(" . $lon . ")) 
                + sin(radians(" . $lat . ")) 
                * sin(radians(CAST(batiments.latitude as DOUBLE PRECISION))))");


        $etablissements =  DB::table('etablissements')
            ->join('batiments', 'etablissements.batiment_id', '=', 'batiments.id')
            ->select(
                'etablissements.*'
            )
            ->selectRaw("{$sqlDistance} AS distance")
            ->orderBy('distance')
            ->paginate(30);


        foreach ($etablissements as $etablissement) {


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

            $etablissement->distance;

            $etablissement->batiment = Batiment::where('id', $etablissement->batiment_id)->first();

            $sousCategorieEtablissement = SousCategoriesEtablissement::where('etablissement_id', $etablissement->id)->first();



            $etablissement->sousCategories = SousCategorie::where('id', $sousCategorieEtablissement->sous_categorie_id)->get();

            foreach ($etablissement->sousCategories as $sousCategories) {
                $sousCategories->categorie;
            }

            $etablissement->commodites;
            $etablissement->images = Image::where('etablissement_id', $etablissement->id)->get();
            $etablissement->horaires = Horaire::where('etablissement_id', $etablissement->id)->get();
            $etablissement->commentaires = Commentaire::where('etablissement_id', $etablissement->id)->get();

            foreach ($etablissement->commentaires as $commentaires) {
                $commentaires->user;
            }
        }

        $success['etablissements'] = $etablissements;

        return $this->sendResponse($success, 'Liste des Etablissements');
    }

    /**
     * Add a new establishment.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam nom string required  the name of the establishment. Example: Sogefi
     * @bodyParam batiment_id int required the id of the Building. Example: 3
     * @bodyParam indication_adresse string precise address of the establishment. Example: Rue de Melen
     * @bodyParam code_postal string postal code. Example: 59684
     * @bodyParam site_internet string website. Example: sogefi.cm.
     * @bodyParam description string establishment description Example: Super etablissement.
     * @bodyParam nom_manager string establishment manager name Example: Nom Manager.
     * @bodyParam contact_manager string establishment manager contact Example: 699999999.
     * @bodyParam cover file required establishment Image.
     * @bodyParam etage int required floor number of the establishment. Example: 3
     * @bodyParam phone string required Phone Numer. Example: 699999999
     * @bodyParam whatsapp1 string required whatsapp number. Example: 699999999
     * @bodyParam whatsapp2 string other whatsapp number. Example: 699999999
     * @bodyParam osm_id string OSM Data Id. Example: 111259658236
     * @bodyParam commodites string required services of the establishment. Example: Wifi;Parking
     * @bodyParam services string required services of the establishment. Example: OM;MOMO
     * @bodyParam ameliorations string improvements. Example: Site internet;videos
     * @bodyParam logo file required establishment Logo.
     * @bodyParam logo_map file required establishment Logo in map.
     * @bodyParam idSousCategorie string required ids of sous categories. Example: 1,2,3
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
            'batiment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input['nom'] = $request->nom;
        $input['indication_adresse'] = $request->indication_adresse;
        $input['code_postal'] = $request->code_postal;
        $input['site_internet'] = $request->site_internet;
        $input['etage'] = $request->etage;
        $input['phone'] = $request->phone;
        $input['whatsapp1'] = $request->whatsapp1;
        $input['whatsapp2'] = $request->whatsapp2;
        $input['description'] = $request->description;
        $input['osm_id'] = $request->osm_id;
        $input['services'] = $request->services;
        $input['commodites'] = $request->commodites;
        $input['ameliorations'] = $request->ameliorations;
        $input['nom_manager'] = $request->nom_manager;
        $input['contact_manager'] = $request->contact_manager;
        $input['user_id'] = $user->id;

        $batiment = Batiment::find($request->batiment_id);


        if ($request->file()) {
            $fileName = time() . '_' . $request->cover->getClientOriginalName();
            $filePath = $request->file('cover')->storeAs('uploads/batiments/images/' . $batiment->code . '/' . $request->nom, $fileName, 'public');
            $input['cover'] = '/storage/' . $filePath;
        }

        if ($request->file('logo')) {
            $fileName = time() . '_' . $request->logo->getClientOriginalName();
            $filePathLogo = $request->file('logo')->storeAs('uploads/batiments/images/' . $batiment->code . '/' . $request->nom, $fileName, 'public');
            $input['logo'] = '/storage/' . $filePathLogo;
        }

        if ($request->file('logo_map')) {
            $fileName = time() . '_' . $request->logo_map->getClientOriginalName();
            $filePathLogoMap = $request->file('logo_map')->storeAs('uploads/batiments/images/' . $batiment->code . '/' . $request->nom, $fileName, 'public');
            $input['logo_map'] = '/storage/' . $filePathLogoMap;
        }

        try {


            DB::beginTransaction();


            $etablissement = $batiment->etablissements()->create($input);



            if ($request->idSousCategorie != null) {
                $idSousCategories = explode(",", $request->idSousCategorie);
                $sousCategories = SousCategorie::find($idSousCategories);
                $etablissement->sousCategories()->attach($sousCategories);
            }



            DB::commit();


            $success['etablissement'] = $etablissement;

            return $this->sendResponse($success, "Création de l'etablissement reussie", 201);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show Establishment by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the Establishment. Example: 1
     * @queryParam user_id string id of user. Example: 1
     */
    public function show($id, Request $request)
    {
        $etablissement = Etablissement::find($id);


        if ($request->user_id) {
            $etablissement->isFavoris = $this->checkIfEtablissementInFavoris($etablissement, $request->user_id);
        } else {
            $etablissement->isFavoris = false;
        }


        $isOpen = $this->checkIfEtablissementIsOpen($etablissement->id);

        $etablissement->isopen = $isOpen;


        $moyenne = $this->getMoyenneRatingByEtablissmeent($etablissement->id);

        $etablissement->moyenne = $moyenne;

        $etablissement->avis = $this->getCommentNumberByEtablissmeent($etablissement->id);

        $etablissement->count = $this->countOccurenceRatingInCommentTableByEtablissement($etablissement->id);

        $etablissement->batiment;
        $etablissement->sousCategories;

        foreach ($etablissement->sousCategories as $sousCategories) {
            $sousCategories->categorie;
        }

        $etablissement->commodites;
        $etablissement->images;
        $etablissement->horaires;
        $etablissement->commentaires;

        foreach ($etablissement->commentaires as $commentaires) {
            $commentaires->user;
        }

        $etablissement->user->abonnement;


        $success['etablissement'] = $etablissement;


        return $this->sendResponse($success, "Etablissement");
    }

    /**
     * Update Establishment.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the Establishment. Example: 1
     * @bodyParam nom string  the name of the establishment. Example: Sogefi
     * @bodyParam indication_adresse string precise address of the establishment. Example: Rue de Melen
     * @bodyParam code_postal string postal code. Example: 59684
     * @bodyParam site_internet string website. Example: sogefi.cm.
     * @bodyParam description string establishment description Example: Super etablissement.
     * @bodyParam cover file establishment Image.
     * @bodyParam etage int floor number of the establishment. Example: 3
     * @bodyParam phone string Phone Numer. Example: 699999999
     * @bodyParam whatsapp1 string whatsapp number. Example: 699999999
     * @bodyParam whatsapp2 string other whatsapp number. Example: 699999999
     * @bodyParam osm_id string OSM Data Id. Example: 111259658236
     * @bodyParam commodites string services of the establishment. Example: Wifi;Parking
     * @bodyParam services string department of the establishment. Example: OM;MOMO
     * @bodyParam ameliorations string improvements. Example: Site internet,videos
     * @bodyParam vues string count view. Example: true
     * @bodyParam logo file establishment Logo.
     * @bodyParam logo_map file establishment Logo Map.
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     */
    public function update(Request $request, $id)
    {
        Auth::user();
        $etablissement = Etablissement::find($id);



        try {
            DB::beginTransaction();

            $etablissement->nom = $request->nom ?? $etablissement->nom;
            $etablissement->indication_adresse = $request->indication_adresse ?? $etablissement->indication_adresse;
            $etablissement->code_postal = $request->code_postal ?? $etablissement->code_postal;
            $etablissement->site_internet = $request->site_internet ?? $etablissement->site_internet;
            $etablissement->description = $request->description ?? $etablissement->description;
            $etablissement->etage = $request->etage ?? $etablissement->etage;
            $etablissement->services = $request->services ?? $etablissement->services;
            $etablissement->commodites = $request->commodites ?? $etablissement->commodites;
            if ($request->vues) {
                $etablissement->vues =  $etablissement->vues + 1;
            }
            $etablissement->phone = $request->phone ?? $etablissement->phone;
            $etablissement->whatsapp1 = $request->whatsapp1 ?? $etablissement->whatsapp1;
            $etablissement->whatsapp2 = $request->whatsapp2 ?? $etablissement->whatsapp2;
            $etablissement->osm_id = $request->osm_id ?? $etablissement->osm_id;
            $etablissement->ameliorations = $request->ameliorations ?? $etablissement->ameliorations;


            if ($request->idSousCategorie != null) {
                $idSousCategories = explode(",", $request->idSousCategorie);
                $sousCategories = SousCategorie::find($idSousCategories);
                $etablissement->sousCategories()->attach($sousCategories);
            }


            $batiment = $etablissement->batiment;

            if ($request->file()) {
                $fileName = time() . '_' . $request->cover->getClientOriginalName();
                $filePath = $request->file('cover')->storeAs('uploads/batiments/images/' . $batiment->code, $fileName, 'public');
                $etablissement->cover = '/storage/' . $filePath;
            }

            if ($request->file('logo')) {
                $fileName = time() . '_' . $request->logo->getClientOriginalName();
                $filePathLogo = $request->file('logo')->storeAs('uploads/batiments/images/' . $batiment->code, $fileName, 'public');
                $etablissement->logo = '/storage/' . $filePathLogo;
            }

            if ($request->file('logo_map')) {
                $fileName = time() . '_' . $request->logo_map->getClientOriginalName();
                $filePathLogoMap = $request->file('logo_map')->storeAs('uploads/batiments/images/' . $batiment->code, $fileName, 'public');
                $etablissement->logo_map = '/storage/' . $filePathLogoMap;
            }


            $etablissement->save();

            DB::commit();


            $success['etablissement'] = $etablissement;

            return $this->sendResponse($success, "Update Success", 201);
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
     * @urlParam id int required the id of the Establishment. Example: 1
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $etablissement = Etablissement::find($id);
        $admin = Admin::where('user_id', $user->id)->first();

        if ($admin || $user->id == $etablissement->user_id) {

            try {
                DB::beginTransaction();


                $etablissement->images()->delete();
                $etablissement->horaires()->delete();
                $etablissement->commentaires()->delete();

                foreach ($etablissement->sousCategories as $sousCategorie) {
                    $etablissement->sousCategories()->detach($sousCategorie->id);
                }

                foreach ($etablissement->commodites as $commodite) {
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
     */
    public function search(Request $request)
    {
        $q = $request->input('q');
        $etablissements = Etablissement::search($q)->paginate(100);

        foreach ($etablissements as $etablissement) {

            if ($request->user_id) {
                $etablissement->isFavoris = $this->checkIfEtablissementInFavoris($etablissement->id, $request->user_id);
            } else {
                $etablissement->isFavoris = false;
            }


            $moyenne = $this->getMoyenneRatingByEtablissmeent($etablissement->id);

            $isOpen = $this->checkIfEtablissementIsOpen($etablissement->id);

            $etablissement->isopen = $isOpen;

            $etablissement->moyenne = $moyenne;

            $etablissement->avis = $this->getCommentNumberByEtablissmeent($etablissement->id);

            $etablissement->count = $this->countOccurenceRatingInCommentTableByEtablissement($etablissement->id);


            $etablissement->batiment;
            $etablissement->sousCategories;



            foreach ($etablissement->sousCategories as $sousCategories) {
                $sousCategories->categorie;
            }

            $etablissement->commodites;
            $etablissement->images;
            $etablissement->horaires;
            $etablissement->commentaires;

            foreach ($etablissement->commentaires as $commentaires) {
                $commentaires->user;
            }
        }


        $success['etablissements'] = $etablissements;

        return $this->sendResponse($success, 'Liste des Etablissements');
    }

    /**
     * Search Establishment by Filter.
     *
     * @header Content-Type application/json
     * @queryParam user_id string id of user conncted . Example: 1
     * @queryParam id_categorie string required id of categorie . Example: 1
     * @queryParam commodites string commodites recherchées. Example: Wifi;Parking
     */
    public function filterSearch(Request $request)
    {

        $idcategorie = $request->input('id_categorie');

        $commodites = $request->input('commodites');

        $lat = $request->input('lat');

        $lon = $request->input('lon');


        $sqlDistance =  DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(CAST(batiments.latitude as DOUBLE PRECISION))) 
                * cos( radians(CAST(batiments.longitude as DOUBLE PRECISION)) - radians(" . $lon . ")) 
                + sin(radians(" . $lat . ")) 
                * sin(radians(CAST(batiments.latitude as DOUBLE PRECISION))))");





        if ($commodites != null) {

            $etablissements = DB::table('etablissements')
                ->select('etablissements.*')
                ->selectRaw($sqlDistance . ' AS distance')
                ->join('batiments', 'etablissements.batiment_id', '=', 'batiments.id')
                ->join('sous_categories_etablissements', 'etablissements.id', '=', 'sous_categories_etablissements.etablissement_id')
                ->join('sous_categories', 'sous_categories_etablissements.sous_categorie_id', '=', 'sous_categories.id')
                ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                ->where('categories.id', '=', $idcategorie)
                ->where('etablissements.commodites', 'like', '%' . $commodites . '%')
                ->orderBy('distance', 'ASC')
                ->paginate(50);
        } else {

            $etablissements = DB::table('etablissements')
                ->select('etablissements.*')
                ->selectRaw($sqlDistance . ' AS distance')
                ->join('batiments', 'etablissements.batiment_id', '=', 'batiments.id')
                ->join('sous_categories_etablissements', 'etablissements.id', '=', 'sous_categories_etablissements.etablissement_id')
                ->join('sous_categories', 'sous_categories_etablissements.sous_categorie_id', '=', 'sous_categories.id')
                ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                ->where('categories.id', '=', $idcategorie)
                ->orderBy('distance', 'ASC')
                ->paginate(50);
        }

        foreach ($etablissements as $etablissement) {

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

            $etablissement->distance;

            $etablissement->batiment = Batiment::where('id', $etablissement->batiment_id)->first();

            $sousCategorieEtablissement = SousCategoriesEtablissement::where('etablissement_id', $etablissement->id)->first();



            $etablissement->sousCategories = SousCategorie::where('id', $sousCategorieEtablissement->sous_categorie_id)->get();

            foreach ($etablissement->sousCategories as $sousCategories) {
                $sousCategories->categorie;
            }

            $etablissement->commodites;
            $etablissement->images = Image::where('etablissement_id', $etablissement->id)->get();
            $etablissement->horaires = Horaire::where('etablissement_id', $etablissement->id)->get();
            $etablissement->commentaires = Commentaire::where('etablissement_id', $etablissement->id)->get();

            foreach ($etablissement->commentaires as $commentaires) {
                $commentaires->user;
            }
        }


        $success['etablissements'] = $etablissements;

        return $this->sendResponse($success, 'Liste des Etablissements');
    }

    /**
     * Add Favorite Establishment.
     *
     * @authenticated
     * @bodyParam etablissement_id int required . Example: 1
     */

    public function addFavorite(Request $request)
    {
        $user = Auth::user();
        $etablissement_id = $request->etablissement_id;

        $favorite = UserFavoris::where('etablissement_id', $etablissement_id)->where('user_id', $user->id)->first();

        if ($favorite) {
            return $this->sendError('Etablissement déjà dans vos favoris', [], 200);
        }

        $favorite = new UserFavoris();
        $favorite->etablissement_id = $etablissement_id;
        $favorite->user_id = $user->id;
        $favorite->save();


        $success['favorite'] = $favorite;

        return $this->sendResponse($success, 'Etablissement ajouté aux favoris');
    }

    /**
     * Remove Favorite Establishment.
     *
     * @authenticated
     * @bodyParam etablissement_id int required . Example: 1
     */

    public function removeFavorite(Request $request)
    {
        $user = Auth::user();
        $etablissement_id = $request->etablissement_id;

        $favorite = UserFavoris::where('etablissement_id', $etablissement_id)->where('user_id', $user->id)->first();

        if (!$favorite) {
            return $this->sendError('Etablissement n\'est pas dans vos favoris', [], 200);
        }

        $favorite->delete();

        $success['favorite'] = $favorite;

        return $this->sendResponse($success, 'Etablissement retiré des favoris');
    }

    /**
     * Update vues Establishment.
     *
     * @urlParam etablissement_id int required . Example: 1
     */
    public function updateVues($etablissement_id)
    {

        $etablissement = Etablissement::find($etablissement_id);

        $etablissement->vues = $etablissement->vues + 1;
        $etablissement->save();

        $success['etablissement'] = $etablissement;

        return $this->sendResponse($success, 'Vues du Etablissement incrémentées');
    }
}
