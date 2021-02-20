<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    protected $table = "musics";

    public function users(){
        return $this->belongsToMany('App\Models\User', 'music_user', 'music_id', 'user_id');
    }
    
    public function saveMusic($request){
        if($request->title) {
            $this->title = $request->title;
        }
        if($request->album) {
            $this->album = $request->album;
        }
        if($request->artist) {
            $this->artist = $request->artist;
        }
        if($request->genre) {
            $this->genre = $request->genre;
        }
        if($request->cover) {
            $this->cover = $request->cover;
        }
        if($request->preview) {
            $this->preview = $request->preview;
        }
        if($request->track) {
            $this->track = $request->track;
        }
        $this->save();
    }

    public function addMusicIfNotExist($request) {
        $exist = Music::where("title", $request->title)
                ->where("artist", $request->artist)->first();
        if(!$exist){
            $music = new Music();
            $music->saveMusic($request);
        } else {
            $music = $exist;
        }
        return $music;
    }

    public function filterDataFromDeezer($results) {
        $filtered = [];
        foreach ($results as $element) {
            $object = new \stdClass();
            $object->title = $element->title;
            $object->artist = $element->artist->name;
            $object->cover = $element->album->cover;
            $object->album = $element->album->title;
            $object->preview = $element->preview;
            $object->track = $element->link;

            array_push($filtered, $object);
        }

        return $filtered;
    }

}
