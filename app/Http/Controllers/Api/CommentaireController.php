<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Commentaire;
use App\Models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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
     */
    public function index()
    {
        // Log du début de la requête
        Log::debug('Récupération de la liste des commentaires', [
            'controller' => 'CommentaireController',
            'method' => 'index'
        ]);

        $commentaires = Commentaire::all();

        foreach ($commentaires as $commentaire) {
            $commentaire->etablissement;
            $commentaire->user;
        }

        // Log du nombre de commentaires récupérés
        Log::info('Liste des commentaires récupérée', [
            'controller' => 'CommentaireController',
            'method' => 'index',
            'count' => count($commentaires)
        ]);

        $success['commentaires'] = $commentaires;

        return $this->sendResponse($success, 'Liste des Commentaires');
    }

    /**
     * Add a new Comment.
     *
     * @header Content-Type application/json
     * @bodyParam commentaire string user comment. Example: J'aime ce lieu
     * @bodyParam etablissement_id int required the id of the Establishment. Example: 1
     * @bodyParam rating int rating. Example: 3
     */
    public function store(Request $request)
    {
        // Log du début de la création
        Log::debug('Tentative de création d\'un commentaire', [
            'controller' => 'CommentaireController',
            'method' => 'store',
            'inputs' => $request->all()
        ]);

        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'etablissement_id' => 'required',
        ]);

        if ($validator->fails()) {
            // Log des erreurs de validation
            Log::warning('Validation échouée lors de la création d\'un commentaire', [
                'controller' => 'CommentaireController',
                'method' => 'store',
                'errors' => $validator->errors()->toArray(),
                'user_id' => $user->id
            ]);

            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $input['user_id'] = $user->id;
        $input['etablissement_id'] = $request->etablissement_id;
        $input['commentaire'] = $request->commentaire;
        $input['rating'] = $request->rating;

        try {
            $etablissement = Etablissement::find($request->etablissement_id);

            if (!$etablissement) {
                Log::warning('Tentative de création d\'un commentaire pour un établissement inexistant', [
                    'controller' => 'CommentaireController',
                    'method' => 'store',
                    'etablissement_id' => $request->etablissement_id,
                    'user_id' => $user->id
                ]);
                return $this->sendError('Établissement non trouvé', [], 404);
            }

            $commentaire = $etablissement->commentaires()->create($input);

            // Log du succès de la création
            Log::info('Commentaire créé avec succès', [
                'controller' => 'CommentaireController',
                'method' => 'store',
                'commentaire_id' => $commentaire->id,
                'etablissement_id' => $request->etablissement_id,
                'user_id' => $user->id,
                'rating' => $request->rating
            ]);

            $success['commentaire'] = $commentaire;
            $success['commentaire']['user'] = $user;

            return $this->sendResponse($success, "Création du commentaire reussie", 201);
        } catch (\Exception $ex) {
            // Log de l'erreur
            Log::error('Erreur lors de la création d\'un commentaire', [
                'controller' => 'CommentaireController',
                'method' => 'store',
                'exception' => $ex->getMessage(),
                'trace' => $ex->getTraceAsString(),
                'user_id' => $user->id,
                'etablissement_id' => $request->etablissement_id
            ]);

            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show Comment by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the comment. Example: 1
     */
    public function show($id)
    {
        // Log de la demande de détails
        Log::debug('Récupération des détails d\'un commentaire', [
            'controller' => 'CommentaireController',
            'method' => 'show',
            'commentaire_id' => $id
        ]);

        $commentaire = Commentaire::find($id);

        if (!$commentaire) {
            Log::warning('Commentaire non trouvé', [
                'controller' => 'CommentaireController',
                'method' => 'show',
                'commentaire_id' => $id
            ]);
            return $this->sendError('Commentaire non trouvé', [], 404);
        }

        $commentaire->etablissement;
        $commentaire->user;

        // Log du succès de la récupération
        Log::info('Détails du commentaire récupérés', [
            'controller' => 'CommentaireController',
            'method' => 'show',
            'commentaire_id' => $id,
            'etablissement_id' => $commentaire->etablissement_id,
            'user_id' => $commentaire->user_id
        ]);

        $success['commentaire'] = $commentaire;

        return $this->sendResponse($success, "Commentaire");
    }

    /**
     * Update Comment.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the comment. Example: 1
     * @bodyParam commentaire string user comment. Example: J'aime ce lieu
     * @bodyParam rating int rating. Example: 3
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     */
    public function update(Request $request, $id)
    {
        // Log de la tentative de mise à jour
        Log::debug('Tentative de mise à jour d\'un commentaire', [
            'controller' => 'CommentaireController',
            'method' => 'update',
            'commentaire_id' => $id,
            'inputs' => $request->all()
        ]);

        $user = Auth::user();
        $commentaire = Commentaire::find($id);

        if (!$commentaire) {
            Log::warning('Tentative de mise à jour d\'un commentaire inexistant', [
                'controller' => 'CommentaireController',
                'method' => 'update',
                'commentaire_id' => $id,
                'user_id' => $user->id
            ]);
            return $this->sendError('Commentaire non trouvé', [], 404);
        }

        $admin = Admin::where('user_id', $user->id)->first();

        if ($admin || $commentaire->user_id == $user->id) {
            try {
                // Log des anciennes valeurs avant mise à jour
                Log::debug('Anciennes valeurs du commentaire', [
                    'controller' => 'CommentaireController',
                    'method' => 'update',
                    'commentaire_id' => $id,
                    'old_values' => [
                        'commentaire' => $commentaire->commentaire,
                        'rating' => $commentaire->rating
                    ]
                ]);

                $commentaire->commentaire = $request->commentaire ?? $commentaire->commentaire;
                $commentaire->rating = $request->rating ?? $commentaire->rating;
                $commentaire->save();

                // Log du succès de la mise à jour
                Log::info('Commentaire mis à jour avec succès', [
                    'controller' => 'CommentaireController',
                    'method' => 'update',
                    'commentaire_id' => $id,
                    'new_values' => [
                        'commentaire' => $commentaire->commentaire,
                        'rating' => $commentaire->rating
                    ],
                    'user_id' => $user->id,
                    'is_admin' => $admin ? true : false
                ]);

                $success['commentaire'] = $commentaire;

                return $this->sendResponse($success, "Update Success", 201);
            } catch (\Throwable $th) {
                // Log de l'erreur
                Log::error('Erreur lors de la mise à jour d\'un commentaire', [
                    'controller' => 'CommentaireController',
                    'method' => 'update',
                    'commentaire_id' => $id,
                    'exception' => $th->getMessage(),
                    'trace' => $th->getTraceAsString(),
                    'user_id' => $user->id
                ]);

                return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
            }
        } else {
            // Log de l'accès non autorisé
            Log::warning('Tentative non autorisée de mise à jour d\'un commentaire', [
                'controller' => 'CommentaireController',
                'method' => 'update',
                'commentaire_id' => $id,
                'user_id' => $user->id,
                'commentaire_user_id' => $commentaire->user_id
            ]);

            return $this->sendError('Non autorisé à modifier ce commentaire', [], 403);
        }
    }

    /**
     * Delete Comment.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the comment. Example: 1
     */
    public function destroy($id)
    {
        // Log de la tentative de suppression
        Log::debug('Tentative de suppression d\'un commentaire', [
            'controller' => 'CommentaireController',
            'method' => 'destroy',
            'commentaire_id' => $id
        ]);

        $user = Auth::user();
        $commentaire = Commentaire::find($id);

        if (!$commentaire) {
            Log::warning('Tentative de suppression d\'un commentaire inexistant', [
                'controller' => 'CommentaireController',
                'method' => 'destroy',
                'commentaire_id' => $id,
                'user_id' => $user->id
            ]);
            return $this->sendError('Commentaire non trouvé', [], 404);
        }

        $admin = Admin::where('user_id', $user->id)->first();

        if ($admin || $commentaire->user_id == $user->id) {
            try {
                Commentaire::destroy($id);

                // Log du succès de la suppression
                Log::info('Commentaire supprimé avec succès', [
                    'controller' => 'CommentaireController',
                    'method' => 'destroy',
                    'commentaire_id' => $id,
                    'etablissement_id' => $commentaire->etablissement_id,
                    'commentaire_user_id' => $commentaire->user_id,
                    'deleted_by_user_id' => $user->id,
                    'is_admin' => $admin ? true : false
                ]);

                return $this->sendResponse("", "Delete Success", 201);
            } catch (\Throwable $th) {
                DB::rollBack();

                // Log de l'erreur
                Log::error('Erreur lors de la suppression d\'un commentaire', [
                    'controller' => 'CommentaireController',
                    'method' => 'destroy',
                    'commentaire_id' => $id,
                    'exception' => $th->getMessage(),
                    'trace' => $th->getTraceAsString(),
                    'user_id' => $user->id
                ]);

                return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
            }
        } else {
            // Log de l'accès non autorisé
            Log::warning('Tentative non autorisée de suppression d\'un commentaire', [
                'controller' => 'CommentaireController',
                'method' => 'destroy',
                'commentaire_id' => $id,
                'user_id' => $user->id,
                'commentaire_user_id' => $commentaire->user_id
            ]);

            return $this->sendError('Non autorisé à supprimer ce commentaire', [], 403);
        }
    }
}
