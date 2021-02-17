<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function searchMusics($keyword){
        $client = new Client([
            'base_uri' => 'https://api.deezer.com'
        ]);

        $response = $client->request('GET', "search/track?q={$keyword}");
        
        $results = json_decode($response->getBody()->getContents());

        return response()->json($results);
    }

    public function searchLyrics($artist, $music){
        $client = new Client([
            'base_uri' => 'https://api.vagalume.com.br'
        ]);

        $api_key = env('API_KEY');

        $response = $client->request('GET', "search.php?art={$artist}&mus={$music}&apikey={$api_key}");
        
        $results = json_decode($response->getBody()->getContents());

        return response()->json($results);
    }
}
