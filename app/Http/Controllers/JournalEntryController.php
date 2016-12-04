<?php

namespace App\Http\Controllers;

use App\ChartOfAccount;
use App\JournalEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\PDF;

use App\Http\Requests;

class JournalEntryController extends Controller
{


    public function __construct(){

        //$this->middleware(['auth', 'access_rights']);

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $j_entry = JournalEntry::all()->sortBy('id');
        return view('journalentry.show', compact('j_entry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $accounts = ChartOfAccount::all()->sortBy('code');
        //$j_entry = JournalEntry::all();

        return view('journalentry.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //return $request ->jel_label[0] ;

//        $this -> validate($request, [
//
//            'chart_of_accounts_id[]' => 'required|exists:chart_of_accounts,id',
//            'journalentry_id[]' => 'required|exists:journalentry_id',
//            'journal[]' => 'required',
//            'reference[]' => 'required|unique:journalentry_reference',
//            'jel_label[]' => 'required',
//            'jel_partner' => 'required',
//
//        ]);


        $j_entry = new JournalEntry();

        $j_entry -> reference = $request -> reference;
        $j_entry -> name = "Name"/*$request -> name*/;
        $j_entry -> date = $request -> date_posted;
        $j_entry -> is_posted = 1;
        $j_entry -> partner = $request -> partner;
        $j_entry -> save();

        $accounts = $request ->account;
        $i = 0;
        $je = $j_entry->id;

        $amount = 0;
        $bool = 0;

        foreach($accounts as $acc){
            //$j_entry -> partner = $request -> jel_partner[$i];


            $coa = ChartOfAccount::findOrFail($acc);

            $jl = $request -> jel_label[$i];
//            $j_entry->chartofaccounts()->attach($coa->id,['date_posted' => $request-> date_posted, 'label' => $jl, 'journal' => $request -> journal, 'amount' => 0, 'is_debit' => 0]);
            //$j_entry -> save();
//            foreach ($j_entry->chartofaccounts as $je12){
//            echo $je12->pivot;
//        }

            if($request -> jel_debit[$i] == 0.00){
                //$j_entry -> chartofaccounts() -> attach(['is_debit' => 0, 'amount' => $request->jel_credit[$i]]);
                $bool = 0;
                $amount = $request -> jel_credit[$i];

                //assets and expenses are debit accounts
                if(strtolower($coa -> type) == 'fixed assets' or  strtolower($coa -> type) == 'current assets'
                    or strtolower($coa -> type) == 'receivable' or strtolower($coa -> type) == 'bank and cash'
                    or strtolower($coa -> type) == 'non-current assets' or strtolower($coa -> type) == 'expenses'
                    or strtolower($coa -> type) == 'prepayments' or strtolower($coa -> type) == 'purchase'){

                    $coa -> total_amount = $coa-> total_amount-$amount;
                }

                //liabilities and revenue have credit balances
                elseif (strtolower($coa -> type) == 'income' or strtolower($coa -> type) == 'current year earnings'
                    or strtolower($coa -> type) == 'current liabilities' or strtolower($coa -> type) == 'non-current liabilities'
                    or strtolower($coa -> type) == 'payable'){

                    $coa -> total_amount = $coa->  total_amount+$amount;
                }

                else{

                }

            }
            else if($request -> jel_credit[$i] == 0.00){
                //$j_entry -> chartofaccounts() -> attach(['is_debit' => 1, 'amount' => $request->jel_debit[$i]]);
                $bool = 1;
                $amount = $request -> jel_debit[$i];

                //assets and expenses are debit accounts
                if(strtolower($coa -> type) == 'fixed assets' or  strtolower($coa -> type) == 'current assets'
                    or strtolower($coa -> type) == 'receivable' or strtolower($coa -> type) == 'bank and cash'
                    or strtolower($coa -> type) == 'non-current assets' or strtolower($coa -> type) == 'expenses'
                    or strtolower($coa -> type) == 'prepayments' or strtolower($coa -> type) == 'purchase')
                {
                    $coa -> total_amount = $coa->  total_amount+$amount;
                }

                //liabilities and revenue have credit balances
                elseif (strtolower($coa -> type) == 'income' or strtolower($coa -> type) == 'current year earnings'
                    or strtolower($coa -> type) == 'current liabilities' or strtolower($coa -> type) == 'non-current liabilities'
                    or strtolower($coa -> type) == 'payable')
                {
                    $coa -> total_amount = $coa-> total_amount-$amount;
                }


            }
            else{

                redirect('journalentry/create') ->withInput();
//                $this -> validate($request -> debit, $request -> credit, [
//
//                    'debit[]' => '',
//                    'credit[]' => '',
//
//                ]);
            }


            $j_entry->chartofaccounts()->attach($coa->id,['date_posted' => $request-> date_posted, 'label' => $jl,
                'journal' => $request -> journal, 'amount' => $amount, 'is_debit' => $bool]);
            $j_entry -> save();
            $coa -> update();
            $i++;

        }

//        ChartOfAccount::findOrFail($request -> accounts) -> journalentry() -> attach($request -> journalentry_id);

        return redirect('/journalentry');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $j_entry = JournalEntry::findOrFail($id) ->sortby('id');

        return view('journalentry.show', compact('j_entry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $j_entry = JournalEntry::findOrFail($id);
//
//        return view('journalentry.edit', compact('j_entry'));
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
//            'chart_of_accounts_id' => 'required|exists:chart_of_accounts,id',
//            'journalentry_id' => 'required|exists:journalentry_id',
//            'new_journalentry_id' => 'required|exists:journalentry_id',
//            'journal' => 'required',
//            'amount' => 'required',
//            'label' => 'required',
//
//        ]);
//
//        $j_entry = JournalEntry::findOrFail($id);
//
//        $j_entry -> chartofaccounts() -> detach($request -> journalentry_id);
//        $j_entry -> chartofaccounts() -> attach($request -> new_journalentry_id);
//
//        $j_entry -> update($request -> all());
//
//        return redirect('/journalentry');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $j_entry = JournalEntry::findOrFail($id);
//        $j_entry -> chartofaccounts() -> detach($id);
//
//        return redirect('/journalentry');
    }

    //$date_to, $date_from, $acc_to, $acc_from
    public function general_report($datefrom, $dateto){

        $data1 = $datefrom;
        $data2 = $dateto;

        $output = DB::select("select * from journal_entry_lines where date_posted BETWEEN $data1 AND $data2;");
        $pdf = App::make('dompdf.wrapper');

        $pdf  -> loadView('journalentry.general_report_pdf', compact('output'));

        return $pdf->stream();


    }

    public function trial_balance_report($d){

        $output = DB::select("select chart_of_accounts_id, amount, is_debit from journal_entry_lines where date_posted = $d");
        $pdf = App::make('dompdf.wrapper');

        $pdf -> loadView('journalentry.trial_balance_report_pdf', compact('output'));

        return $pdf -> stream();

    }

}
