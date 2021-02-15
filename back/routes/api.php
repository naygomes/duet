<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PassportController;


Route::post('register', [PassportController::class, 'register']);
Route::post('login', [PassportController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', [PassportController::class, 'logout']);
    Route::get('getDetails', [PassportController::class, 'getDetails']);
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

//Rota de Playlist
Route::post('addToPlaylist/{user_id}/{music_id}', 'App\Http\Controllers\MusicController@addToPlaylist');
Route::get('listPlaylist/{user_id}', 'App\Http\Controllers\MusicController@listPlaylist');
Route::delete('removeFromPlaylist/{user_id}/{music_id}','App\Http\Controllers\MusicController@removeFromPlaylist');
