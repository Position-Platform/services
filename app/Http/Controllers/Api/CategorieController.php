<?php

namespace App\Http\Controllers\Api;

use App\Models\Categorie;
use App\Models\TypeCommodite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
     * @responseFile storage/responses/getcategories.json
     */
    public function index()
    {
        $categories = Categorie::orderBy('vues', 'DESC')->get();

        foreach ($categories as   $categorie) {
            $categorie->sousCategories;
            $categorie->commodites;

            foreach ($categorie->commodites as $key => $commodite) {
                $commodite->typeCommodite;
            }
        }

        return $this->sendResponse($categories, 'Liste des Categories');
    }

    /**
     * Add a new Category.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam nom string required the name of the category. Example: Achat
     * @bodyParam file file the picture of the category
     * @responseFile storage/responses/addcategorie.json
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'nom' => 'required',
            'shortname' => 'required',
            'file' => 'mimes:png,jpg,jpeg,svg|max:10000',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $current_id = DB::table('categories')->max('id');

        $log_id = $current_id + 1;

        $input['id'] = $log_id;
        $input['nom'] = $request->nom;


        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads/categories/logos/' . $request->nom, $fileName, 'public');
            $input['logourl'] = '/storage/' . $filePath;
        }

        try {

            DB::beginTransaction();
            $categorie = Categorie::create($input);

            DB::commit();

            return $this->sendResponse($categorie, "Création de la catégorie reussie", 201);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show Category by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the category. Example: 2
     * @responseFile storage/responses/showcategorie.json
     */
    public function show($id)
    {
        $categorie = Categorie::find($id);

        $categorie->sousCategories;

        $categorie->commodites;

        foreach ($categorie->commodites as $key => $commodite) {
            $commodite->typeCommodite;
        }

        return $this->sendResponse($categorie, 'Categorie');
    }

    /**
     * Update Category.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the category. Example: 2
     * @bodyParam nom string the name of the category. Example: Achat
     * @bodyParam vues string count view. Example: ok
     * @bodyParam file file the picture of the category
     * @bodyParam _method string "required if update image(change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updatecategorie.json
     */
    public function update(Request $request, $id)
    {
        $categorie = Categorie::find($id);
        $request->validate([
            'file' => 'mimes:png,jpg,jpeg,svg|max:10000',
        ]);

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads/categories/logos/' . $categorie->nom, $fileName, 'public');
            $categorie->logourl = '/storage/' . $filePath;
        }


        try {
            DB::beginTransaction();

            $categorie->nom = $request->nom ?? $categorie->nom;
            $categorie->shortname = $request->shortname ?? $categorie->shortname;

            if ($request->vues) {
                $categorie->vues =  $categorie->vues + 1;
            }

            $categorie->sousCategories;

            $categorie->commodites;

            $categorie->save();

            DB::commit();

            return $this->sendResponse($categorie, "Update Success", 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => $th->getMessage()], 400);
        }
    }

    /**
     * Delete Category.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the category. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);

        try {
            DB::beginTransaction();

            $categorie->sousCategories()->delete();

            $categorie->delete();

            DB::commit();

            return $this->sendResponse("", "Delete Success", 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }

    /**
     * Search Category.
     *
     * @header Content-Type application/json
     * @queryParam q string required search value. Example: piscine
     * @responseFile storage/responses/getcategories.json
     */
    public function search(Request $request)
    {
        $q = $request->input('q');
        $categories = Categorie::search($q)->get();

        foreach ($categories as   $categorie) {
            $categorie->sousCategories;
            $categorie->commodites;

            foreach ($categorie->commodites as $key => $commodite) {
                $commodite->typeCommodite;
            }
        }

        return $this->sendResponse($categories, 'Liste des Categories');
    }
}
