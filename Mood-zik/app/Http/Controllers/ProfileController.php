<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
      $name = Auth::user()->name;
      $user_id = Auth::user()->id;
      $posts = DB::select('select * from posts join users on users.id = ?', ['0' => $user_id]);
      return view('auth.profile', ['posts' => $posts]);
    }
}
