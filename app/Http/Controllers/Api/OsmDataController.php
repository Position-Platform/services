<?php

namespace App\Http\Controllers\Api;

use App\Models\OsmData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 *
 * @group OsmData management
 * @authenticated
 *
 * APIs for managing OsmData
 */
class OsmDataController extends BaseController
{
    /**
     * Get all OsmData.
     *
     * @header Content-Type application/json
     * @queryParam lat required lat. Example: 48.8566
     * @queryParam lon required lon. Example: 2.3522
     * @queryParam categorie_id Categorie id. Example: 1
     * @queryParam page Page number. Example: 1
     */
    public function index(Request $request)
    {
        // Log du début de la requête
        Log::debug('Récupération des données OSM', [
            'controller' => 'OsmDataController',
            'method' => 'index',
            'lat' => $request->input('lat'),
            'lon' => $request->input('lon'),
            'categorie_id' => $request->input('categorie_id'),
            'page' => $request->input('page', 1)
        ]);

        $latitude = $request->input('lat');
        $longitude = $request->input('lon');
        $page = $request->input('page', 1);
        $categorieId = $request->input('categorie_id');

        if (is_null($latitude) || is_null($longitude)) {
            // Log du paramètre manquant
            Log::warning('Paramètres de géolocalisation manquants pour les données OSM', [
                'controller' => 'OsmDataController',
                'method' => 'index'
            ]);

            return $this->sendError('Error', 'Longitude et Latitude requis', 400);
        }

        $perPage = 50;

        $paginatedData = OsmData::getDataWithDistance($latitude, $longitude, $perPage, $page, $categorieId);

        // Log du nombre de données récupérées
        Log::info('Données OSM récupérées', [
            'controller' => 'OsmDataController',
            'method' => 'index',
            'count' => count($paginatedData),
            'page' => $page,
            'per_page' => $perPage,
            'categorie_id' => $categorieId
        ]);

        $features = $paginatedData->map(function ($item) {
            return [
                'type' => 'Feature',
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        $item->lon,
                        $item->lat,
                    ],
                ],
                'properties' => $item,
            ];
        });

        $geoJson = [
            'type' => 'FeatureCollection',
            'name' => 'Etablissements',
            'crs' => [
                'type' => 'name',
                'properties' => [
                    'name' => 'urn:ogc:def:crs:OGC:1.3:CRS84',
                ],
            ],
            'features' => $features,
        ];

        return response()->json($geoJson);
    }

    /**
     * Get OsmData by id.
     *
     * @header Content-Type application/json
     * @urlParam id required OsmData id. Example: 1
     */
    public function show($id)
    {
        // Log de la demande de détails
        Log::debug('Récupération des détails d\'une donnée OSM', [
            'controller' => 'OsmDataController',
            'method' => 'show',
            'osm_data_id' => $id
        ]);

        $osmData = OsmData::find($id);

        if (is_null($osmData)) {
            // Log de donnée non trouvée
            Log::warning('Donnée OSM non trouvée', [
                'controller' => 'OsmDataController',
                'method' => 'show',
                'osm_data_id' => $id
            ]);

            return $this->sendError('Data not found');
        }

        // Log du succès de la récupération
        Log::info('Détails de la donnée OSM récupérés', [
            'controller' => 'OsmDataController',
            'method' => 'show',
            'osm_data_id' => $id,
            'osm_id' => $osmData->osm_id
        ]);

        return $this->sendResponse($osmData, 'Data retrieved successfully.');
    }

    /**
     * Search OsmData.
     *
     * @header Content-Type application/json
     * @queryParam q required Search query. Example: restaurant
     */
    public function search(Request $request)
    {
        $q = $request->input('q');

        // Log de la recherche
        Log::debug('Recherche de données OSM', [
            'controller' => 'OsmDataController',
            'method' => 'search',
            'query' => $q
        ]);

        $osmDatas = OsmData::search($q)->paginate(50);

        // Log du résultat de la recherche
        Log::info('Résultat de recherche de données OSM', [
            'controller' => 'OsmDataController',
            'method' => 'search',
            'query' => $q,
            'count' => count($osmDatas),
            'total' => $osmDatas->total()
        ]);

        return $this->sendResponse($osmDatas, 'Liste des Datas');
    }
}
