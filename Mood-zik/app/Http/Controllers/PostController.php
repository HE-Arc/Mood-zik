<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Returns the create_post blade with an array of all the musics
     *
     */
    public function index()
    {
        $musics = DB::table('musics')->get();
        return view('create_post', ['musics_array' => $musics]);
    }

    /**
     * Stores a new post into Database
     *
     */
    public function storePost(PostRequest $request)
    {
      $music = $request->music;
      $music_id = DB::table('musics')->where('title', $music)->value('id');
      if(isset($music_id))
       {
        $post = new Post();

        $post->title = $request->title;
        $post->text = $request->text;
        $post->user_id = auth()->id();
        $post->created_at = date('Y-m-d H:i:s');
        $post->music_id = $music_id;

        $post->save();

        return redirect('/home');
      }
      else {

          return redirect('/post');
          //Ergonomie: Affichage d'un message d'erreur

      }
    }

    /**
     * returns my_posts blade with all the posts created by an user
     *
     */
    public function showMyPosts()
    {
        $my_posts = DB::table('posts')->where('user_id', auth()->id())->get();
        $username = DB::table('users')->where('id', auth()->id())->value('name');
        $nb_posts = count($my_posts);
        $embeds = array();

        // not the best at all but only solution found in time
        foreach($my_posts as $post)
        {
          $embed = DB::table('musics')
              ->where('id', '=', $post->music_id)
              ->value('embed');
          array_push($embeds, $embed);
        }

        return view('my_posts', ['my_posts' => $my_posts, 'username' => $username, 'embeds' => $embeds, 'nb_posts' => $nb_posts]);
    }


}
