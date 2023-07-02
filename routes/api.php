<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\PaykeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group([], function () {
    Route::resource('collections', CollectionController::class)->except(["edit", "create"]);
    Route::post('collection/cancel/{collection}', [CollectionController::class, "cancel"]);
})->middleware(['auth:sanctum', 'abilities:user']);

Route::group([], function () {
    Route::get('collections/all', [PaykeController::class,"index"]);
    Route::post('collection/status/{collection}/{status}', [PaykeController::class, "status"]);
})->middleware(['auth:sanctum', 'abilities:carrier']);
