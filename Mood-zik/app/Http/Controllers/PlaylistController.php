<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlaylistRequest;
use App\Playlist;

class PlaylistController extends Controller
{
    public function index()
    {
        return view('create_playlist');
    }

    public function storePlaylist(Request $request)
    {
        $playlist = new Playlist();

        $playlist->name = $request->name;
        $playlist->user_id = auth()->id();

        $playlist->save();

        return redirect('/profile');
    }


}
