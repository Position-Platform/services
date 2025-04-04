<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Batiment;
use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Etablissement;
use App\Models\Horaire;
use App\Models\Image;
use App\Models\OsmData;
use App\Models\SousCategorie;
use App\Models\SousCategoriesEtablissement;
use App\Models\User;
use App\Models\UserFavoris;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Builder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

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
     * @queryParam lat string required latitude. Example: 4.056
     * @queryParam lon string required longitude. Example: 8.056
     */
    public function index(Request $request)
    {
        Log::debug('Récupération de la liste des établissements', [
            'controller' => 'EtablissementController',
            'method' => 'index',
            'lat' => $request->lat,
            'lon' => $request->lon,
            'user_id' => $request->user_id
        ]);

        $lat = $request->lat;
        $lon = $request->lon;

        $sqlDistance =  DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(CAST(batiments.latitude as DOUBLE PRECISION))) 
                * cos( radians(CAST(batiments.longitude as DOUBLE PRECISION)) - radians(" . $lon . ")) 
                + sin(radians(" . $lat . ")) 
                * sin(radians(CAST(batiments.latitude as DOUBLE PRECISION)))) AS distance");


        $etablissements =  DB::table('etablissements')
            ->join('batiments', 'etablissements.batiment_id', '=', 'batiments.id')
            ->select(
                'etablissements.*'
            )
            ->selectRaw($sqlDistance)
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

        Log::info('Liste des établissements récupérée avec succès', [
            'controller' => 'EtablissementController',
            'method' => 'index',
            'nombre_etablissements' => count($etablissements)
        ]);

        return $this->sendResponse($success, 'Liste des Etablissements');
    }

    /**
     * count all establishment.
     *
     * @header Content-Type application/json
     */
    public function countEtablissement()
    {
        Log::debug('Récupération du nombre total d\'établissements', [
            'controller' => 'EtablissementController',
            'method' => 'countEtablissement'
        ]);

        $nbre_etablissements = Etablissement::count();
        $nbre_page = ceil($nbre_etablissements / 100);
        $success['nbre_etablissements'] = $nbre_etablissements;
        $success['nbre_page'] = $nbre_page;
        Log::info('Nombre total d\'établissements récupéré avec succès', [
            'controller' => 'EtablissementController',
            'method' => 'countEtablissement',
            'nombre_etablissements' => $nbre_etablissements,
            'nombre_pages' => $nbre_page
        ]);
        return $this->sendResponse($success, 'Nombre des Etablissements');
    }

    /**
     * Get all establishment by distance.
     *
     * @header Content-Type application/json
     * @queryParam user_id string id of user. Example: 1
     * @queryParam lat string required latitude. Example: 4.056
     * @queryParam lon string required longitude. Example: 8.056
     */
    public function getEtablissementByDistance(Request $request)
    {
        Log::debug('Récupération de la liste des établissements par distance', [
            'controller' => 'EtablissementController',
            'method' => 'getEtablissementByDistance',
            'lat' => $request->lat,
            'lon' => $request->lon,
            'user_id' => $request->user_id
        ]);
        $lat = $request->lat;
        $lon = $request->lon;

        $sqlDistance =  DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(CAST(batiments.latitude as DOUBLE PRECISION))) 
                * cos( radians(CAST(batiments.longitude as DOUBLE PRECISION)) - radians(" . $lon . ")) 
                + sin(radians(" . $lat . ")) 
                * sin(radians(CAST(batiments.latitude as DOUBLE PRECISION)))) AS distance");


        $etablissements =  DB::table('etablissements')
            ->join('batiments', 'etablissements.batiment_id', '=', 'batiments.id')
            ->select(
                'etablissements.*'
            )
            ->selectRaw($sqlDistance)
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

        Log::info('Liste des établissements par distance récupérée avec succès', [
            'controller' => 'EtablissementController',
            'method' => 'getEtablissementByDistance',
            'nombre_etablissements' => count($etablissements)
        ]);

        return $this->sendResponse($success, 'Liste des Etablissements');
    }

    /**
     * Add a new establishment.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam nom string required the name of the establishment. Example: Sogefi
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
        Log::debug('Tentative de création d\'un établissement', [
            'controller' => 'EtablissementController',
            'method' => 'store',
            'inputs' => $request->all()
        ]);

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

            // Log du début de la transaction
            Log::debug('Début de transaction pour la création d\'un établissement', [
                'controller' => 'EtablissementController',
                'method' => 'store',
                'batiment_id' => $request->batiment_id
            ]);


            DB::beginTransaction();


            $etablissement = $batiment->etablissements()->create($input);



            if ($request->idSousCategorie != null) {
                $idSousCategories = explode(",", $request->idSousCategorie);
                $sousCategories = SousCategorie::find($idSousCategories);
                $etablissement->sousCategories()->attach($sousCategories);
            }



            DB::commit();


            $success['etablissement'] = $etablissement;

            Log::info('Etablissement créé avec succès', [
                'controller' => 'EtablissementController',
                'method' => 'store',
                'etablissement_id' => $etablissement->id,
                'etablissement_nom' => $etablissement->nom
            ]);

            return $this->sendResponse($success, "Création de l'etablissement reussie", 201);
        } catch (\Exception $ex) {
            // Log de l'erreur
            Log::error('Erreur lors de la création d\'un établissement', [
                'controller' => 'EtablissementController',
                'method' => 'store',
                'exception' => $ex->getMessage(),
                'trace' => $ex->getTraceAsString()
            ]);
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
        Log::debug('Récupération des détails d\'un établissement', [
            'controller' => 'EtablissementController',
            'method' => 'show',
            'etablissement_id' => $id,
            'user_id' => $request->user_id
        ]);
        $etablissement = Etablissement::find($id);


        if ($request->user_id) {
            $etablissement->isFavoris = $this->checkIfEtablissementInFavoris($id, $request->user_id);
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
        $etablissement['sousCategories'] = $etablissement->sousCategories;

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

        Log::info('Détails de l\'établissement récupérés avec succès', [
            'controller' => 'EtablissementController',
            'method' => 'show',
            'etablissement_id' => $id,
            'etablissement_nom' => $etablissement->nom
        ]);


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
        Log::debug('Tentative de mise à jour d\'un établissement', [
            'controller' => 'EtablissementController',
            'method' => 'update',
            'etablissement_id' => $id,
            'inputs' => $request->all()
        ]);
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

            Log::info('Etablissement mis à jour avec succès', [
                'controller' => 'EtablissementController',
                'method' => 'update',
                'etablissement_id' => $etablissement->id,
                'etablissement_nom' => $etablissement->nom
            ]);

            return $this->sendResponse($success, "Update Success", 201);
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error('Erreur lors de la mise à jour d\'un établissement', [
                'controller' => 'EtablissementController',
                'method' => 'update',
                'etablissement_id' => $id,
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);
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
        Log::debug('Tentative de suppression d\'un établissement', [
            'controller' => 'EtablissementController',
            'method' => 'destroy',
            'etablissement_id' => $id
        ]);
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

                // Log de la réussite de la suppression
                Log::info('Etablissement supprimé avec succès', [
                    'controller' => 'EtablissementController',
                    'method' => 'destroy',
                    'etablissement_id' => $id
                ]);

                return $this->sendResponse("", "Delete Success", 201);
            } catch (\Throwable $th) {
                // Log de l'erreur
                Log::error('Erreur lors de la suppression d\'un établissement', [
                    'controller' => 'EtablissementController',
                    'method' => 'destroy',
                    'etablissement_id' => $id,
                    'exception' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ]);
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
        Log::debug('Tentative de recherche d\'établissements', [
            'controller' => 'EtablissementController',
            'method' => 'search',
            'query' => $request->q,
            'user_id' => $request->user_id
        ]);
        $q = $request->input('q');
        $cacheKey = 'search query:' . $q;

        // Vérifier si les résultats sont en cache
        $cachedResults = Redis::get($cacheKey);
        if ($cachedResults) {
            Log::info('Résultats de recherche récupérés à partir du cache', [
                'controller' => 'EtablissementController',
                'method' => 'search',
                'cache_key' => $cacheKey
            ]);
            return $this->sendResponse(json_decode($cachedResults), 'Résultats de la recherche dans le cache');
        }



        // Recherche des lieux dits via Nominatim
        $nominatimResponse = Http::get(env('NOMINATIM_URL') . '/search', [
            'q' => $q,
            'format' => 'json',
            'polygon' => 0,
            'addressdetails' => 1,
            'countrycodes' => 'cm'
        ]);
        $places = $nominatimResponse->json();



        $etablissements = Etablissement::search($q)->paginate(30);

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
            $etablissement['sousCategories'] = $etablissement->sousCategories;



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
        $success['places'] = $places ?? [];

        Log::info('Résultats de recherche récupérés avec succès', [
            'controller' => 'EtablissementController',
            'method' => 'search',
            'nombre_etablissements' => count($etablissements),
            'query' => $q
        ]);

        // Mettre les résultats en cache pendant une durée spécifique (par exemple, 1 heure)
        Redis::setex($cacheKey, 3600, json_encode($success));

        Log::info('Résultats de recherche enregistrés dans le cache', [
            'controller' => 'EtablissementController',
            'method' => 'search',
            'cache_key' => $cacheKey
        ]);

        return $this->sendResponse($success, 'Resultats de la recherche');
    }

    /**
     * Search Establishment by Filter.
     *
     * @header Content-Type application/json
     * @queryParam user_id string id of user conncted . Example: 1
     * @queryParam id_categorie string required id of categorie . Example: 1
     * @queryParam commodites string commodites recherchées. Example: Wifi;Parking
     * @queryParam lat string required latitude. Example: 4.056
     * @queryParam lon string required longitude. Example: 8.056
     * @queryParam ville string ville. Example: Bameka
     */
    public function filterSearch(Request $request)
    {
        Log::debug('Tentative de recherche d\'établissements par filtre', [
            'controller' => 'EtablissementController',
            'method' => 'filterSearch',
            'id_categorie' => $request->id_categorie,
            'commodites' => $request->commodites,
            'lat' => $request->lat,
            'lon' => $request->lon,
            'ville' => $request->ville,
            'user_id' => $request->user_id
        ]);
        $idcategorie = $request->input('id_categorie');
        $commodites = $request->input('commodites');
        $lat = $request->input('lat');
        $lon = $request->input('lon');
        $ville = $request->input('ville');

        // Calcul de la distance
        $sqlDistance = DB::raw("6371 * acos(cos(radians($lat))
        * cos(radians(CAST(batiments.latitude as DOUBLE PRECISION)))
        * cos(radians(CAST(batiments.longitude as DOUBLE PRECISION)) - radians($lon))
        + sin(radians($lat))
        * sin(radians(CAST(batiments.latitude as DOUBLE PRECISION)))) AS distance");

        // Requête Eloquent avec le constructeur de requête
        $query = Etablissement::query();
        $query->select('etablissements.*', $sqlDistance);
        $query->join('batiments', 'etablissements.batiment_id', '=', 'batiments.id');
        $query->join('sous_categories_etablissements', 'etablissements.id', '=', 'sous_categories_etablissements.etablissement_id');
        $query->join('sous_categories', 'sous_categories_etablissements.sous_categorie_id', '=', 'sous_categories.id');
        $query->join('categories', 'sous_categories.categorie_id', '=', 'categories.id');
        $query->where('categories.id', '=', $idcategorie);

        if ($commodites != null) {
            $query->where('etablissements.commodites', 'like', '%' . $commodites . '%');
        }

        if ($ville != null) {
            $query->where('batiments.ville', 'like', '%' . $ville . '%');
        }

        $etablissements = $query->orderBy('distance', 'ASC')->distinct()->paginate(50);


        // Ajout des autres paramètres à la réponse
        foreach ($etablissements as $etablissement) {
            $etablissement->distance = $etablissement->distance;


            $etablissement->batiment = $etablissement->batiment;


            if ($request->user_id) {
                $etablissement->isFavoris = $this->checkIfEtablissementInFavoris($etablissement->id, $request->user_id);
            } else {
                $etablissement->isFavoris = false;
            }



            $etablissement->isopen = $this->checkIfEtablissementIsOpen($etablissement->id);
            $etablissement->moyenne = $this->getMoyenneRatingByEtablissmeent($etablissement->id);
            $etablissement->avis = $this->getCommentNumberByEtablissmeent($etablissement->id);
            $etablissement->count = $this->countOccurenceRatingInCommentTableByEtablissement($etablissement->id);

            $etab = Etablissement::find($etablissement->id);

            $etablissement['sousCategories'] = $etab->sousCategories;



            foreach ($etablissement->sousCategories as $sousCategories) {
                $sousCategories->categorie;
            }

            $etablissement->commodites = $etab->commodites;
            $etablissement->images = $etab->images;
            $etablissement->horaires = $etab->horaires;
            $etablissement->commentaires = $etab->commentaires;

            foreach ($etablissement->commentaires as $commentaires) {
                $commentaires->user;
            }
        }

        $success['etablissements'] = $etablissements;

        Log::info('Résultats de recherche par filtre récupérés avec succès', [
            'controller' => 'EtablissementController',
            'method' => 'filterSearch',
            'nombre_etablissements' => count($etablissements),
            'id_categorie' => $idcategorie,
            'commodites' => $commodites,
            'lat' => $lat,
            'lon' => $lon,
            'ville' => $ville
        ]);

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
        Log::debug('Tentative d\'ajout d\'un établissement aux favoris', [
            'controller' => 'EtablissementController',
            'method' => 'addFavorite',
            'etablissement_id' => $request->etablissement_id
        ]);
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

        Log::info('Etablissement ajouté aux favoris avec succès', [
            'controller' => 'EtablissementController',
            'method' => 'addFavorite',
            'etablissement_id' => $etablissement_id,
            'user_id' => $user->id
        ]);

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
        Log::debug('Tentative de suppression d\'un établissement des favoris', [
            'controller' => 'EtablissementController',
            'method' => 'removeFavorite',
            'etablissement_id' => $request->etablissement_id
        ]);
        $user = Auth::user();
        $etablissement_id = $request->etablissement_id;

        $favorite = UserFavoris::where('etablissement_id', $etablissement_id)->where('user_id', $user->id)->first();

        if (!$favorite) {
            return $this->sendError('Etablissement n\'est pas dans vos favoris', [], 200);
        }

        $favorite->delete();

        $success['favorite'] = $favorite;

        Log::info('Etablissement retiré des favoris avec succès', [
            'controller' => 'EtablissementController',
            'method' => 'removeFavorite',
            'etablissement_id' => $etablissement_id,
            'user_id' => $user->id
        ]);

        return $this->sendResponse($success, 'Etablissement retiré des favoris');
    }

    /**
     * Update vues Establishment.
     *
     * @urlParam etablissement_id int required . Example: 1
     */
    public function updateVues($etablissement_id)
    {
        Log::debug('Tentative de mise à jour des vues d\'un établissement', [
            'controller' => 'EtablissementController',
            'method' => 'updateVues',
            'etablissement_id' => $etablissement_id
        ]);

        $etablissement = Etablissement::find($etablissement_id);

        $etablissement->vues = $etablissement->vues + 1;
        $etablissement->save();

        $success['etablissement'] = $etablissement;

        Log::info('Vues de l\'établissement mises à jour avec succès', [
            'controller' => 'EtablissementController',
            'method' => 'updateVues',
            'etablissement_id' => $etablissement_id,
            'vues' => $etablissement->vues
        ]);

        return $this->sendResponse($success, 'Vues du Etablissement incrémentées');
    }

    /**
     * Update Etablishment Cover
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the Picture. Example: 1
     * @bodyParam cover file picture.
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     */
    public function updateCover(Request $request, $etablissement_id)
    {
        Log::debug('Tentative de mise à jour de la couverture d\'un établissement', [
            'controller' => 'EtablissementController',
            'method' => 'updateCover',
            'etablissement_id' => $etablissement_id,
            'inputs' => $request->all()
        ]);
        Auth::user();
        $etablissement = Etablissement::find($etablissement_id);

        $request->validate([
            'cover' => 'mimes:png,jpg,jpeg|max:20000',
        ]);
        try {


            $batiment = $etablissement->batiment;

            if ($request->file()) {
                $fileName = time() . '_' . $request->cover->getClientOriginalName();
                $filePath = $request->file('cover')->storeAs('uploads/batiments/images/' . $batiment->code . '/' . $etablissement->nom, $fileName, 'public');
                $etablissement->cover = '/storage/' . $filePath;
            }

            $etablissement->save();

            $success['etablissement'] = $etablissement;

            Log::info('Couverture de l\'établissement mise à jour avec succès', [
                'controller' => 'EtablissementController',
                'method' => 'updateCover',
                'etablissement_id' => $etablissement->id,
                'cover_path' => $etablissement->cover
            ]);


            return $this->sendResponse($success, "Update success", 201);
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error('Erreur lors de la mise à jour de la couverture d\'un établissement', [
                'controller' => 'EtablissementController',
                'method' => 'updateCover',
                'etablissement_id' => $etablissement_id,
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);
            return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
        }
    }

    /**
     * Global Search.
     *
     * @header Content-Type application/json
     * @queryParam q string required search value. Example: piscine
     * @queryParam user_id string id of user. Example: 1
     */
    public function globalsearch(Request $request)
    {
        Log::debug('Tentative de recherche globale', [
            'controller' => 'EtablissementController',
            'method' => 'globalsearch',
            'query' => $request->q,
            'user_id' => $request->user_id
        ]);
        $q = $request->input('q');
        $user_id = $request->user_id;
        $cacheKey = 'search global:' . $q;

        // Vérifier si les résultats sont en cache
        $cachedResults = Redis::get($cacheKey);
        if ($cachedResults) {
            Log::info('Résultats de recherche globale récupérés à partir du cache', [
                'controller' => 'EtablissementController',
                'method' => 'globalsearch',
                'cache_key' => $cacheKey
            ]);
            return $this->sendResponse(json_decode($cachedResults), 'Résultats de la recherche dans le cache');
        }

        // Recherche des établissements
        $etablissements = Etablissement::search($q)->get();

        foreach ($etablissements as $etablissement) {
            $etablissement->isFavoris = $user_id ? $this->checkIfEtablissementInFavoris($etablissement->id, $user_id) : false;
            $etablissement->moyenne = $this->getMoyenneRatingByEtablissmeent($etablissement->id);
            $etablissement->isopen = $this->checkIfEtablissementIsOpen($etablissement->id);
            $etablissement->avis = $this->getCommentNumberByEtablissmeent($etablissement->id);
            $etablissement->count = $this->countOccurenceRatingInCommentTableByEtablissement($etablissement->id);
            $etablissement->batiment;

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

        // Recherche des données osm
        $osmDatas = OsmData::search($q)->get();

        // Ajouter des informations sur la catégorie dans chaque objet osmData
        foreach ($osmDatas as $osmData) {
            $sousCategorie = SousCategorie::find($osmData->sous_categorie_id);
            $osmData->categorie = $sousCategorie ? $sousCategorie->categorie : null;
        }

        // Collecter les osm_id existants
        $existingOsmIds = $osmDatas->pluck('osm_id')->toArray();

        // Recherche des lieux dits via Nominatim
        $nominatimResponse = Http::get(env('NOMINATIM_URL') . '/search', [
            'q' => $q,
            'format' => 'json',
            'polygon' => 0,
            'addressdetails' => 1,
            'countrycodes' => 'cm'
        ]);
        $places = $nominatimResponse->json();

        // Exclure les résultats de Nominatim si leur osm_id est déjà présent dans osmDatas
        $places = array_filter($places, function ($place) use ($existingOsmIds) {
            return !in_array((string) $place['osm_id'], $existingOsmIds);
        });

        // Combiner les résultats
        $results = [
            'etablissements' => $etablissements,
            'osmDatas' => $osmDatas,
            'places' => array_values($places) // Réindexer les résultats
        ];

        // Log des résultats de recherche
        Log::info('Résultats de recherche globale récupérés avec succès', [
            'controller' => 'EtablissementController',
            'method' => 'globalsearch',
            'nombre_etablissements' => count($etablissements),
            'nombre_osmDatas' => count($osmDatas),
            'query' => $q
        ]);

        // Mettre les résultats en cache pendant une durée spécifique (par exemple, 1 heure)
        Redis::setex($cacheKey, 3600, json_encode($results));

        Log::info('Résultats de recherche globale enregistrés dans le cache', [
            'controller' => 'EtablissementController',
            'method' => 'globalsearch',
            'cache_key' => $cacheKey
        ]);

        return $this->sendResponse($results, 'Résultats de la recherche');
    }

    /**
     * Global Search.
     *
     * @header Content-Type application/json
     * @queryParam q string required search value. Example: piscine
     */
    public function nominatimSearch(Request $request)
    {
        Log::debug('Tentative de recherche Nominatim', [
            'controller' => 'EtablissementController',
            'method' => 'nominatimSearch',
            'query' => $request->q
        ]);
        $q = $request->input('q');
        $cacheKey = 'searchNominatim:' . $q;

        // Vérifier si les résultats sont en cache
        $cachedResults = Redis::get($cacheKey);
        if ($cachedResults) {
            Log::info('Résultats de recherche Nominatim récupérés à partir du cache', [
                'controller' => 'EtablissementController',
                'method' => 'nominatimSearch',
                'cache_key' => $cacheKey
            ]);
            return $this->sendResponse(json_decode($cachedResults), 'Résultats de la recherche dans le cache');
        }

        // Recherche des lieux dits via Nominatim
        $nominatimResponse = Http::get(env('NOMINATIM_URL') . '/search', [
            'q' => $q,
            'format' => 'json',
            'polygon' => 0,
            'addressdetails' => 1,
            'countrycodes' => 'cm'
        ]);
        $places = $nominatimResponse->json();

        // Log des résultats de recherche
        Log::info('Résultats de recherche Nominatim récupérés avec succès', [
            'controller' => 'EtablissementController',
            'method' => 'nominatimSearch',
            'nombre_lieux_dits' => count($places),
            'query' => $q
        ]);

        // Mettre les résultats en cache pendant une durée spécifique (par exemple, 1 heure)
        Redis::setex($cacheKey, 3600, json_encode($places ?? []));

        Log::info('Résultats de recherche Nominatim enregistrés dans le cache', [
            'controller' => 'EtablissementController',
            'method' => 'nominatimSearch',
            'cache_key' => $cacheKey
        ]);

        return $this->sendResponse($places, 'Résultats de la recherche');
    }

    /**
     * Nominatim Reverse Search.
     * @header Content-Type application/json
     * @queryParam lat string required latitude. Example: 4.056
     * @queryParam lon string required longitude. Example: 8.056
     */
    public function nominatimReverseSearch(Request $request)
    {
        Log::debug('Tentative de recherche inversée Nominatim', [
            'controller' => 'EtablissementController',
            'method' => 'nominatimReverseSearch',
            'lat' => $request->lat,
            'lon' => $request->lon
        ]);
        $lat = $request->input('lat');
        $lon = $request->input('lon');
        $cacheKey = 'reverseSearch:' . $lat . ',' . $lon;

        // Vérifier si les résultats sont en cache
        $cachedResults = Redis::get($cacheKey);
        if ($cachedResults) {
            Log::info('Résultats de recherche inversée Nominatim récupérés à partir du cache', [
                'controller' => 'EtablissementController',
                'method' => 'nominatimReverseSearch',
                'cache_key' => $cacheKey
            ]);
            return $this->sendResponse(json_decode($cachedResults), 'Résultats de la recherche dans le cache');
        }

        // Recherche des lieux dits via Nominatim
        $nominatimResponse = Http::get(env('NOMINATIM_URL') . '/reverse', [
            'lat' => $lat,
            'lon' => $lon,
            'format' => 'json',
            'addressdetails' => 1
        ]);
        $place = $nominatimResponse->json();

        // Log des résultats de recherche
        Log::info('Résultats de recherche inversée Nominatim récupérés avec succès', [
            'controller' => 'EtablissementController',
            'method' => 'nominatimReverseSearch',
            'place_id' => $place['place_id'] ?? null,
            'lat' => $lat,
            'lon' => $lon
        ]);

        // Mettre les résultats en cache pendant une durée spécifique (par exemple, 1 heure)
        Redis::setex($cacheKey, 3600, json_encode($place));

        Log::info('Résultats de recherche inversée Nominatim enregistrés dans le cache', [
            'controller' => 'EtablissementController',
            'method' => 'nominatimReverseSearch',
            'cache_key' => $cacheKey
        ]);

        return $this->sendResponse($place, 'Résultats de la recherche');
    }

    /**
     * Get Nearby Etablissement.
     *
     * @header Content-Type application/json
     * @queryParam lat string required latitude. Example: 4.056
     * @queryParam lon string required longitude. Example: 8.056
     */
    public function getNearbyEtablissement(Request $request)
    {
        Log::debug('Tentative de recherche d\'établissements à proximité', [
            'controller' => 'EtablissementController',
            'method' => 'getNearbyEtablissement',
            'lat' => $request->lat,
            'lon' => $request->lon
        ]);
        $lat = $request->input('lat');
        $lon = $request->input('lon');
        $radius = 0.1; // Rayon de recherche en kilomètres (100 mètres = 0.1 kilomètres)

        // Calcul de la distance en kilomètres entre le point donné et les bâtiments dans la base de données
        $sqlDistance = DB::raw("6371 * acos(cos(radians($lat))
        * cos(radians(CAST(batiments.latitude as DOUBLE PRECISION)))
        * cos(radians(CAST(batiments.longitude as DOUBLE PRECISION)) - radians($lon))
        + sin(radians($lat))
        * sin(radians(CAST(batiments.latitude as DOUBLE PRECISION)))) AS distance");

        // Requête pour obtenir les établissements dans un rayon de 100 mètres
        $etablissements = Etablissement::select('etablissements.*', 'batiments.ville', 'batiments.quartier', $sqlDistance)
            ->join('batiments', 'etablissements.batiment_id', '=', 'batiments.id')
            ->orderBy('distance', 'ASC')
            ->get();

        // Si un ou plusieurs établissements sont trouvés, retourner le plus proche
        if ($etablissements->isNotEmpty() && $etablissements->first()->distance < $radius) {
            $etablissement = $etablissements->first();
            $result = [
                'etablissement_id' => $etablissement->id,
                'place_id' => null,
                'type' => 'etablissement',
                'lon' => $lon,
                'lat' => $lat,
                'name' => $etablissement->nom,
                'distance' => $etablissement->distance,
                'ville' => $etablissement->ville,
                'quartier' => $etablissement->quartier,
            ];

            // Log des résultats de recherche
            Log::info('Résultats de recherche d\'établissements à proximité récupérés avec succès', [
                'controller' => 'EtablissementController',
                'method' => 'getNearbyEtablissement',
                'etablissement_id' => $etablissement->id,
                'distance' => $etablissement->distance
            ]);

            return $this->sendResponse($result, 'Résultats de la recherche');
        }

        // Si aucun établissement n'est trouvé, faire une requête à l'API Nominatim pour obtenir des lieux dits
        $nominatimResponse = Http::get(env('NOMINATIM_URL') . '/reverse', [
            'lat' => $lat,
            'lon' => $lon,
            'format' => 'json',
            'addressdetails' => 1
        ]);
        $place = $nominatimResponse->json();

        // Si Nominatim retourne un résultat, calculer la distance et le retourner
        if (!empty($place)) {
            $placeLat = $place['lat'];
            $placeLon = $place['lon'];
            $distance = $this->calculateDistance($lat, $lon, $placeLat, $placeLon);
            $result = [
                'etablissement_id' => null,
                'place_id' => $place['place_id'],
                'type' => 'place',
                'lon' => $placeLon,
                'lat' => $placeLat,
                'name' => $place['display_name'],
                'distance' => $distance,
                'ville' => $place['address']['city'] ?? null,
                'quartier' => $place['address']['suburb'] ?? null,
            ];

            // Log des résultats de recherche
            Log::info('Résultats de recherche de lieux dits à proximité récupérés avec succès', [
                'controller' => 'EtablissementController',
                'method' => 'getNearbyEtablissement',
                'place_id' => $place['place_id'],
                'distance' => $distance
            ]);

            return $this->sendResponse($result, 'Résultats de la recherche');
        }

        // Si aucun résultat n'est trouvé, retourner null
        return $this->sendError('Aucun résultat trouvé', [], 404);
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {

        $earthRadius = 6371; // Rayon de la Terre en kilomètres

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c; // Distance en kilomètres
    }
}
