<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Api" middleware group. Enjoy building your Api!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::ApiResource('user',App\Http\Controllers\Api\UserController::class);
Route::ApiResource('aide',App\Http\Controllers\Api\AideController::class);
Route::ApiResource('financement',App\Http\Controllers\Api\FinancementController::class);
Route::ApiResource('commande',App\Http\Controllers\Api\CommandeController::class);
Route::ApiResource('permission',App\Http\Controllers\Api\PermissionController::class);
Route::ApiResource('role',App\Http\Controllers\Api\RoleController::class);
Route::ApiResource('versement',App\Http\Controllers\Api\VersementController::class);