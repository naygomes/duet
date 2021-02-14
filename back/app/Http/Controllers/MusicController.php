<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Music;
use App\Models\User;

class MusicController extends Controller
{
    public function createMusic(Request $request, $id) {
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

    public function addToPlaylist(Request $request, $user_id, $music_id) {
        $exist = Music::find($music_id);
        if(!$exist){
            $music = new Music();
            $music->saveMusic($request);
        } else {
            $music = $exist;
        }
        $music->users()->attach($user_id);
        return response()->json([$music,'Música adicionada à sua playlist!']);
    }

    public function listPlaylist($user_id){
        $user = User::Find($user_id);
        $playlist = $user->musics()->get();
        return response()->json([$playlist]);
    }

    public function removeFromPlaylist($music_id, $user_id) {
        $music = Music::find($music_id);
        $music->users()->detach($user_id);
        return response()->json([$music, 'Música removida da sua playlist!']);
    }
}
