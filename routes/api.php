<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\EstabelecimentosController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Login
Route::post('auth/login', [UserController::class, 'login']);

//Estabelecimentos
Route::middleware('auth:api')->apiResource('estabelecimentos', EstabelecimentosController::class);
