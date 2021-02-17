<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use DB;

use App\Models\Music;
use App\Models\User;



class MusicController extends Controller
{
    public function createMusic(Request $request) {
        $music = new Music();
        $music->saveMusic($request);
        return response()->json($music);
    }

    public function listMusics(){
        $musics = Music::all();
        return response()->json($musics);
    }

    public function showMusic($id){
        $music = Music::find($id);
        return response()->json($music);    
    }

    public function updateMusic(Request $request, $id) {
        $music = Music::find($id);
        $music->saveMusic($request);
        return response()->json($music);
    }

    public function deleteMusic($id){
        Music::destroy($id);
        return response()->json('Música deletada com Sucesso!');
    }

    public function addToPlaylist(Request $request) {
        $user = Auth::user();
        $user_id = $user->id;
        $music = new Music();
        $music = $music->addMusicIfNotExist($request);
        $music_id = $music->id;
        $relationExist = DB::table('music_user')->where("music_id", $music_id)
                        ->where("user_id", $user_id)->first();
        if(!$relationExist) {
            $music->users()->attach($user_id);
            return response()->json($music);
        } else {
            return response()->json('A música já está em sua playlist!');
        }
    }

    public function listPlaylist(){
        $user = Auth::user();
        $playlist = $user->musics()->get();
        return response()->json($playlist);
    }

    public function removeFromPlaylist($music_id) {
        $user = Auth::user();
        $user_id = $user->id;
        $music = Music::find($music_id);
        $music->users()->detach($user_id);
        return response()->json('Música removida da sua playlist!');
    }

    // public function searchMusics($keyword){
    //     $search = Http::get('https://api.deezer.com/search/track', [
    //         'q' => $keyword
    //     ]);
    //     return response()->json($search->body());
    // }

    public function searchMusics($keyword){
        $client = new Client();
        $search = $client->request("GET", 'https://api.deezer.com/search/track', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'query' => [
            'q' => $keyword
            ]
        ]);

        $response = $search->getBody();
        return response()-> json_decode($response);
    }
}
