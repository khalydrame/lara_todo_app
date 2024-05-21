<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\TodoController;


/* Route::prefix('v1')->get('/user', function (Request $request) {
    return $request->user();

})->middleware('auth:sanctum'); */
Route::prefix('v1')->group(function () {
    Route::get('/test', function (Request $request) {
        return  auth('sanctum')->id();})->middleware('auth:sanctum');
    Route::get('/user', function (Request $request) {
        return $request->user();})->middleware('auth:sanctum');

    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::apiResource('todos', TodoController::class);
});
