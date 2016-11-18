<?php
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| This file is where you may define all of the routes that are handled
//| by your application. Just tell Laravel the URIs it should respond
//| to using a Closure or controller method. Build something great!
//|
//*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

//    if(Auth::attempt(['email' => 'hanzallah96@gmail.com', 'password' => 'bscs1234'])){
//
//        //return view('/admin');
//
//        $redirectTo = '/admin';
//    }
//    else{
//
//        //return view('welcome');
//
//        $redirectTo = '/welcome';
//    }


    if (Auth::guest()){
        return view('welcome');
    }

    else{
        return redirect('/home');
    }



    //return 'you are an admin';

});

Auth::routes();

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin', 'HomeController@admin');

Route::get('/edit', 'HomeController@edit');

Route::resource('/users', 'NonAdminUsersController');

Route::get('/rights/{id}', function($id){

    return redirect('/rights');

});

Route::resource('/rights', 'PageRightsController');


Route::resource('/page', 'PagesController');

Route::resource('/chart_accounts', 'ChartOfAccountsController');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('errors.503', function(){

    return view('errors.503');

});

//Route::get('/pagerights', function(){
//
//    $is_admin = Auth::user() -> is_admin;
//
//    if($is_admin){
//        return view('pagerights.index');
//    }
//    else{
//        return view('errors.503');
//    }
//});


