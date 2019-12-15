<?php

namespace App\Http\Controllers;
use App\Playlist;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
    {
      $user_id = auth()->id();
      $playlist = DB::select('select name from playlists where user_id=?', ['0' => $user_id]);
      /*
      $playlist = DB::table('posts')->join('post_playlist', 'post_playlist.playlist_id', '=', $user_id)->distinct('posts.*')->orderBy('post_playlist.id')->get();
      $username = DB::table('users')->join('post_playlist', 'users.id', '=', 'post_playlist.playlist_id')->select('users.name')->orderBy('post_playlist.id')->get();
      $embeds = DB::table('musics')->join('post_playlist', 'post_playlist.music_id', '=', 'musics.id')->select('musics.embed')->orderBy('post_playlist.id')->get();

      return view('auth.profile', ['playlist' => $playlist, 'usernames' => $username, 'embeds' => $embeds]);
      */
      return view('auth.profile', ['playlist' => $playlist]);
    }
}
