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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, 'findByID']);
Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
Route::patch('/user/{id}', [\App\Http\Controllers\UserController::class, 'update']);
Route::delete('/user/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);

Route::get('/projects', [\App\Http\Controllers\ProjectController::class, 'index']);
Route::post('/projects', [\App\Http\Controllers\ProjectController::class, 'store']);
Route::get('/projects/{id}', [\App\Http\Controllers\ProjectController::class, 'findByID']);
Route::put('/projects/{id}', [\App\Http\Controllers\ProjectController::class, 'update']);
Route::delete('/projects/{id}', [\App\Http\Controllers\ProjectController::class, 'destroy']);
