<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('user',App\Http\Controllers\api\UserController::class);
Route::apiResource('aide',App\Http\Controllers\api\AideController::class);
Route::apiResource('financement',App\Http\Controllers\api\FinancementController::class);
Route::apiResource('commande',App\Http\Controllers\api\CommandeController::class);
Route::apiResource('permission',App\Http\Controllers\api\PermissionController::class);
Route::apiResource('role',App\Http\Controllers\api\RoleController::class);
Route::apiResource('versement',App\Http\Controllers\api\VersementController::class);