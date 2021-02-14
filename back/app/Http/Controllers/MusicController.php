<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Music;

class MusicController extends Controller
{
    public function createMusic(Request $request) {
        $music = new Music();
        $music->saveMusic($request);
        return response()->json($music);
    }

    public function listMusics(){
        $musics = Music::all();
        return response()->json([$musics]);
    }

    public function showMusic($id){
        $music = Music::findOrFail($id);
        return response()->json([$music]);    
    }

    public function updateMusic(Request $request, $id) {
        $music = Music::findOrFail($id);
        $music->saveMusic($request);
        return response()->json($music);
    }

    public function deleteMusic($id){
        $music = Music::findOrFail($id);
        Music::destroy($id);
        return response()->json($music, ['Usuário deletado com Sucesso!']);
    }
}
