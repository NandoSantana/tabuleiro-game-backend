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


Route::post('/registrar-ranking', '\App\Http\Controllers\RegisteRankingController@store');
Route::get('/top-five-ranking', '\App\Http\Controllers\RegisteRankingController@show');
Route::get('/top-total-ranking', '\App\Http\Controllers\RegisteRankingController@showTotal');
