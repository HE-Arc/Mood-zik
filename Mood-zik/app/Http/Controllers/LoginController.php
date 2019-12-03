<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
   /**
    * Display login view
    *
    * @return view
    */
    public function show()
    {
      return view('forms/login');
    }
    
}
