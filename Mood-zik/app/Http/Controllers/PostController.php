<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $musics = DB::select('select * from musics');
        return view('create_post', ['musics_array' => $musics]);
    }

    public function storePost(PostRequest $request)
    {
        $music = $request->music;
        $music_id = DB::table('musics')->where('title', $music)->value('id');

        $post = new Post();

        $post->title = $request->title;
        $post->text = $request->text;
        $post->user_id = auth()->id();
        $post->created_at = date('Y-m-d H:i:s');
        $post->music_id = $music_id;

        $post->save();

        return redirect('/home');
    }

    public function showMyPosts()
    {
        $my_posts = DB::table('posts')->where('user_id', auth()->id())->get();
        $username = DB::table('users')->where('id', auth()->id())->value('name');
        $embeds = array();

        //degeulasse mais seul moyen trouvé
        foreach($my_posts as $post)
        {
          $embed = DB::table('musics')
              ->where('id', '=', $post->music_id)
              ->value('embed');
          array_push($embeds, $embed);
        }

        return view('my_posts', ['my_posts' => $my_posts, 'username' => $username, 'embeds' => $embeds]);
    }


}
