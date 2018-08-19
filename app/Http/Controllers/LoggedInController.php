<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoggedInController extends Controller  //old name : HomeController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('out');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function in()
    {   
        return view('logged-in');
    }
    public function out()
    {   
        return view('logged-out');
    }
}
