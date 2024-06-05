<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('auth/email/verify/{id}', [App\Http\Controllers\Api\VerificationController::class, 'verify'])->name('verification.verify');
Route::get('auth/email/resend', [App\Http\Controllers\Api\VerificationController::class, 'resend'])->name('verification.resend');
Route::get('auth/phone/verify/{id}', [App\Http\Controllers\Api\VerificationController::class, 'verifyByPhone']);


Route::middleware('auth.apikey')->group(
    function () {
        Route::post('auth/password/forgot', [App\Http\Controllers\Api\UserController::class, 'forgot']);
        Route::post('auth/password/reset', [App\Http\Controllers\Api\UserController::class, 'reset'])->name('password.reset');

        Route::post('auth/register', [App\Http\Controllers\Api\UserController::class, 'register']);
        Route::post('auth/login', [App\Http\Controllers\Api\UserController::class, 'login']);

        Route::post('auth/register/facebook', [App\Http\Controllers\Api\SocialApiAuthFacebookController::class, 'facebookConnect']);
        Route::post('auth/register/osm', [App\Http\Controllers\Api\SocialApiAuthOsmController::class, 'osmConnect']);
        Route::post('auth/register/google', [App\Http\Controllers\Api\SocialApiAuthGoogleController::class, 'googleConnect']);
        Route::post('auth/register/apple', [App\Http\Controllers\Api\SocialApiAuthAppleController::class, 'appleConnect']);

        Route::get('settings', [App\Http\Controllers\Api\SettingController::class, 'index']);
        Route::get('settings/{id}', [App\Http\Controllers\Api\SettingController::class, 'show']);

        Route::get('abonnements', [App\Http\Controllers\Api\AbonnementController::class, 'index']);
        Route::get('abonnements/{id}', [App\Http\Controllers\Api\AbonnementController::class, 'show']);

        Route::get('categories', [App\Http\Controllers\Api\CategorieController::class, 'index']);
        Route::get('categories/{id}', [App\Http\Controllers\Api\CategorieController::class, 'show']);
        Route::get('search/categories', [App\Http\Controllers\Api\CategorieController::class, 'search']);
        Route::put('categories/{id}', [App\Http\Controllers\Api\CategorieController::class, 'update']);

        Route::get('souscategories', [App\Http\Controllers\Api\SousCategorieController::class, 'index']);
        Route::get('souscategories/{id}', [App\Http\Controllers\Api\SousCategorieController::class, 'show']);
        Route::get('search/souscategories', [App\Http\Controllers\Api\SousCategorieController::class, 'search']);

        Route::get('etablissements', [App\Http\Controllers\Api\EtablissementController::class, 'index']);
        Route::get('etablissements/{id}', [App\Http\Controllers\Api\EtablissementController::class, 'show']);
        Route::get('search/etablissements', [App\Http\Controllers\Api\EtablissementController::class, 'search']);

        Route::get('globalsearch', [App\Http\Controllers\Api\EtablissementController::class, 'globalsearch']);

        Route::get('osmdatas', [App\Http\Controllers\Api\OsmDataController::class, 'index']);
        Route::get('osmdatas/{id}', [App\Http\Controllers\Api\OsmDataController::class, 'show']);
        Route::get('search/osmdatas', [App\Http\Controllers\Api\OsmDataController::class, 'search']);

        Route::get('distance/etablissements', [App\Http\Controllers\Api\EtablissementController::class, 'getEtablissementByDistance']);

        Route::get('search/etablissements/filter', [App\Http\Controllers\Api\EtablissementController::class, 'filterSearch']);

        Route::put('etablissements/vues/{id}', [App\Http\Controllers\Api\EtablissementController::class, 'updateVues']);
        Route::put('etablissements/cover/{id}', [App\Http\Controllers\Api\EtablissementController::class, 'updateCover']);
        Route::get('count/etablissements', [App\Http\Controllers\Api\EtablissementController::class, 'countEtablissement']);

        Route::middleware('auth:api')->group(function () {
            Route::get('auth/logout', [App\Http\Controllers\Api\UserController::class, 'logout']);
            Route::put('user/update/{id}', [App\Http\Controllers\Api\UserController::class, 'updateuser']);
            Route::delete('user/delete/{id}', [App\Http\Controllers\Api\UserController::class, 'deleteuser']);
            Route::get('user/me', [App\Http\Controllers\Api\UserController::class, 'getUser']);

            Route::post('tracking', [App\Http\Controllers\Api\TrackingController::class, 'store']);


            Route::apiResource('batiments', App\Http\Controllers\Api\BatimentController::class);
            Route::post('add/batiments', [App\Http\Controllers\Api\BatimentController::class, 'addCompletBatiment']);
            Route::apiResource('commentaires', App\Http\Controllers\Api\CommentaireController::class);
            Route::post('trackings', [App\Http\Controllers\Api\TrackingController::class, 'store']);

            Route::post('etablissements', [App\Http\Controllers\Api\EtablissementController::class, 'store']);
            Route::put('etablissements/{id}', [App\Http\Controllers\Api\EtablissementController::class, 'update']);
            Route::delete('etablissements/{id}', [App\Http\Controllers\Api\EtablissementController::class, 'destroy']);

            Route::post('horaires', [App\Http\Controllers\Api\HoraireController::class, 'store']);
            Route::put('horaires/{id}', [App\Http\Controllers\Api\HoraireController::class, 'update']);
            Route::delete('horaires/{id}', [App\Http\Controllers\Api\HoraireController::class, 'destroy']);

            Route::post('images', [App\Http\Controllers\Api\ImageController::class, 'store']);
            Route::put('images/{id}', [App\Http\Controllers\Api\ImageController::class, 'update']);
            Route::delete('images/{id}', [App\Http\Controllers\Api\ImageController::class, 'destroy']);

            Route::get('favoris', [App\Http\Controllers\Api\UserController::class, 'favorites']);
            Route::post('favoris/add', [App\Http\Controllers\Api\EtablissementController::class, 'addFavorite']);
            Route::post('favoris/remove', [App\Http\Controllers\Api\EtablissementController::class, 'removeFavorite']);


            Route::group(['middleware' => ['role:admin']], function () {
                Route::apiResource('roles', App\Http\Controllers\Api\RoleController::class);
                Route::apiResource('permissions', App\Http\Controllers\Api\PermissionController::class);
                Route::apiResource('admins', App\Http\Controllers\Api\AdminController::class);

                Route::put('settings/{id}', [App\Http\Controllers\Api\SettingController::class, 'update']);

                Route::post('abonnements', [App\Http\Controllers\Api\AbonnementController::class, 'store']);
                Route::put('abonnements/{id}', [App\Http\Controllers\Api\AbonnementController::class, 'update']);
                Route::delete('abonnements/{id}', [App\Http\Controllers\Api\AbonnementController::class, 'destroy']);

                Route::post('categories', [App\Http\Controllers\Api\CategorieController::class, 'store']);

                Route::delete('categories/{id}', [App\Http\Controllers\Api\CategorieController::class, 'destroy']);

                Route::post('souscategories', [App\Http\Controllers\Api\SousCategorieController::class, 'store']);
                Route::put('souscategories/{id}', [App\Http\Controllers\Api\SousCategorieController::class, 'update']);
                Route::delete('souscategories/{id}', [App\Http\Controllers\Api\SousCategorieController::class, 'destroy']);
            });
        });
    }
);
