<?php

namespace App\Http\Controllers\Api;

use App\Models\Etablissement;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 *
 * @group Picture management
 *
 * APIs for managing Picture
 */
class ImageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cette méthode n'est pas implémentée mais on logue quand même
        Log::debug('Tentative d\'accès à la méthode index non implémentée', [
            'controller' => 'ImageController',
            'method' => 'index'
        ]);
    }

    /**
     * Add a new picture.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam image_url file required picture.
     * @bodyParam etablissement_id int required the id of the Establishment. Example: 1
     */
    public function store(Request $request)
    {
        // Log du début de la création
        Log::debug('Tentative de création d\'une image', [
            'controller' => 'ImageController',
            'method' => 'store',
            'etablissement_id' => $request->etablissement_id
        ]);

        $validator = Validator::make($request->all(), [
            'etablissement_id' => 'required',
            'image_url' => 'mimes:png,jpg,jpeg|max:20000'
        ]);

        if ($validator->fails()) {
            // Log des erreurs de validation
            Log::warning('Validation échouée lors de la création d\'une image', [
                'controller' => 'ImageController',
                'method' => 'store',
                'errors' => $validator->errors()->toArray()
            ]);

            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $etablissement = Etablissement::find($request->etablissement_id);

        if (!$etablissement) {
            Log::warning('Tentative de création d\'une image pour un établissement inexistant', [
                'controller' => 'ImageController',
                'method' => 'store',
                'etablissement_id' => $request->etablissement_id
            ]);
            return $this->sendError('Établissement non trouvé', [], 404);
        }

        $batiment = $etablissement->batiment;

        if ($request->file('image_url')) {
            $fileName = time() . '_' . $request->image_url->getClientOriginalName();
            $filePath = $request->file('image_url')->storeAs('uploads/batiments/images/' . $batiment->code . '/' . $etablissement->nom, $fileName, 'public');
            $input['image_url'] = '/storage/' . $filePath;

            // Log de l'upload de fichier
            Log::debug('Image uploadée', [
                'controller' => 'ImageController',
                'method' => 'store',
                'etablissement_id' => $request->etablissement_id,
                'filename' => $fileName,
                'path' => $filePath
            ]);
        } else {
            Log::warning('Tentative de création d\'une image sans fichier', [
                'controller' => 'ImageController',
                'method' => 'store',
                'etablissement_id' => $request->etablissement_id
            ]);
            return $this->sendError('Fichier image requis', [], 400);
        }

        try {
            $image = $etablissement->images()->create($input);

            // Log du succès de la création
            Log::info('Image créée avec succès', [
                'controller' => 'ImageController',
                'method' => 'store',
                'image_id' => $image->id,
                'etablissement_id' => $request->etablissement_id
            ]);

            $success['image'] = $image;

            return $this->sendResponse($success, "Création de l'image reussie", 201);
        } catch (\Exception $ex) {
            // Log de l'erreur
            Log::error('Erreur lors de la création d\'une image', [
                'controller' => 'ImageController',
                'method' => 'store',
                'etablissement_id' => $request->etablissement_id,
                'exception' => $ex->getMessage(),
                'trace' => $ex->getTraceAsString()
            ]);

            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        // Cette méthode n'est pas implémentée mais on logue quand même
        Log::debug('Tentative d\'accès à la méthode show non implémentée', [
            'controller' => 'ImageController',
            'method' => 'show',
            'image_id' => $image->id
        ]);
    }

    /**
     * Update Picture.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the Picture. Example: 1
     * @bodyParam image_url file picture.
     * @bodyParam etablissement_id int required the id of the Establishment. Example: 1
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     */
    public function update(Request $request, $id)
    {
        // Log de la tentative de mise à jour
        Log::debug('Tentative de mise à jour d\'une image', [
            'controller' => 'ImageController',
            'method' => 'update',
            'image_id' => $id
        ]);

        Auth::user();
        $image = Image::find($id);

        if (!$image) {
            Log::warning('Tentative de mise à jour d\'une image inexistante', [
                'controller' => 'ImageController',
                'method' => 'update',
                'image_id' => $id
            ]);
            return $this->sendError('Image non trouvée', [], 404);
        }

        $etablissement = Etablissement::find($image->etablissement_id);

        $request->validate([
            'image_url' => 'mimes:png,jpg,jpeg|max:20000',
        ]);

        try {
            $batiment = $image->etablissement->batiment;
            $etablissement = $image->etablissement;

            if ($request->file('image_url')) {
                $fileName = time() . '_' . $request->image_url->getClientOriginalName();
                $filePath = $request->file('image_url')->storeAs('uploads/batiments/images/' . $batiment->code . '/' . $etablissement->nom, $fileName, 'public');
                $image->image_url = '/storage/' . $filePath;

                // Log de l'upload de fichier
                Log::debug('Image mise à jour', [
                    'controller' => 'ImageController',
                    'method' => 'update',
                    'image_id' => $id,
                    'etablissement_id' => $etablissement->id,
                    'filename' => $fileName,
                    'path' => $filePath
                ]);
            }

            $image->save();

            // Log du succès de la mise à jour
            Log::info('Image mise à jour avec succès', [
                'controller' => 'ImageController',
                'method' => 'update',
                'image_id' => $id,
                'etablissement_id' => $etablissement->id
            ]);

            $success['image'] = $image;

            return $this->sendResponse($success, "Update Success", 201);
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error('Erreur lors de la mise à jour d\'une image', [
                'controller' => 'ImageController',
                'method' => 'update',
                'image_id' => $id,
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);

            return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
        }
    }

    /**
     * Delete Picture.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the Picture. Example: 1
     */
    public function destroy($id)
    {
        // Log de la tentative de suppression
        Log::debug('Tentative de suppression d\'une image', [
            'controller' => 'ImageController',
            'method' => 'destroy',
            'image_id' => $id
        ]);

        Auth::user();

        $image = Image::find($id);

        if (!$image) {
            Log::warning('Tentative de suppression d\'une image inexistante', [
                'controller' => 'ImageController',
                'method' => 'destroy',
                'image_id' => $id
            ]);
            return $this->sendError('Image non trouvée', [], 404);
        }

        // Stockage temporaire pour le log
        $etablissementId = $image->etablissement_id;

        try {
            Image::destroy($id);

            // Log du succès de la suppression
            Log::info('Image supprimée avec succès', [
                'controller' => 'ImageController',
                'method' => 'destroy',
                'image_id' => $id,
                'etablissement_id' => $etablissementId
            ]);

            return $this->sendResponse("", "Delete Success", 201);
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error('Erreur lors de la suppression d\'une image', [
                'controller' => 'ImageController',
                'method' => 'destroy',
                'image_id' => $id,
                'exception' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);

            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }
}
