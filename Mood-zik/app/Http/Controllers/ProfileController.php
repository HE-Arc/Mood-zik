<?php

namespace App\Http\Controllers;
use App\Playlist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
    {
      $user_id = auth()->id();
      $playlist = DB::select('select name from playlists where user_id=?', ['0' => $user_id]);
      return view('auth.profile', ['playlist' => $playlist]);
    }
}
