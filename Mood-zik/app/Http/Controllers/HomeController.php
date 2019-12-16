<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

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

    public function show()
    {
      $posts = Post::all();
      $nb_posts = Post::count();
      $username = DB::table('users')->join('posts', 'users.id', '=', 'posts.user_id')->select('users.name')->orderBy('posts.id')->get();
      $post_music_embed = DB::table('musics')->join('posts', 'musics.id', '=', 'posts.music_id')->select('musics.embed')->orderBy('posts.id')->get();

      return view('home', ['posts' => $posts, 'username' => $username, 'nb_posts' => $nb_posts, 'embed' => $post_music_embed]);
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
