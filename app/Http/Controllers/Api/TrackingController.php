<?php

namespace App\Http\Controllers\Api;

use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 *
 * @group Tracking management
 *
 * APIs for managing Tracking
 */
class TrackingController extends BaseController
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
     * Add a new Tracking.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam longitude string required  longitude. Example: 12
     * @bodyParam latitude string required latitude. Example: 4
     * @bodyParam speed string required speed. Example: 30
     * @bodyParam timestamp string required timestamp. Example: 23456789
     */
    public function store(Request $request)
    {
        try {
            // Log du début de la création
            Log::debug('Tentative de création d\'une position', [
                'controller' => 'TrackingController',
                'method' => 'store',
                'inputs' => $request->all()
            ]);

            $user = Auth::user();

            $input = $request->all();

            $tracking = $user->trackings()->create($input);


            $success['tracking'] = $tracking;

            // Log de la création réussie
            Log::info('Position créée avec succès', [
                'controller' => 'TrackingController',
                'method' => 'store',
                'tracking_id' => $tracking->id
            ]);

            return $this->sendResponse($success, "Ajout de la position reussie", 201);
        } catch (\Exception $ex) {
            return $this->sendError('Erreur.', ['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function show(Tracking $tracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tracking $tracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracking $tracking)
    {
        //
    }
}
