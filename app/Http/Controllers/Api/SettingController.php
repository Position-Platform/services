<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 *
 * @group Setting management
 *
 * APIs for managing Setting
 */
class SettingController extends BaseController
{
    /**
     * Get the application settings.
     *
     * @header Content-Type application/json
     */
    public function index()
    {
        // Log du début de la requête
        Log::debug('Récupération des paramètres de l\'application', [
            'controller' => 'SettingController',
            'method' => 'index'
        ]);

        $setting = Setting::first();

        // Log du résultat de la récupération
        Log::info('Paramètres de l\'application récupérés', [
            'controller' => 'SettingController',
            'method' => 'index',
            'setting_id' => $setting ? $setting->id : null
        ]);

        $success['setting'] = $setting;

        return $this->sendResponse($success, 'Paramètres de l\'application');
    }

    /**
     * Show Setting by id.
     *
     * @header Content-Type application/json
     * @urlParam id int required the id of the setting. Example: 1
     */
    public function show($id)
    {
        // Log de la demande de détails
        Log::debug('Récupération des détails d\'un paramètre', [
            'controller' => 'SettingController',
            'method' => 'show',
            'setting_id' => $id
        ]);

        $setting = Setting::find($id);

        if (is_null($setting)) {
            // Log du paramètre non trouvé
            Log::warning('Paramètre non trouvé', [
                'controller' => 'SettingController',
                'method' => 'show',
                'setting_id' => $id
            ]);

            return $this->sendError('Paramètre non trouvé.');
        }

        // Log du succès de la récupération
        Log::info('Détails du paramètre récupérés', [
            'controller' => 'SettingController',
            'method' => 'show',
            'setting_id' => $id
        ]);

        $success['setting'] = $setting;

        return $this->sendResponse($success, 'Paramètre trouvé.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @authenticated
     * @header Content-Type application/json
     * @bodyParam app_name string the name of the application. Example: Position
     * @bodyParam app_api_url string the api url of the application. Example: https://api.position.cm
     * @bodyParam app_api_key string the api key of the application. Example: GngCfqQT9ydj8BtQIPqWWDJsIittDKOWucVRDSdHLBBXbOxdbTJizDUc0hrjYw6E
     * @bodyParam app_version string the version of the application. Example: 1.0.0
     * @bodyParam app_description string the description of the application. Example: Position est une application web qui vous permet de trouver les meilleurs endroits autour de vous.
     * @bodyParam app_logo string the logo of the application
     * @bodyParam android_app_version string the android version of the application. Example: 1.0.0
     * @bodyParam ios_app_version string the ios version of the application. Example: 1.0.0
     * @bodyParam ios_app_link string the ios link of the application. Example: https://apps.apple.com/app/id1234567890
     * @bodyParam android_app_link string the android link of the application. Example: https://play.google.com/store/apps/details?id=com.example.app
     * @bodyParam privacy_policy_link string the privacy policy link of the application. Example: https://example.com/privacy-policy
     * @bodyParam terms_of_service_link string the terms of service link of the application. Example: https://example.com/terms-of-service
     * @bodyParam contact_email string the contact email of the application. Example: infos@position.cm 
     * @bodyParam contact_phone string the contact phone of the application. Example: +237 6 00 00 00 00
     * @bodyParam contact_address string the contact address of the application. Example: Douala, Cameroun
     * @bodyParam facebook_link string the facebook link of the application. Example: https://facebook.com/position
     * @bodyParam twitter_link string the twitter link of the application. Example: https://twitter.com/position
     * @bodyParam linkedin_link string the linkedin link of the application. Example: https://linkedin.com/position
     * @bodyParam maintenance_mode boolean the maintenance mode of the application. Example: false
     * @bodyParam map_api_key string the map api key of the application. Example: GZun6glaQh7PwnoBZoOm
     * @bodyParam default_map_style string the default map style of the application. Example: https://api.maptiler.com/maps/streets-v2/style.json
     * @bodyParam is_facebook_login_enabled boolean the facebook login status of the application. Example: true
     * @bodyParam is_google_login_enabled boolean the google login status of the application. Example: true
     * @bodyParam is_osm_login_enabled boolean the osm login status of the application. Example: true
     * @bodyParam is_apple_login_enabled boolean the apple login status of the application. Example: true
     * @urlParam id int required the id of the setting. Example: 1
     */
    public function update(Request $request, $id)
    {
        // Log de la tentative de mise à jour
        Log::debug('Tentative de mise à jour des paramètres de l\'application', [
            'controller' => 'SettingController',
            'method' => 'update',
            'setting_id' => $id,
            'inputs' => $request->except('app_logo', 'app_api_key')
        ]);

        $setting = Setting::find($id);

        if (is_null($setting)) {
            // Log du paramètre non trouvé
            Log::warning('Tentative de mise à jour d\'un paramètre inexistant', [
                'controller' => 'SettingController',
                'method' => 'update',
                'setting_id' => $id
            ]);

            return $this->sendError('Paramètre non trouvé.');
        }

        // Log des anciennes valeurs avant mise à jour
        Log::debug('Anciennes valeurs des paramètres', [
            'controller' => 'SettingController',
            'method' => 'update',
            'setting_id' => $id,
            'old_values' => [
                'app_name' => $setting->app_name,
                'app_version' => $setting->app_version,
                'maintenance_mode' => $setting->maintenance_mode,
                'android_app_version' => $setting->android_app_version,
                'ios_app_version' => $setting->ios_app_version
            ]
        ]);

        $input = $request->all();

        if ($request->file('app_logo')) {
            $fileName = time() . '_' . $request->app_logo->getClientOriginalName();
            $filePath = $request->file('app_logo')->storeAs('uploads/settings/logos', $fileName, 'public');
            $input['app_logo'] = '/storage/' . $filePath;

            // Log de l'upload de fichier
            Log::debug('Logo de l\'application mis à jour', [
                'controller' => 'SettingController',
                'method' => 'update',
                'setting_id' => $id,
                'filename' => $fileName,
                'path' => $filePath
            ]);
        }

        $setting->update($input);

        // Log du succès de la mise à jour
        Log::info('Paramètres de l\'application mis à jour avec succès', [
            'controller' => 'SettingController',
            'method' => 'update',
            'setting_id' => $id,
            'new_values' => [
                'app_name' => $setting->app_name,
                'app_version' => $setting->app_version,
                'maintenance_mode' => $setting->maintenance_mode,
                'android_app_version' => $setting->android_app_version,
                'ios_app_version' => $setting->ios_app_version
            ]
        ]);

        $success['setting'] = $setting;

        return $this->sendResponse($success, 'Paramètre mis à jour.');
    }
}
