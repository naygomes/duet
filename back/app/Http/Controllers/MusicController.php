<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Music;

class MusicController extends Controller
{
    public function saveMusic(Request $request) {
        $music = new Music();
        $music->saveMusic($request);
        return response()->json($music);
    }
}
