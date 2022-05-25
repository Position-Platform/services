<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Commentaire;
use App\Models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 *
 * @group Comment management
 * @authenticated
 *
 * APIs for managing Comment
 */
class CommentaireController extends BaseController
{
    /**
     * Get all Comment.
     *
     * @header Content-Type application/json
     * @responseFile storage/responses/getcommentaires.json
     */
    public function index()
    {
        $commentaires = Commentaire::all();

        foreach ($commentaires as $key => $commentaire) {
            $commentaire->etablissement;
            $commentaire->user;
        }

        return $this->sendResponse($commentaires, 'Liste des Commentaires');
    }

    /**
     * Add a new Comment.
     *
     * @header Content-Type application/json
     * @bodyParam commentaire string user comment. Example: J'aime ce lieu
     * @bodyParam idEtablissement int required the id of the Establishment. Example: 2
     * @bodyParam rating int rating. Example: 3
     * @responseFile storage/responses/addcommentaire.json
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validator =  Validator::make($request->all(), [
            'idEtablissement' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input['idUser'] = $user->id;
        $input['idEtablissement'] = $request->idEtablissement;
        $input['commentaire'] = $request->commentaire;
        $input['rating'] = $request->rating;

        try {


            DB::beginTransaction();

            $etablissement = Etablissement::find($request->idEtablissement);

            $commentaire = $etablissement->commentaires()->create($input);


            DB::commit();

            return $this->sendResponse($commentaire, "Création du commentaire reussie", 201);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show Comment by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the comment. Example: 2
     * @responseFile storage/responses/showcommentaire.json
     */
    public function show($id)
    {
        $commentaire = Commentaire::find($id);

        $commentaire->etablissement;
        $commentaire->user;

        return $this->sendResponse($commentaire, "Commentaire");
    }

    /**
     * Update Comment.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the comment. Example: 2
     * @bodyParam commentaire string user comment. Example: J'aime ce lieu
     * @bodyParam rating int rating. Example: 3
     * @bodyParam _method string "required if update image(change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updatecommentaire.json
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $commentaire = Commentaire::find($id);
        $admin = Admin::where('idUser', $user->id)->first();
        if ($admin || $commentaire->idUser == $user->id) {
            try {
                DB::beginTransaction();


                $commentaire->commentaire = $request->commentaire ?? $commentaire->commentaire;
                $commentaire->rating = $request->rating ?? $commentaire->rating;
                $commentaire->save();

                DB::commit();

                return $this->sendResponse($commentaire, "Update Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
            }
        }
    }

    /**
     * Delete Comment.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the comment. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $commentaire = Commentaire::find($id);
        $admin = Admin::where('idUser', $user->id)->first();
        if ($admin || $commentaire->idUser == $user->id) {
            try {
                DB::beginTransaction();

                Commentaire::destroy($id);

                DB::commit();

                return $this->sendResponse("", "Delete Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
            }
        }
    }
}
