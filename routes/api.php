<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;
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
// RC  UD
Route::get('/todolist', [TodolistController::class, 'index']);

Route::post('/todecreate',[TodolistController::class,'create']);
Route::post('/todeupdate',[TodolistController::class,'update']);
Route::post('/todedelete',[TodolistController::class,'delete']);
