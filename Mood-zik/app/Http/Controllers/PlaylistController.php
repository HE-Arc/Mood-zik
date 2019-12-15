<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PlaylistRequest;
use App\Playlist;
use App\PostPlaylist;

class PlaylistController extends Controller
{
    public function index()
    {

    }

    public function showPlaylist()
    {
      $user_id = auth()->id();
      $playlist = DB::select('SELECT distinct posts.* FROM posts, post_playlist WHERE post_playlist.playlist_id = 4');
      //$playlist = DB::table('posts')->where('post_playlist.playlist_id', '=', $user_id)->distinct('posts.*')->get();
      $usernames = DB::table('post_playlist')->where('playlist_id', '=', $user_id)->select('username');
      $embeds = DB::table('musics')->join('post_playlist', 'post_playlist.music_id', '=', 'musics.id')->select('musics.embed')->orderBy('post_playlist.id')->get();
      return view('playlist', ['playlist' => $playlist, 'usernames' => $usernames, 'embeds' => $embeds]);
    }

    public function addToPlaylist(Request $request)
    {
        //$post_id = $request->post_id;
        $playlist_id = DB::table('playlists')->where('user_id', auth()->id())->value('id');
        $post_playlist = new PostPlaylist();
        $post_playlist->post_id = $request->post_id;
        $post_playlist->music_id = $request->post_music_id;
        $post_playlist->playlist_id = $playlist_id;
        $post_playlist->username = $request->post_username;
        $post_playlist->save();
        return redirect('/home');
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
