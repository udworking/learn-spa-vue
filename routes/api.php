<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\TaskController;
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

Route::middleware('api')->get('/tasks', [TaskController::class, 'index']);
Route::middleware('api')->post('/tasks', [TaskController::class, 'store']);
Route::middleware('api')->get('/tasks/{task}',  [TaskController::class, 'show']);
Route::middleware('api')->put('/tasks/{task}', [TaskController::class, 'update']);
Route::middleware('api')->delete('/tasks/{task}', [TaskController::class, 'destroy']);