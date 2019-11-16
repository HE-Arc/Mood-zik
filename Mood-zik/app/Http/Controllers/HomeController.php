<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
      $posts = DB::select("select * from posts");
      $nb_posts = DB::select('select count(*) as number from posts')[0]->number;
      $username = DB::select("select name from users join posts on users.id = posts.user_id");
      return view('home', ['posts' => $posts, 'username' => $username, 'nb_posts' => $nb_posts]);
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
