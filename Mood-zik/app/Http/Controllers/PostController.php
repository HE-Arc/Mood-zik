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
        $post = new Post();

        $post->title = $request->title;
        $post->text = $request->text;
        $post->user_id = auth()->id();
        $post->created_at = date('Y-m-d H:i:s');
        $post->embed = $request->embed;

        $post->save();

        return redirect('/home');
    }


}
