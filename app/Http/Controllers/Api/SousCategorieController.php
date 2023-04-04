<?php

namespace App\Http\Controllers\Api;

use App\Models\Categorie;
use App\Models\SousCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
     * @responseFile storage/responses/getsouscategories.json
     */
    public function index()
    {
        $souscategories = SousCategorie::all();

        foreach ($souscategories as  $souscategorie) {
            $souscategorie->categorie;
        }

        $success['sous_categories'] = $souscategories;

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
     * @responseFile storage/responses/addsouscategorie.json
     */
    public function store(Request $request)
    {
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
     * @responseFile storage/responses/showsouscategorie.json
     */
    public function show($id)
    {
        $souscategorie = SousCategorie::find($id);

        $souscategorie->categorie;


        $success['sous_categorie'] = $souscategorie;

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
     * @responseFile 201 storage/responses/updatecategorie.json
     */
    public function update(Request $request, $id)
    {
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


            return $this->sendResponse($success, "Update Success", 201);
        } catch (\Throwable $th) {
            return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
        }
    }

    /**
     * Delete Category.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the subcategory. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function destroy($id)
    {
        $souscategorie = SousCategorie::find($id);

        try {

            $souscategorie->delete();


            return $this->sendResponse("", "Delete Success", 201);
        } catch (\Throwable $th) {
            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }

    /**
     * Search SubCategory.
     *
     * @header Content-Type application/json
     * @queryParam q string required search value. Example: piscine
     * @responseFile storage/responses/getsouscategories.json
     */
    public function search(Request $request)
    {
        $q = $request->input('q');
        $souscategories = SousCategorie::search($q)->get();

        foreach ($souscategories as  $souscategorie) {
            $souscategorie->categorie;
        }

        $success['sous_categories'] = $souscategories;

        return $this->sendResponse($success, 'Liste des Sous-Categories');
    }
}
