<?php

namespace App\Http\Controllers;
use App\Playlist;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     *
     *
     */
    public function show()
    {
      $user_id = auth()->id();
      $playlist = DB::select('select name from playlists where user_id=?', ['0' => $user_id]);
      return view('auth.profile', ['playlist' => $playlist]);
    }

    public function showUser(Request $request, $id)
    {
        $username = DB::table('users')->where('id', '=', $id)->value('name');
        $posts = DB::table('posts')->where('user_id', '=', $id)->get();
        $embeds = array();

        // pas du tout idéal mais seule solution fonctionnelle trouvée à temps
        foreach($posts as $post)
        {
          $embed = DB::table('musics')
              ->where('id', '=', $post->music_id)
              ->value('embed');
          array_push($embeds, $embed);
        }
        $nb_posts = DB::table('posts')->where('user_id', auth()->id())->count();

        return view('auth.user_profile', ['username' => $username, 'posts' => $posts, 'embeds' => $embeds, 'nb_posts' => $nb_posts]);
    }
}
