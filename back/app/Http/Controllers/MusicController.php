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
        $music = Music::find($id);
        return response()->json([$music]);    
    }

    public function updateMusic(Request $request, $id) {
        $music = Music::find($id);
        $music->saveMusic($request);
        return response()->json($music);
    }

    public function deleteMusic($id){
        Music::destroy($id);
        return response()->json(['Usuário deletado com Sucesso!']);
    }
}
