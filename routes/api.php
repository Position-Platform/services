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


Route::get('auth/email/verify/{id}', [App\Http\Controllers\Api\VerificationController::class, 'verify'])->name('verification.verify'); // Make sure to keep this as your route name
Route::get('auth/email/resend', [App\Http\Controllers\Api\VerificationController::class, 'resend'])->name('verification.resend');



Route::middleware('auth.apikey')->group(
    function () {


        Route::post('auth/password/forgot', [App\Http\Controllers\Api\UserController::class, 'forgot']);
        Route::post('auth/password/reset', [App\Http\Controllers\Api\UserController::class, 'reset'])->name('password.reset');

        Route::post('auth/register', [App\Http\Controllers\Api\UserController::class, 'register']);
        Route::post('auth/login', [App\Http\Controllers\Api\UserController::class, 'login']);


        Route::middleware('auth:api')->group(function () {
            Route::get('auth/logout', [App\Http\Controllers\Api\UserController::class, 'logout']);
            Route::post('user/update/{id}', [App\Http\Controllers\Api\UserController::class, 'updateuser']);
            Route::delete('user/delete/{id}', [App\Http\Controllers\Api\UserController::class, 'deleteuser']);
            Route::get('user/me', [App\Http\Controllers\Api\UserController::class, 'getUser']);

            Route::get('commercials', [App\Http\Controllers\Api\CommercialController::class, 'index']);
            Route::get('commercials/{id}', [App\Http\Controllers\Api\CommercialController::class, 'show']);
            Route::put('commercials/{id}', [App\Http\Controllers\Api\CommercialController::class, 'update']);

            Route::apiResource('managers', App\Http\Controllers\Api\ManagerController::class);
            Route::get('abonnements', [App\Http\Controllers\Api\AbonnementController::class, 'index']);
            Route::get('abonnements/{id}', [App\Http\Controllers\Api\AbonnementController::class, 'show']);



            Route::group(['middleware' => ['role:admin']], function () {
                Route::apiResource('roles', App\Http\Controllers\Api\RoleController::class);
                Route::apiResource('permissions', App\Http\Controllers\Api\PermissionController::class);
                Route::apiResource('admins', App\Http\Controllers\Api\AdminController::class);
                Route::post('commercials', [App\Http\Controllers\Api\CommercialController::class, 'store']);
                Route::delete('commercials/{id}', [App\Http\Controllers\Api\CommercialController::class, 'destroy']);

                Route::post('abonnements', [App\Http\Controllers\Api\AbonnementController::class, 'store']);
                Route::put('abonnements/{id}', [App\Http\Controllers\Api\AbonnementController::class, 'update']);
                Route::delete('abonnements/{id}', [App\Http\Controllers\Api\AbonnementController::class, 'destroy']);
            });
        });
    }
);
