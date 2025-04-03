<?php

namespace App\Http\Controllers\Api;

use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaiementController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Log de la non-implémentation
        Log::debug('Tentative d\'accès à la méthode index non implémentée', [
            'controller' => 'PaiementController',
            'method' => 'index'
        ]);
        // Cette méthode n'est pas implémentée
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Log de la non-implémentation
        Log::debug('Tentative d\'accès à la méthode store non implémentée', [
            'controller' => 'PaiementController',
            'method' => 'store',
            'inputs' => $request->all()
        ]);
        // Cette méthode n'est pas implémentée
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show(Paiement $paiement)
    {
        // Log de la non-implémentation
        Log::debug('Tentative d\'accès à la méthode show non implémentée', [
            'controller' => 'PaiementController',
            'method' => 'show',
            'paiement_id' => $paiement->id
        ]);
        // Cette méthode n'est pas implémentée
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paiement $paiement)
    {
        // Log de la non-implémentation
        Log::debug('Tentative d\'accès à la méthode update non implémentée', [
            'controller' => 'PaiementController',
            'method' => 'update',
            'paiement_id' => $paiement->id,
            'inputs' => $request->all()
        ]);
        // Cette méthode n'est pas implémentée
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paiement $paiement)
    {
        // Log de la non-implémentation
        Log::debug('Tentative d\'accès à la méthode destroy non implémentée', [
            'controller' => 'PaiementController',
            'method' => 'destroy',
            'paiement_id' => $paiement->id
        ]);
        // Cette méthode n'est pas implémentée
    }
}
