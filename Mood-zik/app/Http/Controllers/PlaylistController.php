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

    public function showAddToPlaylist()
    {
      $user_id = auth()->id();
      $playlists = DB::select('select name from playlists where user_id=?', ['0' => $user_id]);
      return view('add_to_playlist', ['playlists' => $playlists]);
    }

    public function storePlaylist(Request $request)
    {
        $user_name = DB::select('select name from users where id=?', ['0' => auth()->id()]);
        $name = 'Playlist of ' . $user_name;
        $user_id = auth()->id();
        $playlist = Playlist::firstOrCreate(['name' => $name], ['user_id' => $user_id]);


        /*
        $user_name = DB::select('select name from users where id=?', ['0' => auth()->id()]);
        $playlist->name = 'Playlist of ' . $user_name;
        $playlist->user_id = auth()->id();

        $playlist->save();
        */
        return redirect('/profile');
    }


}
