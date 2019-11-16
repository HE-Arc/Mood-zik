<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('create_post');
    }

    public function storePost(PostRequest $request)
    {
        $post = new Post();

        $post->title = $request->title;
        $post->text = $request->text;
        $post->embed = $request->embed;

        $post->save();

        return redirect('/home');
    }
}
