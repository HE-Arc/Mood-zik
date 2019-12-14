<?php

namespace App\Http\Controllers;
use App\Playlist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
    {
      $user_id = auth()->id();
      //$playlist = DB::select('select name from playlists where user_id=?', ['0' => $user_id]);
      $playlist = DB::table('posts')->join('post_playlist', 'posts.user_id', '=', 'post_playlist.playlist_id')->select('posts.*')->get();
      $nb_posts = Post::count();
      $username = DB::table('users')->join('post_playlist', 'users.id', '=', 'post_playlist.playlist_id')->select('users.name')->get();
      $post_music_embed = DB::table('musics')
            ->join($playlist, 'musics.id', '=', 'posts.music_id')
            ->select('musics.embed')->orderBy('posts.id')
            ->get();

      return view('auth.profile', ['playlist' => $playlist]);
    }
}
