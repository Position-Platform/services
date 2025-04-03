<?php

namespace App\Http\Controllers\Api;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 *
 * @group Category management
 *
 * APIs for managing Category
 */
class CategorieController extends BaseController
{
    /**
     * Get all Category.
     *
     * @header Content-Type application/json
     */
    public function index()
    {
        // Log du début de la requête
        Log::debug('Récupération de la liste des catégories', [
            'controller' => 'CategorieController',
            'method' => 'index'
        ]);

        $categories = Categorie::orderBy('vues', 'DESC')->get();

        foreach ($categories as $categorie) {
            $categorie->sousCategories;
        }

        // Log du nombre de catégories récupérées
        Log::info('Liste des catégories récupérée', [
            'controller' => 'CategorieController',
            'method' => 'index',
            'count' => count($categories)
        ]);

        $success['categories'] = $categories;

        return $this->sendResponse($success, 'Liste des Categories');
    }

    /**
     * Add a new Category.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam nom string required the name of the category. Example: Achat
     * @bodyParam logourl file the picture of the category
     * @bodyParam logourlmap file the picture of the category
     * @bodyParam color string the color of the category
     */
    public function store(Request $request)
    {
        // Log du début de la création
        Log::debug('Tentative de création d\'une catégorie', [
            'controller' => 'CategorieController',
            'method' => 'store',
            'inputs' => $request->except(['logourl', 'logourlmap'])
        ]);

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'shortname' => 'required',
            'logourl' => 'mimes:png,jpg,jpeg,svg|max:20000',
            'logourlmap' => 'mimes:png,jpg,jpeg,svg|max:20000',
        ]);

        if ($validator->fails()) {
            // Log des erreurs de validation
            Log::warning('Validation échouée lors de la création d\'une catégorie', [
                'controller' => 'CategorieController',
                'method' => 'store',
                'errors' => $validator->errors()->toArray()
            ]);

            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $current_id = DB::table('categories')->max('id');

        $log_id = $current_id + 1;

        $input['id'] = $log_id;
        $input['nom'] = $request->nom;
        $input['shortname'] = $request->shortname;
        $input['color'] = $request->color;


        if ($request->file('logourl')) {
            $fileName = time() . '_' . $request->logourl->getClientOriginalName();
            $filePath = $request->file('logourl')->storeAs('uploads/categories/logos/' . $request->nom, $fileName, 'public');
            $input['logourl'] = '/storage/' . $filePath;

            // Log de l'upload de fichier
            Log::debug('Logo principal uploadé pour nouvelle catégorie', [
                'controller' => 'CategorieController',
                'method' => 'store',
                'filename' => $fileName,
                'path' => $filePath,
                'categorie_nom' => $request->nom
            ]);
        }

        if ($request->file('logourlmap')) {
            $fileName = time() . '_' . $request->logourlmap->getClientOriginalName();
            $filePathMap = $request->file('logourlmap')->storeAs('uploads/categories/logos/' . $request->nom, $fileName, 'public');
            $input['logourlmap'] = '/storage/' . $filePathMap;

            // Log de l'upload de fichier
            Log::debug('Logo map uploadé pour nouvelle catégorie', [
                'controller' => 'CategorieController',
                'method' => 'store',
                'filename' => $fileName,
                'path' => $filePathMap,
                'categorie_nom' => $request->nom
            ]);
        }

        try {
            $categorie = Categorie::create($input);

            // Log du succès de la création
            Log::info('Catégorie créée avec succès', [
                'controller' => 'CategorieController',
                'method' => 'store',
                'categorie_id' => $categorie->id,
                'categorie_nom' => $categorie->nom
            ]);

            $success['categorie'] = $categorie;

            return $this->sendResponse($success, "Création de la catégorie reussie", 201);
        } catch (\Exception $ex) {
            // Log de l'erreur
            Log::error('Erreur lors de la création d\'une catégorie', [
                'controller' => 'CategorieController',
                'method' => 'store',
                'exception' => $ex->getMessage(),
                'trace' => $ex->getTraceAsString()
            ]);

            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show Category by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the category. Example: 2
     */
    public function show($id)
    {
        // Log de la demande de détails
        Log::debug('Récupération des détails d\'une catégorie', [
            'controller' => 'CategorieController',
            'method' => 'show',
            'categorie_id' => $id
        ]);

        $categorie = Categorie::find($id);

        if (!$categorie) {
            Log::warning('Catégorie non trouvée', [
                'controller' => 'CategorieController',
                'method' => 'show',
                'categorie_id' => $id
            ]);
            return $this->sendError('Catégorie non trouvée', [], 404);
        }

        $categorie->sousCategories;

        // Log du succès de la récupération
        Log::info('Détails de la catégorie récupérés', [
            'controller' => 'CategorieController',
            'method' => 'show',
            'categorie_id' => $id,
            'categorie_nom' => $categorie->nom,
            'nombre_sous_categories' => count($categorie->sousCategories)
        ]);

        $success['categorie'] = $categorie;

        return $this->sendResponse($success, 'Categorie');
    }

    /**
     * Update Category.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the category. Example: 2
     * @bodyParam nom string the name of the category. Example: Achat
     * @bodyParam vues string count view. Example: true
     * @bodyParam logourl file the picture of the category
     * @bodyParam logourlmap file the picture of the category
     * @bodyParam color string the color of the category
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     */
    public function update(Request $request, $id)
    {
        // Log de la tentative de mise à jour
        Log::debug('Tentative de mise à jour d\'une catégorie', [
            'controller' => 'CategorieController',
            'method' => 'update',
            'categorie_id' => $id,
            'inputs' => $request->except(['logourl', 'logourlmap'])
        ]);

        $categorie = Categorie::find($id);

        if (!$categorie) {
            Log::warning('Tentative de mise à jour d\'une catégorie inexistante', [
                'controller' => 'CategorieController',
                'method' => 'update',
                'categorie_id' => $id
            ]);
            return $this->sendError('Catégorie non trouvée', [], 404);
        }

        $request->validate([
            'logourl' => 'mimes:png,jpg,jpeg,svg|max:20000',
            'logourlmap' => 'mimes:png,jpg,jpeg,svg|max:20000',
        ]);

        if ($request->file('logourl')) {
            $fileName = time() . '_' . $request->logourl->getClientOriginalName();
            $filePath = $request->file('logourl')->storeAs('uploads/categories/logos/' . $categorie->nom, $fileName, 'public');
            $categorie->logourl = '/storage/' . $filePath;

            // Log de l'upload de fichier
            Log::debug('Logo principal mis à jour pour catégorie', [
                'controller' => 'CategorieController',
                'method' => 'update',
                'categorie_id' => $id,
                'filename' => $fileName,
                'path' => $filePath
            ]);
        }

        if ($request->file('logourlmap')) {
            $fileName = time() . '_' . $request->logourlmap->getClientOriginalName();
            $filePathMap = $request->file('logourlmap')->storeAs('uploads/categories/logos/' . $categorie->nom, $fileName, 'public');
            $categorie->logourlmap = '/storage/' . $filePathMap;

            // Log de l'upload de fichier
            Log::debug('Logo map mis à jour pour catégorie', [
                'controller' => 'CategorieController',
                'method' => 'update',
                'categorie_id' => $id,
                'filename' => $fileName,
                'path' => $filePathMap
            ]);
        }

        try {
            // Log des anciennes valeurs avant mise à jour
            Log::debug('Anciennes valeurs de la catégorie', [
                'controller' => 'CategorieController',
                'method' => 'update',
                'categorie_id' => $id,
                'old_values' => [
                    'nom' => $categorie->nom,
                    'shortname' => $categorie->shortname,
                    'color' => $categorie->color,
                    'vues' => $categorie->vues
                ]
            ]);

            $categorie->nom = $request->nom ?? $categorie->nom;
            $categorie->shortname = $request->shortname ?? $categorie->shortname;
            $categorie->color = $request->color ?? $categorie->color;

            if ($request->vues) {
                $categorie->vues = $categorie->vues + 1;

                // Log de l'incrémentation des vues
                Log::debug('Incrémentation des vues de la catégorie', [
                    'controller' => 'CategorieController',
                    'method' => 'update',
                    'categorie_id' => $id,
                    'old_vues' => $categorie->vues - 1,
                    'new_vues' => $categorie->vues
                ]);
            }

            $categorie->save();

            // Log du succès de la mise à jour
            Log::info('Catégorie mise à jour avec succès', [
                'controller' => 'CategorieController',
                'method' => 'update',
                'categorie_id' => $id,
                'new_values' => [
                    'nom' => $categorie->nom,
                    'shortname' => $categorie->shortname,
                    'color' => $categorie->color,
                    'vues' => $categorie->vues
                ]
            ]);

            $success['categorie'] = $categorie;

            return $this->sendResponse($success, "Update Success", 201);
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error('Erreur lors de la mise à jour d\'une catégorie', [
                'controller' => 'CategorieController',
                'method' => 'update',
                'categorie_id' => $id,
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);

            return $this->sendError('Erreur.', ['error' => $th->getMessage()], 400);
        }
    }

    /**
     * Delete Category.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the category. Example: 2
     */
    public function destroy($id)
    {
        // Log de la tentative de suppression
        Log::debug('Tentative de suppression d\'une catégorie', [
            'controller' => 'CategorieController',
            'method' => 'destroy',
            'categorie_id' => $id
        ]);

        $categorie = Categorie::find($id);

        if (!$categorie) {
            Log::warning('Tentative de suppression d\'une catégorie inexistante', [
                'controller' => 'CategorieController',
                'method' => 'destroy',
                'categorie_id' => $id
            ]);
            return $this->sendError('Catégorie non trouvée', [], 404);
        }

        try {
            DB::beginTransaction();

            // Log du début de la transaction
            Log::debug('Début de transaction pour suppression de catégorie', [
                'controller' => 'CategorieController',
                'method' => 'destroy',
                'categorie_id' => $id,
                'categorie_nom' => $categorie->nom,
                'nombre_sous_categories' => count($categorie->sousCategories)
            ]);

            $categorie->sousCategories()->delete();
            $categorie->delete();

            DB::commit();

            // Log du succès de la suppression
            Log::info('Catégorie supprimée avec succès', [
                'controller' => 'CategorieController',
                'method' => 'destroy',
                'categorie_id' => $id,
                'categorie_nom' => $categorie->nom
            ]);

            return $this->sendResponse("", "Delete Success", 201);
        } catch (\Throwable $th) {
            DB::rollBack();

            // Log de l'erreur
            Log::error('Erreur lors de la suppression d\'une catégorie', [
                'controller' => 'CategorieController',
                'method' => 'destroy',
                'categorie_id' => $id,
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);

            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }

    /**
     * Search Category.
     *
     * @header Content-Type application/json
     * @queryParam q string required search value. Example: achats
     */
    public function search(Request $request)
    {
        $q = $request->input('q');

        // Log de la recherche
        Log::debug('Recherche de catégories', [
            'controller' => 'CategorieController',
            'method' => 'search',
            'query' => $q
        ]);

        $categories = Categorie::search($q)->get();

        foreach ($categories as $categorie) {
            $categorie->sousCategories;
        }

        // Log du résultat de la recherche
        Log::info('Résultat de recherche de catégories', [
            'controller' => 'CategorieController',
            'method' => 'search',
            'query' => $q,
            'count' => count($categories)
        ]);

        $success['categories'] = $categories;

        return $this->sendResponse($success, 'Liste des Categories');
    }
}
