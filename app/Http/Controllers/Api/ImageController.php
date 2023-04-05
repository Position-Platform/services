<?php

namespace App\Http\Controllers\Api;

use App\Models\Etablissement;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        //
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

        $validator =  Validator::make($request->all(), [
            'etablissement_id' => 'required',
            'image_url' => 'mimes:png,jpg,jpeg|max:20000'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $etablissement = Etablissement::find($request->etablissement_id);

        $batiment = $etablissement->batiment;

        if ($request->file()) {
            $fileName = time() . '_' . $request->image_url->getClientOriginalName();
            $filePath = $request->file('image_url')->storeAs('uploads/batiments/images/' . $batiment->code . '/' . $etablissement->nom, $fileName, 'public');
            $input['image_url'] = '/storage/' . $filePath;
        }

        try {

            $image = $etablissement->images()->create($input);

            $success['image'] = $image;



            return $this->sendResponse($success, "Création de l'image reussie", 201);
        } catch (\Exception $ex) {
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
        //
    }

    /**
     * Update Picture.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the Picture. Example: 1
     * @bodyParam image_url file picture.
     * @bodyParam _method string "required if update (change the PUT method of the request by the POST method)" Example: PUT
     */
    public function update(Request $request, $id)
    {
        Auth::user();
        $image = Image::find($id);
        $etablissement = Etablissement::find($image->etablissement_id);

        $request->validate([
            'image_url' => 'mimes:png,jpg,jpeg|max:20000',
        ]);
        try {


            $batiment = $image->etablissement->batiment;
            $etablissement = $image->etablissement;

            if ($request->file()) {
                $fileName = time() . '_' . $request->image_url->getClientOriginalName();
                $filePath = $request->file('image_url')->storeAs('uploads/batiments/images/' . $batiment->code . '/' . $etablissement->nom, $fileName, 'public');
                $image->image_url = '/storage/' . $filePath;
            }

            $image->save();

            $success['image'] = $image;


            return $this->sendResponse($success, "Update Success", 201);
        } catch (\Throwable $th) {
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
        Auth::user();

        try {

            Image::destroy($id);


            return $this->sendResponse("", "Delete Success", 201);
        } catch (\Throwable $th) {
            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }
}
