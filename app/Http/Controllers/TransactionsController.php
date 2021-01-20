<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Transactions;
use DB;
use Redirect;

class TransactionsController extends Controller
{
    
  //  public function __construct()
   // {
    //    $this->middleware('auth');
   // }

    public function index()
    {
        return view('transactions.form');
    }

    public function create()
    {
        $Transactions = DB::table('transactions')->simplePaginate(15);
        return view('transactions.list', ['transactions' => $Transactions]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'valor' => 'required',
            'cpf' =>  'required',
            'status' => 'required',

        ]);

        $Transactions = new Transactions;
       // $Transactions-> nome = '{{ Auth::user()->name }}';
        $Transactions -> valor = $request->input('valor');
        $Transactions -> cpf = $request->input('cpf'); 
        $Transactions -> status = $request->input('status');
        $Transactions -> save();
        return redirect('transactions');
    }

    public function edit($id){

        $transactions = Transactions::findOrFail($id);
        return view('transactions.form', ['transactions' => $transactions]);

    }


  //  public function update(TransactionsRequest $transactions, TransactionsRequest $request)
   // {
    //    $transactions->update($request->all());

     //   return redirect('transactions')
      //      ->withSuccess('Transação atualizada com sucesso!');
   // }
        public function update($id, Request $request){
            
            $transactions = Transactions::findOrFail($id);
            $transactions->update($request->all());
            return Redirect::to('/transactions')
            ->withSuccess('Transação atualizada com sucesso!');

        }


        public function delete($id){

            $transactions = Transactions::findOrFail($id);
            $transactions->delete();
            return Redirect::to('/transactions')
            ->withSuccess('Deletou com sucesso!');


        }

  
}
