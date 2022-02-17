<?php

use Illuminate\Http\Request;
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
            Route::post('user/update', [App\Http\Controllers\Api\UserController::class, 'updateUser']);
            Route::get('user/me', [App\Http\Controllers\Api\UserController::class, 'getUser']);


            Route::group(['middleware' => ['role:admin']], function () {
                Route::apiResource('roles', App\Http\Controllers\Api\RoleController::class);
                Route::apiResource('permissions', App\Http\Controllers\Api\PermissionController::class);
                Route::apiResource('admins', App\Http\Controllers\Api\AdminController::class);
            });
        });
    }
);
