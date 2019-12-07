<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
    {
      $playlists = DB::table('playlists')->pluck('name');

      return view('auth.profile', ['playlists' => $playlists]);
    }
}
