<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChartOfAccount;
use App\Http\Requests;

class ChartOfAccountsController extends Controller
{

    public function __construct(){

        $this->middleware(['auth', 'access_rights']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = ChartOfAccount::all();
        return view('chart_of_accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chart_of_accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [

            'name' => 'required',
            'code' => 'required|unique:chart_of_accounts',
            'type' => 'required',

        ]);


        $account = new ChartOfAccount;
        $account -> name = $request -> name;
        $account -> type = $request -> type;
        $account -> code = $request -> code;
        $account -> save();

        return redirect('/chart_accounts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = ChartOfAccount::findOrFail($id);

        return view('chart_of_accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = ChartOfAccount::findOrFail($id);

        return view('chart_of_accounts.edit', compact('account'));
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

//        $this -> validate($request, [
//
//            'name' => 'required',
//            'code' => 'required|unique:chart_of_accounts,code'.$id,
//            'type' => 'required',
//
//        ]);

        $account = ChartOfAccount::findOrFail($id);

        $account -> update($request -> all());

        return redirect('/chart_accounts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = ChartOfAccount::findOrFail($id);
        $account -> delete();

        return redirect('/chart_accounts');
    }
}
