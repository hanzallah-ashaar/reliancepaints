<?php

namespace App\Http\Controllers;

use App\Page;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PageRightsController extends Controller
{

    public function __construct(){

        $this -> middleware(['auth', 'access_rights']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('pagerights.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $pages = Page::all();

        return view('pagerights.create', compact(['pages', 'users']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'page_id' => 'required|exists:pages,id',
            'user_id' => 'required|exists:users,id',

        ]);


        User::findOrFail($request -> user_id) -> page() -> attach($request -> page_id);

        return redirect('/rights');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
//        $page = $user -> id;
//
        return view('pagerights.edit', compact('user'));
//
//        return view('pagerights.index');
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $page = Page::findOrFail($id);
//        $user = Auth::user();
//
//        return view('pagerights.edit', compact('page' ,'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) // have to recheck this method.
    {
        $this->validate($request,[

            'user_id' => 'required|exists:users,id',
            'new_page_id' => 'required|exists:pages,id',
            'old_page_id' => 'required|exists:pages,id',

        ]);

        $user = User::findOrFail($id);

        $user -> page() -> detach($request -> old_page_id);
        $user -> page() -> attach($request -> new_page_id);


        return redirect('/rights');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // need user id and the page id to be deleted.
        // only getting the user id here.
        $user = User::findOrFail($id);
        $user -> page() -> detach($id);

        return redirect('/rights');
    }
}
