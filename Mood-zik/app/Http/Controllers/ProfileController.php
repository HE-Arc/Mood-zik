<?php

namespace App\Http\Controllers;
use App\Playlist;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     * returns the profile
     *
     */
    public function show()
    {
      $user_id = auth()->id();
      $playlist = DB::select('select name from playlists where user_id=?', ['0' => $user_id]);
      return view('auth.profile', ['playlist' => $playlist]);
    }

    /**
     * returns the user_profile view that shows all the posts posted by an user
     *
     */
    public function showUser(Request $request, $id)
    {
        $username = DB::table('users')->where('id', '=', $id)->value('name');
        $posts = DB::table('posts')->where('user_id', '=', $id)->get();

        $embeds = array();

        // not the best at all but only solution found in time
        foreach($posts as $post)
        {
          $embed = DB::table('musics')
              ->where('id', '=', $post->music_id)
              ->value('embed');
          array_push($embeds, $embed);
        }

        return view('auth.user_profile', ['username' => $username, 'posts' => $posts, 'embeds' => $embeds]);
    }
}
