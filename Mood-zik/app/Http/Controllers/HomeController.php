<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
/**
 * Controller for the Home page
 *
**/
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Returns the home blade with an array of posts, an array with the usernames and one with the embed codes
     *
     */
    public function show()
    {
      $posts = Post::all();
      $nb_posts = count($posts);
      $username = DB::table('users')->join('posts', 'users.id', '=', 'posts.user_id')->select('users.name')->orderBy('posts.id')->get();
      $post_music_embed = DB::table('musics')->join('posts', 'musics.id', '=', 'posts.music_id')->select('musics.embed')->orderBy('posts.id')->get();

      return view('home', ['posts' => $posts, 'username' => $username, 'embed' => $post_music_embed, 'nb_posts' => $nb_posts]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
