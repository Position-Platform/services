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

        Route::get('managers/{id}', [App\Http\Controllers\Api\ManagerController::class, 'show']);
        Route::post('managers', [App\Http\Controllers\Api\ManagerController::class, 'store']);

        Route::get('abonnements', [App\Http\Controllers\Api\AbonnementController::class, 'index']);
        Route::get('abonnements/{id}', [App\Http\Controllers\Api\AbonnementController::class, 'show']);

        Route::get('categories', [App\Http\Controllers\Api\CategorieController::class, 'index']);
        Route::get('categories/{id}', [App\Http\Controllers\Api\CategorieController::class, 'show']);

        Route::get('souscategories', [App\Http\Controllers\Api\SousCategorieController::class, 'index']);
        Route::get('souscategories/{id}', [App\Http\Controllers\Api\SousCategorieController::class, 'show']);
        Route::get('search/souscategories', [App\Http\Controllers\Api\SousCategorieController::class, 'search']);

        Route::get('typecommodites', [App\Http\Controllers\Api\TypeCommoditeController::class, 'index']);
        Route::get('typecommodites/{id}', [App\Http\Controllers\Api\TypeCommoditeController::class, 'show']);

        Route::get('commodites', [App\Http\Controllers\Api\CommoditeController::class, 'index']);
        Route::get('commodites/{id}', [App\Http\Controllers\Api\CommoditeController::class, 'show']);

        Route::get('etablissements', [App\Http\Controllers\Api\EtablissementController::class, 'index']);
        Route::get('etablissements/{id}', [App\Http\Controllers\Api\EtablissementController::class, 'show']);
        Route::get('search/etablissements', [App\Http\Controllers\Api\EtablissementController::class, 'search']);

        Route::middleware('auth:api')->group(function () {
            Route::get('auth/logout', [App\Http\Controllers\Api\UserController::class, 'logout']);
            Route::post('user/update/{id}', [App\Http\Controllers\Api\UserController::class, 'updateuser']);
            Route::delete('user/delete/{id}', [App\Http\Controllers\Api\UserController::class, 'deleteuser']);
            Route::get('user/me', [App\Http\Controllers\Api\UserController::class, 'getUser']);

            Route::get('commercials', [App\Http\Controllers\Api\CommercialController::class, 'index']);
            Route::get('commercials/{id}', [App\Http\Controllers\Api\CommercialController::class, 'show']);
            Route::put('commercials/{id}', [App\Http\Controllers\Api\CommercialController::class, 'update']);

            Route::get('managers', [App\Http\Controllers\Api\ManagerController::class, 'index']);
            Route::put('managers/{id}', [App\Http\Controllers\Api\ManagerController::class, 'update']);
            Route::delete('managers/{id}', [App\Http\Controllers\Api\ManagerController::class, 'destroy']);

            Route::apiResource('batiments', App\Http\Controllers\Api\BatimentController::class);
            Route::apiResource('commentaires', App\Http\Controllers\Api\CommentaireController::class);

            Route::post('etablissements', [App\Http\Controllers\Api\EtablissementController::class, 'store']);
            Route::put('etablissements/{id}', [App\Http\Controllers\Api\EtablissementController::class, 'update']);
            Route::delete('etablissements/{id}', [App\Http\Controllers\Api\EtablissementController::class, 'destroy']);

            Route::post('horaires', [App\Http\Controllers\Api\HoraireController::class, 'store']);
            Route::put('horaires/{id}', [App\Http\Controllers\Api\HoraireController::class, 'update']);
            Route::delete('horaires/{id}', [App\Http\Controllers\Api\HoraireController::class, 'destroy']);

            Route::post('images', [App\Http\Controllers\Api\ImageController::class, 'store']);
            Route::put('images/{id}', [App\Http\Controllers\Api\ImageController::class, 'update']);
            Route::delete('images/{id}', [App\Http\Controllers\Api\ImageController::class, 'destroy']);


            Route::group(['middleware' => ['role:admin']], function () {
                Route::apiResource('roles', App\Http\Controllers\Api\RoleController::class);
                Route::apiResource('permissions', App\Http\Controllers\Api\PermissionController::class);
                Route::apiResource('admins', App\Http\Controllers\Api\AdminController::class);
                Route::post('commercials', [App\Http\Controllers\Api\CommercialController::class, 'store']);
                Route::delete('commercials/{id}', [App\Http\Controllers\Api\CommercialController::class, 'destroy']);

                Route::post('abonnements', [App\Http\Controllers\Api\AbonnementController::class, 'store']);
                Route::put('abonnements/{id}', [App\Http\Controllers\Api\AbonnementController::class, 'update']);
                Route::delete('abonnements/{id}', [App\Http\Controllers\Api\AbonnementController::class, 'destroy']);

                Route::post('categories', [App\Http\Controllers\Api\CategorieController::class, 'store']);
                Route::put('categories/{id}', [App\Http\Controllers\Api\CategorieController::class, 'update']);
                Route::delete('categories/{id}', [App\Http\Controllers\Api\CategorieController::class, 'destroy']);

                Route::post('souscategories', [App\Http\Controllers\Api\SousCategorieController::class, 'store']);
                Route::put('souscategories/{id}', [App\Http\Controllers\Api\SousCategorieController::class, 'update']);
                Route::delete('souscategories/{id}', [App\Http\Controllers\Api\SousCategorieController::class, 'destroy']);

                Route::post('typecommodites', [App\Http\Controllers\Api\TypeCommoditeController::class, 'store']);
                Route::put('typecommodites/{id}', [App\Http\Controllers\Api\TypeCommoditeController::class, 'update']);
                Route::delete('typecommodites/{id}', [App\Http\Controllers\Api\TypeCommoditeController::class, 'destroy']);

                Route::post('commodites', [App\Http\Controllers\Api\CommoditeController::class, 'store']);
                Route::put('commodites/{id}', [App\Http\Controllers\Api\CommoditeController::class, 'update']);
                Route::delete('commodites/{id}', [App\Http\Controllers\Api\CommoditeController::class, 'destroy']);
            });
        });
    }
);
