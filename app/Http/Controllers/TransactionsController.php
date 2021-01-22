<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Transactions;
use DB;
use Redirect;
use Auth;
use App\Documets;

class TransactionsController extends Controller
{
    
    public function index()
    {
        $Transactions = DB::table('transactions')->simplePaginate(15);
        return view('transactions.list', ['transactions' => $Transactions]);
        
    }

    public function create()
    {
        return view('transactions.form');
    }

  

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name',
            'valor' => 'required',
            'cpf' =>  'required',
            'status' => 'required',
            'user_id',

        ]);

        $Transactions = new Transactions;
        $Transactions-> nome =  Auth::user()->name;
        $Transactions -> valor = $request->input('valor');
        $Transactions -> cpf = $request->input('cpf'); 
        $Transactions -> status = $request->input('status');
        $Transactions -> user_id =  Auth::user()->id ;
        $Transactions -> save();
        
        $documents = 'Documents';

        if(!is_dir($documents))
        {
            mkdir($documents, 0755);

        }


        $file_name = date('Y-m-d-H-i-s'). '.txt';
        $file = fopen($file_name, 'w+');
        fwrite($file, $Transactions-> nome. PHP_EOL);
        fwrite($file, $Transactions -> valor. PHP_EOL);
        fwrite($file, $Transactions -> cpf. PHP_EOL);
        fwrite($file, $Transactions -> status. PHP_EOL);
        fwrite($file, $Transactions -> user_id. PHP_EOL);
        fclose($file);

        $move_file = "$documents/$file_name";
        rename($file_name, $move_file);

        return Redirect::to('/transactions');
        

    }

    public function edit($id){

        $transactions = Transactions::findOrFail($id);
        return view('transactions.form', ['transactions' => $transactions]);

    }

    public function update($id, Request $request)
    {      
        $transactions = Transactions::findOrFail($id);
        $transactions->update($request->all());
        return Redirect::to('/transactions');
            

    }


    public function delete($id)
    {

        $transactions = Transactions::findOrFail($id);
        $transactions->delete();
        return Redirect::to('/transactions');
            


    }


}
