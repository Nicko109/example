<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', [\App\Http\Controllers\API\PostController::class, 'index']);
Route::get('posts/{post}', [\App\Http\Controllers\API\PostController::class, 'show']);
Route::post('posts', [\App\Http\Controllers\API\PostController::class, 'store']);
Route::patch('posts/{post}', [\App\Http\Controllers\API\PostController::class, 'update']);
Route::delete('posts/{post}', [\App\Http\Controllers\API\PostController::class, 'destroy']);
