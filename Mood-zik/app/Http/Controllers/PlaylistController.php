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

    /**
     * Returns a view with the user's playlist, the usernames and the embed of the posts in this playlist and the number of posts in the playlist
     *
     */
    public function showPlaylist()
    {
      $user_id = auth()->id();
      $playlist = DB::table('posts')->join('post_playlist', 'posts.id', '=', 'post_playlist.post_id')->where('post_playlist.playlist_id', '=', $user_id)->select()->get();
      $nb_posts = count($playlist);
      $usernames = DB::table('post_playlist')->where('playlist_id', '=', $user_id)->select('username')->get();
      $embeds = DB::table('musics')->join('post_playlist', 'post_playlist.music_id', '=', 'musics.id')->where('post_playlist.playlist_id', '=', $user_id)->select('musics.embed')->get();
      return view('playlist', ['playlist' => $playlist, 'usernames' => $usernames, 'embeds' => $embeds, 'nb_posts' => $nb_posts]);
    }

    /**
     * Method that adds a post to a user's playlist
     *
     */
    public function addToPlaylist(Request $request)
    {
        $user_id = auth()->id();
        $post_playlist = new PostPlaylist();
        $post_playlist->post_id = $request->post_id;
        $post_playlist->music_id = $request->post_music_id;
        $playlist_id = DB::table('playlists')->where('user_id', auth()->id())->value('id');
        $post_playlist->playlist_id = $playlist_id;
        $post_playlist->username = $request->post_username;
        $check = DB::table('post_playlist')->where('post_playlist.playlist_id', '=', $user_id)->where('post_playlist.post_id' , '=', $post_playlist->post_id)->get();
        $count = count($check);
        //seulement si le post n'est pas n'est pas déjà dans la playlist
        if($count==0)
        {
          $post_playlist->save();
        }
      return redirect('/playlist');
    }


}
