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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rotas de usuário
Route::post('createUser', 'App\Http\Controllers\UserController@createUser');
Route::get('listUsers', 'App\Http\Controllers\UserController@listUsers');
Route::get('showUser/{id}', 'App\Http\Controllers\UserController@showUser');
Route::put('updateUser/{id}', 'App\Http\Controllers\UserController@updateUser');
Route::delete('deleteUser/{id}', 'App\Http\Controllers\UserController@deleteUser');


//Rotas de música
Route::post('createMusic', 'App\Http\Controllers\MusicController@createMusic');
Route::get('listMusics', 'App\Http\Controllers\MusicController@listMusics');
Route::get('showMusic/{id}', 'App\Http\Controllers\MusicController@showMusic');
Route::put('updateMusic/{id}', 'App\Http\Controllers\MusicController@updateMusic');
Route::delete('deleteMusic/{id}', 'App\Http\Controllers\MusicController@deleteMusic');
