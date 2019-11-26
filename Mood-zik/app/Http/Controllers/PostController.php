<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use DB;

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
        $post->user_id = auth()->id();
        $post->created_at = date('Y-m-d H:i:s');
        $post->embed = $request->embed;

        $post->save();

        return redirect('/home');
    }

    function action(Request $request)
    {
       if($request->ajax())
       {
          $query = $request->get('query');
          if($query !='')
          {
            $data = DB::table('musics')
                    ->where('title', 'like', '%'.$query.'%')
                    ->orWhere('Artist', 'like', '%'.$query.'%')
                    ->orderBy('id', 'asc')
                    ->get();
          }
          else {
            $data = DB::table('musics')
                    ->orderBy('id', 'asc')
                    ->get();
          }
          $total_row = $data->count();
          if($total_row > 0)
            {
               foreach($data as $row)
               {
                  $output .= '
                  <tr>
                   <td>'.$row->Title.'</td>
                   <td>'.$row->Artist.'</td>
                  </tr>
                  ';
               }
             }
            else
              {
                 $output = '
                 <tr>
                  <td align="center" colspan="5">No Data Found</td>
                 </tr>
                 ';
              }
       }
    }
}
