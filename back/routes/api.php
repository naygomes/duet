<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PassportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MusicController;

//Rotas de autenticação
Route::post('register', [PassportController::class, 'register']);
Route::post('login', [PassportController::class, 'login']);

//Middleware de autenticação
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', [PassportController::class, 'logout']);
    Route::get('getDetails', [PassportController::class, 'getDetails']);
    
    //Rotas de usuário
    Route::put('updateUser/{id}', [UserController::class,'updateUser']);
    Route::delete('deleteUser/{id}', [UserController::class,'deleteUser']);
    
    //Rotas de música
    Route::post('createMusic', [MusicController::class, 'createMusic']);
    Route::put('updateMusic/{id}', [MusicController::class, 'updateMusic']);
    Route::delete('deleteMusic/{id}', [MusicController::class, 'deleteMusic']);

    //Rota de playlist
    Route::post('addToPlaylist', [MusicController::class, 'addToPlaylist']);
    Route::get('listPlaylist', [MusicController::class, 'listPlaylist']);
    Route::delete('removeFromPlaylist/{music_id}',[MusicController::class, 'removeFromPlaylist']);
});

//Rotas de usuário
Route::post('createUser', [UserController::class, 'createUser']);
Route::get('listUsers', [UserController::class, 'listUsers']);
Route::get('showUser/{id}', [UserController::class, 'showUser']);

//Rotas de música
Route::get('listMusics', [MusicController::class, 'listMusics']);
Route::get('showMusic/{id}', [MusicController::class, 'showMusic']);
Route::get('searchMusics/{keyword}', [MusicController::class, 'searchMusics']);
Route::get('searchLyrics/{artist}/{music}', [MusicController::class, 'searchLyrics']);