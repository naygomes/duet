<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    protected $table = "musics";

    public function users(){
        return $this->belongsToMany('App\Models\User');
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
}
