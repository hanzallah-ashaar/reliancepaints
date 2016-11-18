<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class NonAdminUsersController extends Controller
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

        return view('user.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this -> validate($request, [

            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',


        ]);



        $user = new User;
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request -> password);
        $user -> is_admin = 0;
        $user -> save();

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);


//        if (!($users -> is_admin)) {
//
//            return view('user.show', compact('users'));
//        }
//        else{
//            return view('errors.503');
//        }


        return view('user.show', compact('users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);

//        if (!($user -> is_admin)) {
//
//            return view('user.edit', compact('user'));
//        }
//        else{
//            return view('errors.503');
//        }

        return view('user.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);

//        $this -> validate($request, [
//
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users,email'.$id,
//            'password' => 'required|min:6|confirmed',
//
//
//        ]);

//        if (!($user -> is_admin)) {
//
//            $user -> update($request -> all());
//
//            return redirect('/users');
//
//        }
//
//        else{
//
//            return view('errors.503');
//        }

        $user -> update($request -> all());

        return redirect('/users');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);

//        if(!($user->is_admin)){
//
//            $user -> delete();
//
//            return redirect('/users');
//
//        }
//
//        else{
//
//            return view('errors.503');
//        }

        $user -> delete();

            return redirect('/users');

    }
}
