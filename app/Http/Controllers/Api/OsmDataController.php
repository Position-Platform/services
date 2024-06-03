<?php

namespace App\Http\Controllers\Api;

use App\Models\OsmData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $latitude = $request->input('lat');
        $longitude = $request->input('lon');
        $page = $request->input('page', 1);
        $categorieId = $request->input('categorie_id');

        if (is_null($latitude) || is_null($longitude)) {
            return $this->sendError('Error', 'Longitude et Latitude requis', 400);
        }

        $perPage = 50;

        $paginatedData = OsmData::getDataWithDistance($latitude, $longitude, $perPage, $page, $categorieId);

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
        $osmData = OsmData::find($id);

        if (is_null($osmData)) {
            return $this->sendError('Data not found');
        }

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
        $osmDatas = OsmData::search($q)->paginate(50);

        return $this->sendResponse($osmDatas, 'Liste des Datas');
    }
}
