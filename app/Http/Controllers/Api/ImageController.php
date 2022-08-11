<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Commercial;
use App\Models\Etablissement;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
     * @bodyParam imageUrl file required picture.
     * @bodyParam idEtablissement int required the id of the Establishment. Example: 2
     * @responseFile storage/responses/addimage.json
     */
    public function store(Request $request)
    {

        $validator =  Validator::make($request->all(), [
            'idEtablissement' => 'required',
            'imageUrl' => 'mimes:png,jpg,jpeg|max:20000'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de paramètres.', $validator->errors(), 400);
        }

        $etablissement = Etablissement::find($request->idEtablissement);

        $batiment = $etablissement->batiment;

        if ($request->file()) {
            $fileName = time() . '_' . $request->imageUrl->getClientOriginalName();
            $filePath = $request->file('imageUrl')->storeAs('uploads/batiments/images/' . $batiment->codeBatiment . '/' . $etablissement->nom, $fileName, 'public');
            $input['imageUrl'] = '/storage/' . $filePath;
        }

        try {


            DB::beginTransaction();



            $image = $etablissement->images()->create($input);


            DB::commit();

            return $this->sendResponse($image, "Création de l'image reussie", 201);
        } catch (\Exception $ex) {
            DB::rollBack();
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
     * @urlParam id int required the id of the Picture. Example: 2
     * @bodyParam imageUrl file picture.
     * @bodyParam _method string "required if update image(change the PUT method of the request by the POST method)" Example: PUT
     * @responseFile 201 storage/responses/updateimage.json
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $image = Image::find($id);
        $etablissement = Etablissement::find($image->idEtablissement);
        $admin = Admin::where('idUser', $user->id)->first();
        $commercial = Commercial::where('idUser', $user->id)->first();

        $request->validate([
            'imageUrl' => 'mimes:png,jpg,jpeg|max:20000',
        ]);
        try {
            DB::beginTransaction();


            $batiment = $image->etablissement->batiment;
            $etablissement = $image->etablissement;

            if ($request->file()) {
                $fileName = time() . '_' . $request->imageUrl->getClientOriginalName();
                $filePath = $request->file('imageUrl')->storeAs('uploads/batiments/images/' . $batiment->codeBatiment . '/' . $etablissement->nom, $fileName, 'public');
                $image->imageUrl = '/storage/' . $filePath;
            }

            $save = $image->save();

            DB::commit();

            return $this->sendResponse($etablissement, "Update Success", 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => 'Echec de mise à jour'], 400);
        }
    }

    /**
     * Delete Picture.
     *
     * @authenticated
     * @header Content-Type application/json
     * @urlParam id int required the id of the Picture. Example: 2
     * @responseFile 201 storage/responses/delete.json
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $image = Image::find($id);
        $etablissement = Etablissement::find($image->idEtablissement);
        $admin = Admin::where('idUser', $user->id)->first();
        $commercial = Commercial::where('idUser', $user->id)->first();

        try {
            DB::beginTransaction();

            Image::destroy($id);

            DB::commit();

            return $this->sendResponse("", "Delete Success", 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError('Erreur.', ['error' => 'Echec de suppression'], 400);
        }
    }
}
