<?php

namespace App\Http\Controllers\Api;

use App\Models\Categorie;
use App\Models\SousCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 *
 * @group SubCategory management
 *
 * APIs for managing SubCategory
 */
class SousCategorieController extends BaseController
{
    /**
     * Get all SubCategory.
     *
     * @header Content-Type application/json
     */
    public function index()
    {
        // Log du début de la requête
        Log::debug('Récupération de la liste des sous-catégories', ['controller' => 'SousCategorieController', 'method' => 'index']);
        $souscategories = SousCategorie::all();

        foreach ($souscategories as  $souscategorie) {
            $souscategorie->categorie;
        }

        $success['sous_categories'] = $souscategories;

        // Log du nombre de sous-catégories récupérées
        Log::info('Liste des sous-catégories récupérée', [
            'controller' => 'SousCategorieController',
            'method' => 'index',
            'count' => count($souscategories)
        ]);

        return $this->sendResponse($success, 'Liste des Sous-Categories');
    }

    /**
     * Add a new SubCategory.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam nom string required the name of the subcategory. Example: Achat
     * @bodyParam categorie_id int required the id of the category. Example: 5
     * @bodyParam logourl file the picture of the subcategory
     * @bodyParam logourlmap file the picture of the subcategory
     * @bodyParam color string the color of the subcategory
     */
    public function store(Request $request)
    {
        // Log du début de la création
        Log::debug('Tentative de création d\'une sous-catégorie', [
            'controller' => 'SousCategorieController',
            'method' => 'store',
            'inputs' => $request->all()
        ]);
        $validator =  Validator::make($request->all(), [
            'nom' => 'required',
            'categorie_id' => 'required',
            'logourl' => 'mimes:png,jpg,jpeg,svg|max:20000',
            'logourlmap' => 'mimes:png,jpg,jpeg,svg|max:20000',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $current_id = DB::table('sous_categories')->max('id');

        $log_id = $current_id + 1;

        $input['id'] = $log_id;
        $input['nom'] = $request->nom;
        $input['color'] = $request->color;
        $categorie = Categorie::find($request->categorie_id);

        if ($request->file()) {
            $fileName = time() . '_' . $request->logourl->getClientOriginalName();
            $filePath = $request->file('logourl')->storeAs('uploads/categories/logos/' . $categorie->nom . '/' . $request->nom, $fileName, 'public');
            $input['logourl'] = '/storage/' . $filePath;
        }

        if ($request->file()) {
            $fileName = time() . '_' . $request->logourlmap->getClientOriginalName();
            $filePathMap = $request->file('logourlmap')->storeAs('uploads/categories/logos/' . $categorie->nom . '/' . $request->nom, $fileName, 'public');
            $input['logourlmap'] = '/storage/' . $filePathMap;
        }

        try {

            $souscategorie = $categorie->sousCategories()->create($input);
            $souscategorie->categorie;


            $success['sous_categorie'] = $souscategorie;

            // Log du succès de la création
            Log::info('Sous-catégorie créée avec succès', [
                'controller' => 'SousCategorieController',
                'method' => 'store',
                'sous_categorie_id' => $souscategorie->id,
                'sous_categorie_nom' => $souscategorie->nom
            ]);


            return $this->sendResponse($success, "Création de la Sous catégorie reussie", 201);
        } catch (\Exception $ex) {
            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show SubCategory by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the subcategory. Example: 2
     */
    public function show($id)
    {
        // Log de la demande de détails
        Log::debug('Récupération des détails d\'une sous-catégorie', [
            'controller' => 'SousCategorieController',
            'method' => 'show',
            'sous_categorie_id' => $id
        ]);
        $souscategorie = SousCategorie::find($id);

        $souscategorie->categorie;


        $success['sous_categorie'] = $souscategorie;

        // Log du succès de la récupération
        Log::info('Détails de la sous-catégorie récupérés', [
            'controller' => 'SousCategorieController',
            'method' => 'show',
            'sous_categorie_id' => $id,
            'sous_categorie_nom' => $souscategorie->nom
        ]);

        return $this->sendResponse($success, 'SousCategorie');
    }

    /**
     * Update SubCategory.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the subcategory. Example: 2
     * @bodyParam nom string the name of the subcategory. Example: Achat
     * @bodyParam logourl file the picture of the subcategory
     * @bodyParam logourlmap file the picture of the subcategory
     * @bodyParam color string the color of the subcategory
     * @bodyParam idcategorie int the id of the category. Example: 5
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     */
    public function update(Request $request, $id)
    {
        // Log du début de la mise à jour
        Log::debug('Tentative de mise à jour d\'une sous-catégorie', [
            'controller' => 'SousCategorieController',
            'method' => 'update',
            'sous_categorie_id' => $id,
            'inputs' => $request->all()
        ]);
        $souscategorie = SousCategorie::find($id);
        $categorie = $souscategorie->categorie;
        $request->validate([
            'logourl' => 'mimes:png,jpg,jpeg,svg|max:20000',
            'logourlmap' => 'mimes:png,jpg,jpeg,svg|max:20000',
        ]);

        if ($request->file()) {
            $fileName = time() . '_' . $request->logourl->getClientOriginalName();
            $filePath = $request->file('logourl')->storeAs('uploads/categories/logos/' . $categorie->nom . '/' . $souscategorie->nom, $fileName, 'public');
            $souscategorie->logourl = '/storage/' . $filePath;
        }

        if ($request->file()) {
            $fileName = time() . '_' . $request->logourlmap->getClientOriginalName();
            $filePath = $request->file('logourlmap')->storeAs('uploads/categories/logos/' . $categorie->nom . '/' . $souscategorie->nom, $fileName, 'public');
            $souscategorie->logourlmap = '/storage/' . $filePath;
        }


        try {

            $souscategorie->nom = $request->nom ?? $souscategorie->nom;

            $souscategorie->color = $request->color ?? $souscategorie->color;

            $souscategorie->categorie;

            $souscategorie->save();

            $success['sous_categorie'] = $souscategorie;

            // Log du succès de la mise à jour
            Log::info('Sous-catégorie mise à jour avec succès', [
                'controller' => 'SousCategorieController',
                'method' => 'update',
                'sous_categorie_id' => $souscategorie->id,
                'sous_categorie_nom' => $souscategorie->nom
            ]);


            return $this->sendResponse($success, "Update Success", 201);
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error('Erreur lors de la mise à jour d\'une sous-catégorie', [
                'controller' => 'SousCategorieController',
                'method' => 'update',
                'sous_categorie_id' => $id,
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);
            return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
        }
    }

    /**
     * Delete Category.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the subcategory. Example: 2
     */
    public function destroy($id)
    {
        // Log de la tentative de suppression
        Log::debug('Tentative de suppression d\'une sous-catégorie', [
            'controller' => 'SousCategorieController',
            'method' => 'destroy',
            'sous_categorie_id' => $id
        ]);
        $souscategorie = SousCategorie::find($id);

        try {

            $souscategorie->delete();

            Log::info('Sous-catégorie supprimée avec succès', [
                'controller' => 'SousCategorieController',
                'method' => 'destroy',
                'sous_categorie_id' => $id
            ]);

            return $this->sendResponse("", "Delete Success", 201);
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error('Erreur lors de la suppression d\'une sous-catégorie', [
                'controller' => 'SousCategorieController',
                'method' => 'destroy',
                'sous_categorie_id' => $id,
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);
            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }

    /**
     * Search SubCategory.
     *
     * @header Content-Type application/json
     * @queryParam q string required search value. Example: piscine
     */
    public function search(Request $request)
    {
        // Log de la recherche
        Log::debug('Recherche de sous-catégories', [
            'controller' => 'SousCategorieController',
            'method' => 'search',
            'query' => $request->input('q')
        ]);
        $q = $request->input('q');
        $souscategories = SousCategorie::search($q)->get();

        foreach ($souscategories as  $souscategorie) {
            $souscategorie->categorie;
        }

        $success['sous_categories'] = $souscategories;

        // Log du nombre de sous-catégories trouvées
        Log::info('Sous-catégories trouvées', [
            'controller' => 'SousCategorieController',
            'method' => 'search',
            'count' => count($souscategories)
        ]);

        return $this->sendResponse($success, 'Liste des Sous-Categories');
    }
}
