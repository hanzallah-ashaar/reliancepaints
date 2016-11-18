<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Page;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        return view('home');
//    }

    public function index()
    {

        $user = Auth::user();
        $pages = Page::all();

        return view('home', compact(['user', 'pages']));
    }

    public function admin(){

        return view('admin');

    }

    public function edit(){

        $user = User::findOrFail(Auth::user() -> id);

        return view('edit', compact('user'));

    }

}
